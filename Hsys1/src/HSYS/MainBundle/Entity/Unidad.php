<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidad
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\UnidadRepository")
 */
class Unidad {

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
     * @ORM\Column(name="vencimiento", type="date")
     */
    private $vencimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen", type="decimal")
     */
    private $volumen;

    /**
     * @var string
     *
     * @ORM\Column(name="idbolsa", type="string", length=20)
     */
    private $idbolsa;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=30)
     */
    private $estado;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set vencimiento
     *
     * @param \DateTime $vencimiento
     * @return Unidad
     */
    public function setVencimiento($vencimiento) {
        $this->vencimiento = $vencimiento;

        return $this;
    }

    /**
     * Get vencimiento
     *
     * @return \DateTime 
     */
    public function getVencimiento() {
        return $this->vencimiento;
    }

    /**
     * Set volumen
     *
     * @param float $volumen
     * @return Unidad
     */
    public function setVolumen($volumen) {
        $this->volumen = $volumen;

        return $this;
    }

    /**
     * Get volumen
     *
     * @return float 
     */
    public function getVolumen() {
        return $this->volumen;
    }

    /**
     * Set idbolsa
     *
     * @param string $idbolsa
     * @return Unidad
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
     * Set estado
     *
     * @param string $estado
     * @return Unidad
     */
    public function setEstado($estado) {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Donacion", inversedBy="Unidad")
     * @ORM\JoinColumn(name="Donacion", referencedColumnName="id")
     * @return integer
     */
    private $Donacion;

    public function setDonacion(\HSYS\MainBundle\Entity\Donacion $Donacion) {
        $this->Donacion = $Donacion;
    }

    public function getDonacion() {
        return $this->Donacion;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TipoHemocomponente", inversedBy="Unidad")
     * @ORM\JoinColumn(name="TipoHemocomponente", referencedColumnName="id")
     * @return integer
     */
    private $TipoHemocomponente;

    public function setTipoHemocomponente(\HSYS\MainBundle\Entity\TipoHemocomponente $TipoHemocomponente) {
        $this->TipoHemocomponente = $TipoHemocomponente;
    }

    public function getTipoHemocomponente() {
        return $this->TipoHemocomponente;
    }

    /**
     * @ORM\ManyToOne(targetEntity="analisis", inversedBy="Unidad")
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
