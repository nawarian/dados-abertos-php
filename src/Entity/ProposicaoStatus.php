<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\ProposicaoStatusRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class ProposicaoStatus
{
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $data = null;

    #[ORM\Column(length: 255)]
    private ?string $sequencia = null;

    #[ORM\Column(length: 255)]
    private ?string $uriRelator = null;

    #[ORM\Column(length: 255)]
    private ?string $codOrgao = null;

    #[ORM\Column(length: 255)]
    private ?string $siglaOrgao = null;

    #[ORM\Column(length: 255)]
    private ?string $uriOrgao = null;

    #[ORM\Column(length: 255)]
    private ?string $regime = null;

    #[ORM\Column(length: 255)]
    private ?string $descricaoTramitacao = null;

    #[ORM\Column(length: 255)]
    private ?string $idTipoTramitacao = null;

    #[ORM\Column(length: 255)]
    private ?string $descricaoSituacao = null;

    #[ORM\Column(length: 255)]
    private ?string $idSituacao = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $despacho = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $apreciacao = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getSequencia(): ?string
    {
        return $this->sequencia;
    }

    public function setSequencia(string $sequencia): self
    {
        $this->sequencia = $sequencia;

        return $this;
    }

    public function getUriRelator(): ?string
    {
        return $this->uriRelator;
    }

    public function setUriRelator(string $uriRelator): self
    {
        $this->uriRelator = $uriRelator;

        return $this;
    }

    public function getCodOrgao(): ?string
    {
        return $this->codOrgao;
    }

    public function setCodOrgao(string $codOrgao): self
    {
        $this->codOrgao = $codOrgao;

        return $this;
    }

    public function getSiglaOrgao(): ?string
    {
        return $this->siglaOrgao;
    }

    public function setSiglaOrgao(string $siglaOrgao): self
    {
        $this->siglaOrgao = $siglaOrgao;

        return $this;
    }

    public function getUriOrgao(): ?string
    {
        return $this->uriOrgao;
    }

    public function setUriOrgao(string $uriOrgao): self
    {
        $this->uriOrgao = $uriOrgao;

        return $this;
    }

    public function getRegime(): ?string
    {
        return $this->regime;
    }

    public function setRegime(string $regime): self
    {
        $this->regime = $regime;

        return $this;
    }

    public function getDescricaoTramitacao(): ?string
    {
        return $this->descricaoTramitacao;
    }

    public function setDescricaoTramitacao(string $descricaoTramitacao): self
    {
        $this->descricaoTramitacao = $descricaoTramitacao;

        return $this;
    }

    public function getIdTipoTramitacao(): ?string
    {
        return $this->idTipoTramitacao;
    }

    public function setIdTipoTramitacao(string $idTipoTramitacao): self
    {
        $this->idTipoTramitacao = $idTipoTramitacao;

        return $this;
    }

    public function getDescricaoSituacao(): ?string
    {
        return $this->descricaoSituacao;
    }

    public function setDescricaoSituacao(string $descricaoSituacao): self
    {
        $this->descricaoSituacao = $descricaoSituacao;

        return $this;
    }

    public function getIdSituacao(): ?string
    {
        return $this->idSituacao;
    }

    public function setIdSituacao(?string $idSituacao): self
    {
        $this->idSituacao = $idSituacao;

        return $this;
    }

    public function getDespacho(): ?string
    {
        return $this->despacho;
    }

    public function setDespacho(string $despacho): self
    {
        $this->despacho = $despacho;

        return $this;
    }

    public function getApreciacao(): ?string
    {
        return $this->apreciacao;
    }

    public function setApreciacao(string $apreciacao): self
    {
        $this->apreciacao = $apreciacao;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
