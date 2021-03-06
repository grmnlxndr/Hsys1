<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * Donante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\DonanteRepository")
 * @UniqueEntity(fields="dni", message="Número ya Existente")
 */
class Donante {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nomapp", type="string", length=100, nullable=false)
     */
    private $nomapp;

    /**
     * @var string
     * 
     * @ORM\Column(name="dni", type="string", nullable=false, unique=true, length=20)  
     * 
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="factorsang", type="string", length=20, nullable=true)
     */
    private $factorsang;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechnaci", type="date", nullable=true)
     */
    private $fechnaci;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=10, nullable=true)
     */
    private $sexo;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="ocupacion", type="string", length=100, nullable=true)
//     */
//    private $ocupacion;

    /**
     * @ORM\ManyToOne(targetEntity="ocupacion", inversedBy="Donante")
     * @ORM\JoinColumn(name="ocupacion", referencedColumnName="id")
     * @return integer
     */
    private $ocupacion;
    
    /**
     * @var string
     *
     * @ORM\Column(name="estadocivil", type="string", length=50, nullable=true)
     */
    private $estadocivil;

    /**
     * @var string
     * 
     * @ORM\Column(name="paisnac", type= "string", length=40, nullable=true)
     */
    private $paisnac;

    /**
     * @var string
     * 
     * @ORM\Column(name="Provnac", type= "string", length=50, nullable=true)
     */
    private $provnac;

    /**
     * @var string
     * 
     * @ORM\Column(name="domicilio", type= "string", length=60, nullable=true)
     */
    private $domicilio;

    /**
     * @var string
     * 
     * @ORM\Column(name="ciudad", type= "string", length=40, nullable=true)
     */
    private $ciudad;

    /**
     * @var string
     * 
     * @ORM\Column(name="provincia", type= "string", length=40, nullable=true)
     */
    private $provincia;

    /**
     * @var string
     * 
     * @ORM\Column(name="pais", type= "string", length=40, nullable=true)
     */
    private $pais;

    /**
     * @var string
     * 
     * @ORM\Column(name="codpostal", type= "string", length=40, nullable=true)
     */
    private $codpostal;

    /**
     * @var string
     * 
     * @ORM\Column(name="telefono", type= "string", length=30, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     * 
     * @ORM\Column(name="celular", type= "string", length=30, nullable=true)
     */
    private $celular;
