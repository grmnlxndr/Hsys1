<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\DonanteRepository")
 */
class Donante
{
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomapp
     *
     * @param string $nomapp
     * @return Donante
     */
    public function setNombre($nomapp)
    {
        $this->nomapp = $nomapp;
    
        return $this;
    }

    /**
     * Get nomapp
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nomapp;
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Donante
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set factorsang
     *
     * @param string $factorsang
     * @return Donante
     */
    public function setFactorsang($factorsang)
    {
        $this->factorsang = $factorsang;
    
        return $this;
    }

    /**
     * Get factorsang
     *
     * @return string 
     */
    public function getFactorsang()
    {
        return $this->factorsang;
    }

    /**
     * Set fechnaci
     *
     * @param \DateTime $fechnaci
     * @return Donante
     */
    public function setFechnaci($fechnaci)
    {
        $this->fechnaci = $fechnaci;
    
        return $this;
    }

    /**
     * Get fechnaci
     *
     * @return \DateTime 
     */
    public function getFechnaci()
    {
        return $this->fechnaci;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Donante
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    
        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set ocupacion
     *
     * @param string $ocupacion
     * @return Donante
     */
    public function setOcupacion($ocupacion)
    {
        $this->ocupacion = $ocupacion;
    
        return $this;
    }

    /**
     * Get ocupacion
     *
     * @return string 
     */
    public function getOcupacion()
    {
        return $this->ocupacion;
    }

    /**
     * Set estadocivil
     *
     * @param string $estadocivil
     * @return Donante
     */
    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;
    
        return $this;
    }

    /**
     * Get estadocivil
     *
     * @return string 
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
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
