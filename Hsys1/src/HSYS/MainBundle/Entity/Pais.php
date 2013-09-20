<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * Pais
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(fields="nombre", message="Nombre ya Existente")
 */
class Pais {

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
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false, unique=true) 
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
     * @return Pais
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
     * @return Pais
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
     * @ORM\OneToMany(targetEntity="Provincia", mappedBy="Provincia")
     */
    private $Provincias;
    
    /**
     * add Provincia
     *
     * @param string $detalle
     * @return Pais
     */
    public function addProvincias($provincia) {
        $this->Provincias[] = $provincia;

        return $this;
    }

    /**
     * Get Provincia
     *
     * @return provincia 
     */
    public function getProvincias() {
        return $this->Provincias;
    }
    
    public function __construct() {
        $this->Provincias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
}

