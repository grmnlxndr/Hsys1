<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Donacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\DonacionRepository")
 */
class Donacion {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechextraccion", type="date")
     */
    private $fechextraccion;

    /**
     * @var string
     *
     * @ORM\Column(name="idbolsa", type="string", length=20)
     */
    private $idbolsa;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=150)
     */
    private $comentario;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set fechextraccion
     *
     * @param \DateTime $fechextraccion
     * @return Donacion
     */
    public function setFechextraccion($fechextraccion) {
        $this->fechextraccion = $fechextraccion;

        return $this;
    }

    /**
     * Get fechextraccion
     *
     * @return \DateTime 
     */
    public function getFechextraccion() {
        return $this->fechextraccion;
    }

    /**
     * Set idbolsa
     *
     * @param string $idbolsa
     * @return Donacion
     */
    public function setIdbolsa($idbolsa) {
        $this->idbolsa = $idbolsa;

        return $this;
    }

    /**
     * Get idbolsa
     *
     * @return string 
     */
    public function getIdbolsa() {
        return $this->idbolsa;
    }

    /**
     * Set comentario
     *
     * @param string $comentario
     * @return Donacion
     */
    public function setComentario($comentario) {
        $this->comentario = $comentario;

        return $this;
    }

    /**
     * Get comentario
     *
     * @return string 
     */
    public function getComentario() {
        return $this->comentario;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Donante", inversedBy="Donacion")
     * @ORM\JoinColumn(name="Donante", referencedColumnName="id")
     * @return integer
     */
    private $Donante;

    public function setDonante(\HSYS\MainBundle\Entity\Donante $Donante) {
        $this->Donante = $Donante;
    }

    public function getDonante() {
        return $this->Donante;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Donante", inversedBy="Donacion")
     * @ORM\JoinColumn(name="Donante", referencedColumnName="id")
     * @return integer
     */
    private $Receptor;

    public function setReceptor(\HYSY\MainBundle\Entity\Donante $Receptor) {
        $this->Receptor = $Receptor;
    }

    public function getReceptor() {
        return $this->Receptor;
    }

    /**
     * @ORM\OneToMany(targetEntity="Unidad", mappedBy="Donacion")
     */
    private $Unidades;

    public function __construct() {
        $this->Unidades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addUnidades(\HSYS\MainBundle\Entity\Unidad $Unidades) {
        $this->Unidades[] = $Unidades;
    }

    public function getUnidades() {
        return $this->Unidades;
    }

    /**
     * @ORM\OneToOne(targetEntity="analisis", inversedBy="Donacion")
     * @ORM\JoinColumn(name="analisis", referencedColumnName="id")
     * @return integer
     */
    private $analisis;
    
    public function setAnalisis(\HSYS\MainBundle\Entity\analisis $analisis) {
        $this->analisis = $analisis;
    }

    public function getAnalisis() {
        return $this->analisis;
    }

}
