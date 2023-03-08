<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\AutorProposicaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutorProposicaoRepository::class)]
class AutorProposicao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $uriProposicao = null;

    #[ORM\Column(nullable: true)]
    private ?int $idDeputadoAutor = null;

    #[ORM\Column(length: 255)]
    private ?string $uriAutor = null;

    #[ORM\Column]
    private ?int $codTipoAutor = null;

    #[ORM\Column(length: 255)]
    private ?string $tipoAutor = null;

    #[ORM\Column(length: 255)]
    private ?string $nomeAutor = null;

    #[ORM\Column(length: 20)]
    private ?string $siglaPartidoAutor = null;

    #[ORM\Column(length: 255)]
    private ?string $uriPartidoAutor = null;

    #[ORM\Column(length: 2)]
    private ?string $siglaUFAutor = null;

    #[ORM\Column(length: 255)]
    private ?string $ordemAssinatura = null;

    #[ORM\Column(length: 255)]
    private ?string $proponente = null;

    #[ORM\ManyToOne(inversedBy: 'autores')]
    #[ORM\JoinColumn(name: 'id_proposicao', nullable: false)]
    private ?Proposicao $proposicao = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUriProposicao(): ?string
    {
        return $this->uriProposicao;
    }

    public function setUriProposicao(string $uriProposicao): self
    {
        $this->uriProposicao = $uriProposicao;

        return $this;
    }

    public function getIdDeputadoAutor(): ?int
    {
        return $this->idDeputadoAutor;
    }

    public function setIdDeputadoAutor(?int $idDeputadoAutor): self
    {
        $this->idDeputadoAutor = $idDeputadoAutor;

        return $this;
    }

    public function getUriAutor(): ?string
    {
        return $this->uriAutor;
    }

    public function setUriAutor(string $uriAutor): self
    {
        $this->uriAutor = $uriAutor;

        return $this;
    }

    public function getCodTipoAutor(): ?int
    {
        return $this->codTipoAutor;
    }

    public function setCodTipoAutor(int $codTipoAutor): self
    {
        $this->codTipoAutor = $codTipoAutor;

        return $this;
    }

    public function getTipoAutor(): ?string
    {
        return $this->tipoAutor;
    }

    public function setTipoAutor(string $tipoAutor): self
    {
        $this->tipoAutor = $tipoAutor;

        return $this;
    }

    public function getNomeAutor(): ?string
    {
        return $this->nomeAutor;
    }

    public function setNomeAutor(string $nomeAutor): self
    {
        $this->nomeAutor = $nomeAutor;

        return $this;
    }

    public function getSiglaPartidoAutor(): ?string
    {
        return $this->siglaPartidoAutor;
    }

    public function setSiglaPartidoAutor(string $siglaPartidoAutor): self
    {
        $this->siglaPartidoAutor = $siglaPartidoAutor;

        return $this;
    }

    public function getUriPartidoAutor(): ?string
    {
        return $this->uriPartidoAutor;
    }

    public function setUriPartidoAutor(string $uriPartidoAutor): self
    {
        $this->uriPartidoAutor = $uriPartidoAutor;

        return $this;
    }

    public function getSiglaUFAutor(): ?string
    {
        return $this->siglaUFAutor;
    }

    public function setSiglaUFAutor(string $siglaUFAutor): self
    {
        $this->siglaUFAutor = $siglaUFAutor;

        return $this;
    }

    public function getOrdemAssinatura(): ?string
    {
        return $this->ordemAssinatura;
    }

    public function setOrdemAssinatura(string $ordemAssinatura): self
    {
        $this->ordemAssinatura = $ordemAssinatura;

        return $this;
    }

    public function getProponente(): ?string
    {
        return $this->proponente;
    }

    public function setProponente(string $proponente): self
    {
        $this->proponente = $proponente;

        return $this;
    }

    public function getProposicao(): ?Proposicao
    {
        return $this->proposicao;
    }

    public function setProposicao(?Proposicao $proposicao): self
    {
        $this->proposicao = $proposicao;

        return $this;
    }
}
