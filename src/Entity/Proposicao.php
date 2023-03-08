<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProposicaoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProposicaoRepository::class)]
class Proposicao
{
    #[ORM\Id]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $uri = null;

    #[ORM\Column(length: 10)]
    private ?string $siglaTipo = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column]
    private ?int $ano = null;

    #[ORM\Column]
    private ?int $codTipo = null;

    #[ORM\Column(length: 255)]
    private ?string $descricaoTipo = null;

    #[ORM\Column(length: 255)]
    private ?string $ementa = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ementaDetalhada = null;

    #[ORM\Column(length: 255)]
    private ?string $keywords = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dataApresentacao = null;

    #[ORM\Column(length: 255)]
    private ?string $uriOrgaoNumerador = null;

    #[ORM\Column(length: 255)]
    private ?string $uriPropAnterior = null;

    #[ORM\Column(length: 255)]
    private ?string $uriPropPrincipal = null;

    #[ORM\Column(length: 255)]
    private ?string $uriPropPosterior = null;

    #[ORM\Column(length: 255)]
    private ?string $urlInteiroTeor = null;

    #[ORM\Embedded(class: ProposicaoStatus::class)]
    private ?ProposicaoStatus $ultimoStatus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getSiglaTipo(): ?string
    {
        return $this->siglaTipo;
    }

    public function setSiglaTipo(string $siglaTipo): self
    {
        $this->siglaTipo = $siglaTipo;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getAno(): ?int
    {
        return $this->ano;
    }

    public function setAno(int $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getCodTipo(): ?int
    {
        return $this->codTipo;
    }

    public function setCodTipo(int $codTipo): self
    {
        $this->codTipo = $codTipo;

        return $this;
    }

    public function getDescricaoTipo(): ?string
    {
        return $this->descricaoTipo;
    }

    public function setDescricaoTipo(string $descricaoTipo): self
    {
        $this->descricaoTipo = $descricaoTipo;

        return $this;
    }

    public function getEmenta(): ?string
    {
        return $this->ementa;
    }

    public function setEmenta(string $ementa): self
    {
        $this->ementa = $ementa;

        return $this;
    }

    public function getEmentaDetalhada(): ?string
    {
        return $this->ementaDetalhada;
    }

    public function setEmentaDetalhada(string $ementaDetalhada): self
    {
        $this->ementaDetalhada = $ementaDetalhada;

        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDataApresentacao(): ?\DateTimeInterface
    {
        return $this->dataApresentacao;
    }

    public function setDataApresentacao(\DateTimeInterface $dataApresentacao): self
    {
        $this->dataApresentacao = $dataApresentacao;

        return $this;
    }

    public function getUriOrgaoNumerador(): ?string
    {
        return $this->uriOrgaoNumerador;
    }

    public function setUriOrgaoNumerador(string $uriOrgaoNumerador): self
    {
        $this->uriOrgaoNumerador = $uriOrgaoNumerador;

        return $this;
    }

    public function getUriPropAnterior(): ?string
    {
        return $this->uriPropAnterior;
    }

    public function setUriPropAnterior(string $uriPropAnterior): self
    {
        $this->uriPropAnterior = $uriPropAnterior;

        return $this;
    }

    public function getUriPropPrincipal(): ?string
    {
        return $this->uriPropPrincipal;
    }

    public function setUriPropPrincipal(string $uriPropPrincipal): self
    {
        $this->uriPropPrincipal = $uriPropPrincipal;

        return $this;
    }

    public function getUriPropPosterior(): ?string
    {
        return $this->uriPropPosterior;
    }

    public function setUriPropPosterior(string $uriPropPosterior): self
    {
        $this->uriPropPosterior = $uriPropPosterior;

        return $this;
    }

    public function getUrlInteiroTeor(): ?string
    {
        return $this->urlInteiroTeor;
    }

    public function setUrlInteiroTeor(string $urlInteiroTeor): self
    {
        $this->urlInteiroTeor = $urlInteiroTeor;

        return $this;
    }

    public function getUltimoStatus(): ?ProposicaoStatus
    {
        return $this->ultimoStatus;
    }

    public function setUltimoStatus(ProposicaoStatus $ultimoStatus): self
    {
        $this->ultimoStatus = $ultimoStatus;

        return $this;
    }
}
