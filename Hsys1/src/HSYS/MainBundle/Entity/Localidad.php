<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * Provincia
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Localidad {

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
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="Localidad")
     * @ORM\JoinColumn(name="Provincia", referencedColumnName="id")
     * @return integer
     */
    private $Provincia;

    public function setProvincia(\HSYS\MainBundle\Entity\Provincia $provincia) {
        $this->Provincia = $provincia;
    }

    public function getProvincia() {
        return $this->Provincia;
    }
    
}

