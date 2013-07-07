<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Anticoagulante
 *
 * @ORM\Table()
 */
class Anticoagulante {

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
     * @return Anticoagulante
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

}