//
//    /**
//     * @var string
//     * 
//     * @ORM\Column(name="niveleducativo", type= "string", length=30, nullable=true)
//     */
//    private $niveleducativo;

    /**
     * @ORM\ManyToOne(targetEntity="NivelEducativo", inversedBy="Donante")
     * @ORM\JoinColumn(name="niveleducativo", referencedColumnName="id")
     * @return integer
     */
    private $niveleducativo;
    
    /**
     * @var boolean
     * 
     * @ORM\Column(name="donantevoluntario", type= "boolean", nullable=true)
     */
    private $donantevoluntario;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="leerescribir", type= "boolean", nullable=true)
     */
    private $leerescribir;

    /**
     * @var string
     * 
     * @ORM\Column(name="email", type= "string", length=60, nullable=true)
     * @Assert\Email(message = "El mail '{{ value }}' ingresado no tiene el formato correcto.")
     */
    private $email;

    /**
     *
     * @var boolean
     * 0 esta habiliado.
     * 1 baja logica.
     * @ORM\Column(name="baja", type="boolean")  
     */
    private $baja;

    public function getBaja() {
        return $this->baja;
    }

    public function setBaja($baja) {
        $this->baja = $baja;
        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nomapp
     * 
     * @param string $nomapp
     * @return Donante 
     */
    public function setNomapp($nomapp) {
        $this->nomapp = $nomapp;
        return $this;
    }

    /**
     * Get nomapp
     *
     * @return string 
     */
    public function getNomapp() {
        return $this->nomapp;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Donante
     */
    public function setDni($dni) {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni() {
        //return $this->dni;
        if (substr($this->dni, 0, 1) == 'D') {
            return 'DNI - ' . substr($this->dni, 1);
        }
        if (substr($this->dni, 0, 1) == 'P') {
            return 'Pasaporte - ' . substr($this->dni, 1);
        }
        if (substr($this->dni, 0, 1) == 'C') {
            return 'LC - ' . substr($this->dni, 1);
        }
        if (substr($this->dni, 0, 1) == 'E') {
            return 'LE - ' . substr($this->dni, 1);
        }
        return $this->dni;
    }

    /**
     * Set factorsang
     *
     * @param string $factorsang
     * @return Donante
     */
    public function setFactorsang($factorsang) {
        $this->factorsang = $factorsang;

        return $this;
    }

    /**
     * Get factorsang
     *
     * @return string 
     */
    public function getFactorsang() {
        return $this->factorsang;
    }

    /**
     * Set fechnaci
     *
     * @param \DateTime $fechnaci
     * @return Donante
     */
    public function setFechnaci($fechnaci) {
        $this->fechnaci = $fechnaci;

        return $this;
    }

    /**
     * Get fechnaci
     *
     * @return \DateTime 
     */
    public function getFechnaci() {
        return $this->fechnaci;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Donante
     */
    public function setSexo($sexo) {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo() {
        return $this->sexo;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Donante
     */
    public function setOcupacion($ocupacion) {
        $this->ocupacion = $ocupacion;

        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion() {
        return $this->ocupacion;
    }

    /**
     * Set estadocivil
     *
     * @param string $estadocivil
     * @return Donante
     */
    public function setEstadocivil($estadocivil) {
        $this->estadocivil = $estadocivil;

        return $this;
    }

    /**
     * Get estadocivil
     *
     * @return string 
     */
    public function getEstadocivil() {
        return $this->estadocivil;
    }

    /**
     * Get paisnac
     *
     * @return string 
     */
    public function getPaisnac() {
        return $this->paisnac;
    }

    /**
     * Set paisnac
     *
     * @param string $paisnac
     * @return Donante
     */
    public function setPaisnac($paisnac) {
        $this->paisnac = $paisnac;
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad() {
        return $this->ciudad;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return Donante
     */
    public function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
        return $this;
    }

    /**
     * Get provnac
     *
     * @return string 
     */
    public function getProvnac() {
        return $this->provnac;
    }

    /**
     * Set provnac
     *
     * @param string $provNac
     * @return Donante
     */
    public function setProvnac($provnac) {
        $this->provnac = $provnac;
        return $this;
    }

    /**
     * Get domicilio
     *
     * @return string 
     */
    public function getDomicilio() {
        return $this->domicilio;
    }

    /**
     * Set domicilio
     *
     * @param string $domicilio
     * @return Donante
     */
    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
        return $this;
    }

    /**
     * Get provincia
     *
     * @return string 
     */
    public function getProvincia() {
        return $this->provincia;
    }

    /**
     * Set provincia
     *
     * @param string $provincia
     * @return Donante
     */
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais() {
        return $this->pais;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return Donante
     */
    public function setPais($pais) {
        $this->pais = $pais;
        return $this;
    }

    /**
     * Get codpostal
     *
     * @return string 
     */
    public function getCodpostal() {
        return $this->codpostal;
    }

    /**
     * Set codpostal
     *
     * @param string $codpostal
     * @return Donante
     */
    public function setCodpostal($codpostal) {
        $this->codpostal = $codpostal;
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono() {
        return $this->telefono;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Donante
     */
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Donante
     */
    public function setCelular($celular) {
        $this->celular = $celular;
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Donante
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get niveleducativo
     *
     * @return string 
     */
    public function getNiveleducativo() {
        return $this->niveleducativo;
    }

    /**
     * Set niveleducativo
     *
     * @param string $niveleducativo
     * @return Donante
     */
    public function setNiveleducativo($niveleducativo) {
        $this->niveleducativo = $niveleducativo;
        return $this;
    }

    /**
     * Get donantevoluntario
     *
     * @return boolean 
     */
    public function getDonantevoluntario() {
        return $this->donantevoluntario;
    }

    /**
     * Set donantevoluntario
     *
     * @param boolean $donantevoluntario
     * @return Donante
     */
    public function setDonantevoluntario($donantevoluntario) {
        $this->donantevoluntario = $donantevoluntario;
        return $this;
    }

    /**
     * Get leerescribir
     *
     * @return boolean 
     */
    public function getLeerescribir() {
        return $this->leerescribir;
    }

    /**
     * Set leerescribir
     *
     * @param boolean $leerescribir
     * @return Donante
     */
    public function setLeerescribir($leerescribir) {
        $this->leerescribir = $leerescribir;
        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Exclusion", mappedBy="Donante", cascade={"persist"})
     */
    private $Exclusion;

    /**
     * @ORM\OneToMany(targetEntity="Donacion", mappedBy="Donante")
     */
    private $Donaciones;

    public function __construct() {
        $this->Exclusion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Donaciones = new \Doctrine\Common\Collections\ArrayCollection();

        $hoy = new \Datetime('now');
        $this->setFechnaci($hoy);
    }

    public function addExclusion(\HSYS\MainBundle\Entity\Exclusion $Exclusion) {
        $this->Exclusion[] = $Exclusion;
    }

    public function getExclusion() {
        return $this->Exclusion;
    }

    public function addDonaciones(\HSYS\MainBundle\Entity\Donacion $donaciones) {
        $this->Donaciones[] = $donaciones;
    }

    public function getDonaciones() {
        return $this->Donaciones;
    }

    public function habilitar($comentario) {
        $exclusiones = $this->getExclusionesActivas();
        foreach ($exclusiones as $exclusion) {
            $nuevafecha = strtotime('-1 day', strtotime(date('Y-m-d')));
            $nuevafecha = date('Y-m-d', $nuevafecha);
            $exclusion->setFechfin(new \DateTime($nuevafecha));
            $exclusion->setComentario($exclusion->getComentario() . " | " . $comentario);
        }
    }

    public function getExclusionesActivas() {
        $exclusionesactivas = array();
        $exclusiones = $this->getExclusion();
        $fechaactual = new \DateTime(date('Y-m-d'));
        foreach ($exclusiones as $exclusion) {
            if (($exclusion->getFechfin() == null) || ($fechaactual <= $exclusion->getFechfin())) {
                $exclusionesactivas [] = $exclusion;
            }
        }
        return $exclusionesactivas;
    }

    //true si esta excluido
    public function excluido() {
        if ($this->getExclusionesActivas() == null) {
            return false;
        } else {
            return true;
        }
    }

    public function excluir(\HSYS\MainBundle\Entity\TipoExclusion $tipoExclusion, $comentario, $fechaingreso, $duracion = null) {

        $exclusion = new Exclusion;
        $exclusion->setTipoExclusion($tipoExclusion);
        $exclusion->setDonante($this);
        $exclusion->setFechini($fechaingreso);
        if ($duracion == null) {
            $duracion = $tipoExclusion->getDuracion();
        }
        if ($duracion != 0) {
            $sumar = '+' . $duracion . ' day';
            $nuevafecha = strtotime($sumar, strtotime($fechaingreso->format('Y-m-d')));
            $nuevafecha = date('Y-m-j', $nuevafecha);
            $fechaformat1 = new \DateTime;
            $fechaformat1->setDate(substr($nuevafecha, 0, 4), substr($nuevafecha, 5, 2), substr($nuevafecha, 8, 2));
            $exclusion->setFechfin($fechaformat1);
        }
        $exclusion->setComentario($comentario);
        $exclusion->setDonante($this);
        $this->addExclusion($exclusion);
    }

}
