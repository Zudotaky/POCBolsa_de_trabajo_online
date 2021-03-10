<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Empresa
 *
 * @ORM\Table(name="empresa")
 * @ORM\Entity
 */
class Empresa
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="empresa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @Assert\Positive
     * @ORM\Column(name="cuit", type="integer", nullable=false)
     */
    private $cuit;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=100, nullable=false)
     */
    private $provincia;

    /**
     * @var string
     *
     * @ORM\Column(name="localidad", type="string", length=100, nullable=false)
     */
    private $localidad;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=false)
     */
    private $direccion;

    /**
     * @var int
     *
     * @ORM\Column(name="telefono", type="integer", nullable=false)
     */
    private $telefono;

    /**
     * @var string
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=OfertaLaboral::class, mappedBy="empresa",cascade={"persist"}, orphanRemoval=true)
     */
    private $ofertasLaborales;
    
    /**
     * @ORM\column(type="json_document", options={"jsonb": true}, nullable=true)
     */
    private $transitionContext;

    public function __construct()
    {
        $this->ofertasLaborales = new ArrayCollection();
    }

    /**
     * @return Collection|OfertaLaboral[]
     */
    public function getOfertasLaborales(): Collection
    {
        return $this->ofertasLaborales;
    }

    public function addOfertaLaboral(OfertaLaboral $ofertasLaborale): self
    {
        if (!$this->ofertasLaborales->contains($ofertasLaborale)) {
            $this->ofertasLaborales[] = $ofertasLaborale;
            $ofertasLaborale->setEmpresa($this);
        }

        return $this;
    }

    public function removeOfertaLaboral(OfertaLaboral $ofertasLaborale): self
    {
        if ($this->ofertasLaborales->removeElement($ofertasLaborale)) {
            // set the owning side to null (unless already changed)
            if ($ofertasLaborale->getEmpresa() === $this) {
                $ofertasLaborale->setEmpresa(null);
            }
        }

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCuit(): ?int
    {
        return $this->cuit;
    }

    public function setCuit(int $cuit): self
    {
        $this->cuit = $cuit;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getLocalidad(): ?string
    {
        return $this->localidad;
    }

    public function setLocalidad(string $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function addOfertasLaborale(OfertaLaboral $ofertasLaborale): self
    {
        if (!$this->ofertasLaborales->contains($ofertasLaborale)) {
            $this->ofertasLaborales[] = $ofertasLaborale;
            $ofertasLaborale->setEmpresa($this);
        }

        return $this;
    }

    public function removeOfertasLaborale(OfertaLaboral $ofertasLaborale): self
    {
        if ($this->ofertasLaborales->removeElement($ofertasLaborale)) {
            // set the owning side to null (unless already changed)
            if ($ofertasLaborale->getEmpresa() === $this) {
                $ofertasLaborale->setEmpresa(null);
            }
        }

        return $this;
    }

    public function getTransitionContext(): ?array
    {
        return $this->transitionContext;
    }

    public function setTransitionContext(?array $transitionContext): self
    {
        $this->transitionContext = $transitionContext;

        return $this;
    }


}
