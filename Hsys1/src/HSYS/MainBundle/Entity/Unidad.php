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
     * @ORM\Column(name="vencimiento", type="date", nullable=true)
     */
    private $vencimiento;

    /**
     * @var float
     *
     * @ORM\Column(name="volumen", type="decimal", nullable=true)
     */
    private $volumen;

    /**
     * @var string
     *
     * @ORM\Column(name="idbolsa", type="string", length=20, nullable=true)
     */
    private $idbolsa;

    /**
     * @var string
     * los estados pueden ser: bloqueado, desbloqueado, transfundido, desechado (=vencimiento??), fraccionado (ojo esto es solo para sangre entera).
     * @ORM\Column(name="estado", type="string", length=30, nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="factorsang", type="string", length=20, nullable=true)
     */
    private $factorsang;
    
     /**
     * Set factorsang
     *
     * @param string $factorsang
     * @return Unidad
     */
    public function setFactorsang($factorsang) {
        $this->factorsang = $factorsang;

        return $this;
    }

    /**
     * Get factorsang
     *
     * @return string 
     */
    public function getFactorsang() {
        return $this->factorsang;
    }
    
    public function estadosPosibles() {
        if ($this->estado == "Bloqueado") {
            return array("Desbloqueado", "Desechado", "Fraccionado");
        } else {
            if ($this->estado == "Desbloqueado") {
                return array("Transfundido", "Desechado", "Fraccionado");
            } else {
                if ($this->estado == "Transfundido") {
                    return array();
                } else {
                    if ($this->estado == "Desechado") {
                        return array();
                    } else {
                        if ($this->estado == "Fraccionado") {
                            return array();
                        }
                    }
                }
            }
        }
    }

}
