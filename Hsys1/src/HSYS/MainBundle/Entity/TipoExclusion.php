<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoExclusion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\TipoExclusionRepository")
 */
class TipoExclusion
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
     * @ORM\Column(name="nombre", type="string", length=150, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="grado", type="string", length=100, nullable=true)
     */
    private $grado;

    /**
     * @var integer
     *
     * @ORM\Column(name="duracion", type="integer", nullable=true)
     */
    private $duracion;


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
     * Set nombre
     *
     * @param string $nombre
     * @return TipoExclusion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set grado
     *
     * @param string $grado
     * @return TipoExclusion
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;
    
        return $this;
    }

    /**
     * Get grado
     *
     * @return string 
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set duracion
     *
     * @param integer $duracion
     * @return TipoExclusion
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
    
        return $this;
    }

    /**
     * Get duracion
     *
     * @return integer 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }
    
    
    public function __toString() {
        $mensaje = $this->getGrado().' '.$this->getNombre();
        
        return $mensaje;
    }
}
