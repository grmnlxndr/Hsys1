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
     * @ORM\Column(name="idUnidad", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vencimiento", type="datetime", nullable=true)
     */
    private $vencimiento;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="vencimientobolsa", type="datetime", nullable=true)
     */
    private $vencimientobolsa;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="fechadescarte", type="datetime", nullable=true)
     */
    private $fechadescarte;
    
    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="fechadesbloqueo", type="datetime", nullable=true)
     */
    private $fechadesbloqueo;

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
     *
     * @ORM\Column(name="nrolote", type="string", length=20, nullable=true)
     */
    private $nrolote;

    /**
     * @var string
     *
     * @ORM\Column(name="tipobolsa", type="string", length=20, nullable=true)
     */
    private $tipobolsa;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=30, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="anticoagulante", type="string", length=20, nullable=true)
     */
    private $anticoagulante;

    /**
     * @var string
     * los estados pueden ser: bloqueado, desbloqueado, transfundido, descartado (=vencimiento??), fraccionado (ojo esto es solo para sangre entera).
     * @ORM\Column(name="estado", type="string", length=30, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="comentarios", type="string", length=1400, nullable=true)
     */
    private $comentarios;

    /**
     * @var string
     * 
     * @ORM\Column(name="causadescarte", type="string", length=50, nullable=true)
     */
    private $causadescarte;

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
     * Set Vencimientobolsa
     * 
     * @param \DateTime $vencimientobolsa
     * @return Unidad
     */
    public function setVencimientobolsa($vencimientobolsa) {
        $this->vencimientobolsa = $vencimientobolsa;
        return $this;
    }

    /**
     * Get Vencimientobolsa
     * 
     * @return \DateTime
     */
    public function getVencimientobolsa() {
        return $this->vencimientobolsa;
    }
    
    /**
     * Set Fechadescarte
     * 
     * @param \DateTime $fechadescarte
     * @return Unidad
     */
    public function setFechadescarte($fechadescarte) {
        $this->fechadescarte = $fechadescarte;
        return $this;
    }

    /**
     * Get Fechadescarte
     * 
     * @return \DateTime
     */
    public function getFechadescarte() {
        return $this->fechadescarte;
    }
    
    /**
     * Set Fechadesbloqueo
     * 
     * @param \DateTime $fechadesbloqueo
     * @return Unidad
     */
    public function setFechadesbloqueo($fechadesbloqueo) {
        $this->fechadesbloqueo = $fechadesbloqueo;
        return $this;
    }

    /**
     * Get Fechadesbloqueo
     * 
     * @return \DateTime
     */
    public function getFechadesbloqueo() {
        return $this->fechadesbloqueo;
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
     * Set nrolote
     *
     * @param string $nrolote
     * @return Unidad
     */
    public function setNrolote($nrolote) {
        $this->nrolote = $nrolote;

        return $this;
    }

    /**
     * Get nrolote
     *
     * @return string 
     */
    public function getNrolote() {
        return $this->nrolote;
    }

    /**
     * Set tipobolsa
     *
     * @param string $tipobolsa
     * @return Unidad
     */
    public function setTipobolsa($tipobolsa) {
        $this->tipobolsa = $tipobolsa;

        return $this;
    }

    /**
     * Get tipobolsa
     *
     * @return string 
     */
    public function getTipobolsa() {
        return $this->tipobolsa;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return Unidad
     */
    public function setMarca($marca) {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Set anticoagulante
     *
     * @param string $anticoagulante
     * @return Unidad
     */
    public function setAnticoagulante($anticoagulante) {
        $this->anticoagulante = $anticoagulante;

        return $this;
    }

    /**
     * Get anticoagulante
     *
     * @return string 
     */
    public function getAnticoagulante() {
        return $this->anticoagulante;
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
     * Set comentarios
     *
     * @param string $comentarios
     * @return Unidad
     */
    public function setComentarios($comentarios) {
        $this->comentarios = $comentarios;

        return $this;
    }

    /**
     * Get comentarios
     *
     * @return string 
     */
    public function getComentarios() {
        return $this->comentarios;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Donacion", inversedBy="Unidad")
     * @ORM\JoinColumn(name="idDonacion", referencedColumnName="idDonacion")
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
     * @ORM\JoinColumn(name="idTipoHemocomponente", referencedColumnName="idTipoHemocomponente")
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

    /**
     * Set causadescarte
     *
     * @param string $causadescarte
     * @return Unidad
     */
    public function setCausadescarte($causadescarte) {
        $this->causadescarte = $causadescarte;

        return $this;
    }

    /**
     * Get causadescarte
     *
     * @return string 
     */
    public function getCausadescarte() {
        return $this->causadescarte;
    }

    public function estadosPosibles() {
        if ($this->estado == "Bloqueado") {
            return array("Desbloqueado", "Descartado", "Fraccionado");
        } else {
            if ($this->estado == "Desbloqueado") {
                return array("Transfundido", "Descartado", "Fraccionado", "Bloqueado");
            } else {
                if ($this->estado == "Transfundido") {
                    return array();
                } else {
                    if ($this->estado == "Descartado") {
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
