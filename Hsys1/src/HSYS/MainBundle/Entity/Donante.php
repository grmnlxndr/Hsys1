<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\DonanteRepository")
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
     * @ORM\Column(name="nomapp", type="string", length=100)
     */
    private $nomapp;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", length=8)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="factorsang", type="string", length=20)
     */
    private $factorsang;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechnaci", type="date")
     */
    private $fechnaci;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=10)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="ocupacion", type="string", length=100)
     */
    private $ocupacion;

    /**
     * @var string
     *
     * @ORM\Column(name="estadocivil", type="string", length=50)
     */
    private $estadocivil;

    /**
     * @var string
     * 
     * @ORM\Column(name="paisnac", type= "string", length=40)
     */
    private $paisnac;

    /**
     * @var string
     * 
     * @ORM\Column(name="Provnac", type= "string", length=50)
     */
    private $provnac;

    /**
     * @var string
     * 
     * @ORM\Column(name="domicilio", type= "string", length=60)
     */
    private $domicilio;

    /**
     * @var string
     * 
     * @ORM\Column(name="ciudad", type= "string", length=40)
     */
    private $ciudad;

    /**
     * @var string
     * 
     * @ORM\Column(name="provincia", type= "string", length=40)
     */
    private $provincia;

    /**
     * @var string
     * 
     * @ORM\Column(name="pais", type= "string", length=40)
     */
    private $pais;

    /**
     * @var string
     * 
     * @ORM\Column(name="telefono", type= "string", length=30)
     */
    private $telefono;

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
     * @ORM\OneToMany(targetEntity="Exclusion", mappedBy="Donante")
     */
    private $Exclusion;

    public function __construct() {
        $this->Exclusion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addExclusion(\HSYS\MainBundle\Entity\Unidad $Exclusion) {
        $this->Exclusion[] = $Exclusion;
    }

    public function getExclusion() {
        return $this->Exclusion;
    }

}
