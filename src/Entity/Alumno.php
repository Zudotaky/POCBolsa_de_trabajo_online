<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity
 */
class Alumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="alumno_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_documento", type="string", length=10, nullable=false)
     */
    private $tipoDeDocumento;

    /**
     * @var int
     *
     * @Assert\Positive
     * @ORM\Column(name="numero_de_documento", type="integer", nullable=false)
     */
    private $numeroDeDocumento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_de_nacimiento", type="date", nullable=false)
     */
    private $fechaDeNacimiento;

    /**
     * @var string
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @ORM\Column(name="mail", type="string", length=100, nullable=false)
     */
    private $mail;

    /**
     * @var string
     *
     * @ORM\Column(name="carrera", type="string", length=100, nullable=false)
     */
    private $carrera;

    /**
     * @var int
     *
     * @Assert\Positive
     * @ORM\Column(name="tiempo_en_carrera", type="integer", nullable=false)
     */
    private $tiempoEnCarrera;

    /**
     * @var string
     *
     * @ORM\Column(name="experiencias_previas", type="text", nullable=false)
     */
    private $experienciasPrevias;

    /**
     * @ORM\column(type="json_document", options={"jsonb": true}, nullable=true)
     */
    private $transitionContext;

    public function __construct()
    {
    
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getTipoDeDocumento(): ?string
    {
        return $this->tipoDeDocumento;
    }

    public function setTipoDeDocumento(string $tipoDeDocumento): self
    {
        $this->tipoDeDocumento = $tipoDeDocumento;

        return $this;
    }

    public function getNumeroDeDocumento(): ?int
    {
        return $this->numeroDeDocumento;
    }

    public function setNumeroDeDocumento(int $numeroDeDocumento): self
    {
        $this->numeroDeDocumento = $numeroDeDocumento;

        return $this;
    }

    public function getFechaDeNacimiento(): ?\DateTimeInterface
    {
        return $this->fechaDeNacimiento;
    }

    public function setFechaDeNacimiento(\DateTimeInterface $fechaDeNacimiento): self
    {
        $this->fechaDeNacimiento = $fechaDeNacimiento;

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

    public function getCarrera(): ?string
    {
        return $this->carrera;
    }

    public function setCarrera(string $carrera): self
    {
        $this->carrera = $carrera;

        return $this;
    }

    public function getTiempoEnCarrera(): ?int
    {
        return $this->tiempoEnCarrera;
    }

    public function setTiempoEnCarrera(int $tiempoEnCarrera): self
    {
        $this->tiempoEnCarrera = $tiempoEnCarrera;

        return $this;
    }

    public function getExperienciasPrevias(): ?string
    {
        return $this->experienciasPrevias;
    }

    public function setExperienciasPrevias(string $experienciasPrevias): self
    {
        $this->experienciasPrevias = $experienciasPrevias;

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
