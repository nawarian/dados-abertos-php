<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\AutorProposicao;
use App\Entity\Proposicao;
use App\Entity\ProposicaoStatus;
use App\Repository\AutorProposicaoRepository;
use App\Repository\ProposicaoRepository;
use DateTimeImmutable;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'sincronizar:proposicoes',
    description: 'Baixa proposições do site dadosabertos.camara.leg.br',
)]
class SincronizarProposicoesCommand extends Command
{
    public function __construct(
        private string $cacheDir,
        private ProposicaoRepository $proposicaoRepository,
        private AutorProposicaoRepository $autorProposicaoRepository,
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('ano', InputArgument::REQUIRED, 'Ano das proposições')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $ano = (int)$input->getArgument('ano');

        $proposicoesUrl = "https://dadosabertos.camara.leg.br/arquivos/proposicoes/json/proposicoes-{$ano}.json";
        $this->sincronizarProposicoes($this->readFileFromCache($proposicoesUrl));

        $autoresProposicoesUrl = "https://dadosabertos.camara.leg.br/arquivos/proposicoesAutores/json/proposicoesAutores-{$ano}.json";
        $this->sincronizarAutores($this->readFileFromCache($autoresProposicoesUrl));

        $this->proposicaoRepository->flush();

        return self::SUCCESS;
    }

    private function sincronizarAutores(string $json): void
    {
        ['dados' => $autores] = json_decode($json, true);
        foreach ($autores as $autorArray) {
            $proposicao = $this->proposicaoRepository->find($autorArray['idProposicao']);
            if ($proposicao === null) {
                continue;
            }

            $autor = $this->autorProposicaoRepository->findOneBy([
                'proposicao' => $autorArray['idProposicao'],
                'ordemAssinatura' => $autorArray['ordemAssinatura'] ?? null,
            ]) ?? new AutorProposicao();

            $autor
                ->setUriProposicao($autorArray['uriProposicao'])
                ->setIdDeputadoAutor($autorArray['idDeputadoAutor'] ?? null)
                ->setUriAutor($autorArray['uriAutor'])
                ->setCodTipoAutor($autorArray['codTipoAutor'])
                ->setTipoAutor($autorArray['tipoAutor'])
                ->setNomeAutor($autorArray['nomeAutor'])
                ->setSiglaPartidoAutor($autorArray['siglaPartidoAutor'])
                ->setUriPartidoAutor($autorArray['uriPartidoAutor'])
                ->setSiglaUFAutor($autorArray['siglaUFAutor'])
                ->setOrdemAssinatura($autorArray['ordemAssinatura'])
                ->setProponente($autorArray['proponente'])
            ;

            $proposicao->addAutor($autor);

            $this->proposicaoRepository->save($proposicao);
        }
    }

    public function sincronizarProposicoes(bool|string $conteudo): void
    {
        ['dados' => $proposicoes] = json_decode($conteudo, true);
        foreach ($proposicoes as $prop) {
            $proposicao = $this->proposicaoRepository->find($prop['id']) ?? new Proposicao();
            $proposicao
                ->setId($prop['id'])
                ->setUri($prop['uri'])
                ->setSiglaTipo($prop['siglaTipo'])
                ->setNumero($prop['numero'])
                ->setAno($prop['ano'])
                ->setCodTipo($prop['codTipo'])
                ->setDescricaoTipo($prop['descricaoTipo'])
                ->setEmenta($prop['ementa'])
                ->setEmentaDetalhada($prop['ementaDetalhada'])
                ->setKeywords($prop['keywords'])
                ->setDataApresentacao(new DateTimeImmutable($prop['dataApresentacao']))
                ->setUriOrgaoNumerador($prop['uriOrgaoNumerador'])
                ->setUriPropAnterior($prop['uriPropAnterior'])
                ->setUriPropPrincipal($prop['uriPropPrincipal'])
                ->setUriPropPosterior($prop['uriPropPosterior'])
                ->setUrlInteiroTeor($prop['urlInteiroTeor'])
                ->setUltimoStatus(
                    (new ProposicaoStatus())
                        ->setData(new DateTimeImmutable($prop['ultimoStatus']['data']))
                        ->setSequencia($prop['ultimoStatus']['sequencia'])
                        ->setUriRelator($prop['ultimoStatus']['uriRelator'])
                        ->setCodOrgao($prop['ultimoStatus']['codOrgao'])
                        ->setSiglaOrgao($prop['ultimoStatus']['siglaOrgao'])
                        ->setUriOrgao($prop['ultimoStatus']['uriOrgao'])
                        ->setRegime($prop['ultimoStatus']['regime'])
                        ->setDescricaoTramitacao($prop['ultimoStatus']['descricaoTramitacao'])
                        ->setIdTipoTramitacao($prop['ultimoStatus']['idTipoTramitacao'])
                        ->setDescricaoSituacao($prop['ultimoStatus']['descricaoSituacao'])
                        ->setIdSituacao($prop['ultimoStatus']['idSituacao'])
                        ->setDespacho($prop['ultimoStatus']['despacho'])
                        ->setApreciacao($prop['ultimoStatus']['apreciacao'])
                        ->setUrl($prop['ultimoStatus']['url'])
                );

            $this->proposicaoRepository->save($proposicao);
        }
    }

    public function readFileFromCache(string $url): string|false
    {
        $arquivo = basename($url);
        $arquivoNoCache = "{$this->cacheDir}/{$arquivo}";

        if (!file_exists($arquivoNoCache)) {
            $conteudo = file_get_contents($url);
            file_put_contents($arquivoNoCache, $conteudo);
        }

        return file_get_contents($arquivoNoCache);
    }
}
