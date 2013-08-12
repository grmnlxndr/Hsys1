<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * ocupacion
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(fields="nombre", message="Nombre ya Existente")
 */
class ocupacion {

    public static $ocupacion = array('Jubilado' => 'Jubilado',
        'Ama de Casa' => 'Ama de Casa',
        'Empleado Público' => 'Empleado Público',
        'Secretario' => 'Secretario',
        'Medico' => 'Medico',
        'Comerciante' => 'Comerciante',
        'Trabajador Independiente' => 'Trabajador Independiente',
        'Empleado Privado' => 'Empleado Privado',
        'Desocupado' => 'Desocupado',
        'Estudiante' => 'Estudiante',
        'Estudiante Universitario' => 'Estudiante Universitario',
        'Docente' => 'Docente',
        'Docente Universitario' => 'Docente Universitario',
        'Otros' => 'Otros');

    /**
     * @var integer
     *
     * @ORM\Column(name="idOcupacion", type="integer")
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
     * @return ocupacion
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
     * @return ocupacion
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

}

?>
