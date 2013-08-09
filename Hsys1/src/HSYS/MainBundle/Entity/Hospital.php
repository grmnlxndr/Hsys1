<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * Hospital
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(fields="nombre", message="Nombre ya Existente")
 */
class Hospital {

    public static $hospitales = array('Perrando' => 'Perrando',
        'Gral. San Martin' => 'Gral. San Martin',
        'Saenz Peña' => 'Saenz Peña',
        'Las Breñas' => 'Las Breñas',
        'Charatas' => 'Charatas',
        'Hermoso Campo' => 'Hermoso Campo',
        'Castelli' => 'Castelli',
        'Villa Angela' => 'Villa Angela',
        'Tres Isletas' => 'Tres Isletas',
        'Las Palmas' => 'Las Palmas',
        'Colectas Externas' => 'Colectas Externas',
        'Otro' => 'Otro');

    /**
     * @var integer
     *
     * @ORM\Column(name="idHospital", type="integer")
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
     * @return Hospital
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
     * @return Hospital
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

}

?>
