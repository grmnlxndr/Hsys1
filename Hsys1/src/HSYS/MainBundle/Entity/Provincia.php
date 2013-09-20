<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Provincia {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false) 
     */
    private $nombre;

    /**
     *
     * @var string
     * 
     * @ORM\Column(name="detalle", type="string", length=255) 
     */
    private $detalle;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Provincia
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set detalle
     *
     * @param string $detalle
     * @return Provincia
     */
    public function setDetalle($detalle) {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * Get detalle
     *
     * @return string 
     */
    public function getDetalle() {
        return $this->detalle;
    }

    public function __toString() {
        return $this->getNombre();
    }

    /**
     * @ORM\OneToMany(targetEntity="Localidad", mappedBy="Provincia")
     */
    private $Localidades;
    
    /**
     * add Localidad
     *
     * @param string $detalle
     * @return Provincia
     */
    public function addLocalidades($localidad) {
        $this->Localidades[] = $localidad;

        return $this;
    }

    /**
     * Get Localidad
     *
     * @return string 
     */
    public function getLocalidades() {
        return $this->Localidades;
    }
    
    public function __construct() {
        $this->Localidades = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
     /**
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="Provincia")
     * @ORM\JoinColumn(name="Pais", referencedColumnName="id")
     * @return integer
     */
    private $Pais;

    public function setPais(\HSYS\MainBundle\Entity\Pais $pais) {
        $this->Pais = $pais;
    }

    public function getPais() {
        return $this->Pais;
    }
    
        
    public function getCompleto() {
        return $this->nombre.' - '. $this->Pais;
    }
    
}

