<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OfertaLaboral
 *
 * @ORM\Table(name="oferta_laboral", indexes={@ORM\Index(name="idx_eb791463521e1991", columns={"empresa_id"})})
 * @ORM\Entity
 */
class OfertaLaboral
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="oferta_laboral_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_de_convocatoria", type="date", nullable=false)
     */
    private $fechaInicioDeConvocatoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin_convocatoria", type="date", nullable=false)
     */
    private $fechaFinConvocatoria;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="ofertasLaborales")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFechaInicioDeConvocatoria(): ?\DateTimeInterface
    {
        return $this->fechaInicioDeConvocatoria;
    }

    public function setFechaInicioDeConvocatoria(\DateTimeInterface $fechaInicioDeConvocatoria): self
    {
        $this->fechaInicioDeConvocatoria = $fechaInicioDeConvocatoria;

        return $this;
    }

    public function getFechaFinConvocatoria(): ?\DateTimeInterface
    {
        return $this->fechaFinConvocatoria;
    }

    public function setFechaFinConvocatoria(\DateTimeInterface $fechaFinConvocatoria): self
    {
        $this->fechaFinConvocatoria = $fechaFinConvocatoria;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }


}
