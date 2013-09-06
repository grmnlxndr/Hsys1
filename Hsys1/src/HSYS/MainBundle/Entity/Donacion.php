<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity as UniqueEntity;

/**
 * Donacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\DonacionRepository")
 * @UniqueEntity(fields="numdedonacion", message="Número ya Existente")
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
     * @ORM\Column(name="fechextraccion", type="date", nullable=true)
     */
    private $fechextraccion;

    /**
     * @var string
     *
     * @ORM\Column(name="idbolsa", type="string", length=20, nullable=true)
     */
    private $idbolsa;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="vencimientobolsa", type="date", nullable=true)
     */
    private $vencimientobolsa;

    /**
     * @var string
     *
     * @ORM\Column(name="nrolote", type="string", length=20, nullable=true)
     */
    private $nrolote;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="tipobolsa", type="string", length=20, nullable=true)
//     */
//    private $tipobolsa;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="marca", type="string", length=30, nullable=true)
//     */
//    private $marca;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="anticoagulante", type="string", length=20, nullable=true)
//     */
//    private $anticoagulante;
//
//    // /**
//    //  * @var string
//    //  *
//    //  * @ORM\Column(name="localidad", type="string", length=50, nullable=true)
//    //  */
//    // private $localidad;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="hospital", type="string", length=50, nullable=true)
//     */
//    private $hospital;

    /**
     * @var string
     *
     * @ORM\Column(name="flebotomia", type="string", length=20, nullable=true)
     */
    private $flebotomia;

    /**
     * @var string
     *
     * @ORM\Column(name="puncion", type="string", length=20, nullable=true)
     */
    private $puncion;

    /**
     * @var string
     *
     * @ORM\Column(name="reaccionpostextraccion", type="string", length=20, nullable=true)
     */
    private $reaccionpostextraccion;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=150, nullable=true)
     */
    private $comentario;

    /**
     * @var string
     *
     * @ORM\Column(name="tipodonacion", type="string", length=50, nullable=true)
     */
    private $tipodonacion;
    //
    //DATOS EXTRACCION
    //
     /**
     * @var string
     *
     * @ORM\Column(name="peso", type="string", length=20, nullable=true)
     */
    private $peso;

    /**
     * @var string
     *
     * @ORM\Column(name="tensionarterial", type="string", length=20, nullable=true)
     */
    private $tensionarterial;

    /**
     * @var string
     *
     * @ORM\Column(name="tensionarterialmax", type="string", length=20, nullable=true)
     */
    private $tensionarterialmax;

    /**
     * @var string
     *
     * @ORM\Column(name="pulso", type="string", length=20, nullable=true)
     */
    private $pulso;

    /**
     * @var string
     *
     * @ORM\Column(name="temperatura", type="string", length=20, nullable=true)
     */
    private $temperatura;

    /**
     * @var string
     *
     * @ORM\Column(name="hto", type="string", length=20, nullable=true)
     */
    private $hto;

    /**
     * @var string
     *
     * @ORM\Column(name="inspeccionbrazos", type="string", length=20, nullable=true)
     */
    private $inspeccionbrazos;

    /**
     * @var string
     *
     * @ORM\Column(name="obs", type="string", length=20, nullable=true)
     */
    private $obs;

    /**
     * @var string
     *
     * @ORM\Column(name="numdedonacion", type="string", length=15, nullable=true, unique=true)
     */
    private $numdedonacion;

    /**
     *
     * @var boolean
     * terminado = 0 no terminado todavia.
     * terminado = 1 si terminado todavia.
     * @ORM\Column(name="terminado", type="boolean")  
     */
    private $terminado;

    public function getTerminado() {
        return $this->terminado;
    }

    public function setTerminado($terminado) {
        $this->terminado = $terminado;
        return $this;
    }

    /**
     * Get numdedonacion
     *
     * @return String 
     */
    public function getnumdedonacion() {
        return $this->numdedonacion;
    }

    /**
     * Set numdedonacion
     *
     * @param string $numdedonacion
     * @return Donacion
     */
    public function setnumdedonacion($numdedonacion) {
        $this->numdedonacion = $numdedonacion;

        return $this;
    }

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

//    /**
//     * Set tipobolsa
//     *
//     * @param string $tipobolsa
//     * @return Unidad
//     */
//    public function setTipobolsa($tipobolsa) {
//        $this->tipobolsa = $tipobolsa;
//
//        return $this;
//    }
//
//    /**
//     * Get tipobolsa
//     *
//     * @return string 
//     */
//    public function getTipobolsa() {
//        return $this->tipobolsa;
//    }
//    /**
//     * Set marca
//     *
//     * @param string $marca
//     * @return Unidad
//     */
//    public function setMarca($marca) {
//        $this->marca = $marca;
//
//        return $this;
//    }
//
//    /**
//     * Get marca
//     *
//     * @return string 
//     */
//    public function getMarca() {
//        return $this->marca;
//    }
//    /**
//     * Set anticoagulante
//     *
//     * @param string $anticoagulante
//     * @return Unidad
//     */
//    public function setAnticoagulante($anticoagulante) {
//        $this->anticoagulante = $anticoagulante;
//
//        return $this;
//    }
//
//    /**
//     * Get anticoagulante
//     *
//     * @return string 
//     */
//    public function getAnticoagulante() {
//        return $this->anticoagulante;
//    }
    // /**
    //  * Set localidad
    //  *
    //  * @param string $localidad
    //  * @return Donacion
    //  */
    // public function setLocalidad($localidad) {
    //    $this->localidad = $localidad;
    //    return $this;
    //}
    // /**
    // * Get localidad
    //  *
    //  * @return string 
    //  */
    // public function getLocalidad() {
    //     return $this->localidad;
    // }
//    /**
//     * Set hospital
//     *
//     * @param string $hospital
//     * @return Donacion
//     */
//    public function setHospital($hospital) {
//        $this->hospital = $hospital;
//
//        return $this;
//    }
//
//    /**
//     * Get hospital
//     *
//     * @return string 
//     */
//    public function getHospital() {
//        return $this->hospital;
//    }

    /**
     * Set flebotomia
     *
     * @param string $flebotomia
     * @return Donacion
     */
    public function setFlebotomia($flebotomia) {
        $this->flebotomia = $flebotomia;

        return $this;
    }

    /**
     * Get flebotomia
     *
     * @return string 
     */
    public function getFlebotomia() {
        return $this->flebotomia;
    }

    /**
     * Set puncion
     *
     * @param string $puncion
     * @return Donacion
     */
    public function setPuncion($puncion) {
        $this->puncion = $puncion;

        return $this;
    }

    /**
     * Get puncion
     *
     * @return string 
     */
    public function getPuncion() {
        return $this->puncion;
    }

    /**
     * Set reaccionpostextraccion
     *
     * @param string $reaccionpostextraccion
     * @return Donacion
     */
    public function setReaccionpostextraccion($reaccionpostextraccion) {
        $this->reaccionpostextraccion = $reaccionpostextraccion;

        return $this;
    }

    /**
     * Get reaccionpostextraccion
     *
     * @return string 
     */
    public function getReaccionpostextraccion() {
        return $this->reaccionpostextraccion;
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
     * Set tipodonacion
     *
     * @param string $tipodonacion
     * @return Donacion
     */
    public function setTipodonacion($tipodonacion) {
        $this->tipodonacion = $tipodonacion;

        return $this;
    }

    /**
     * Get tipodonacion
     *
     * @return string 
     */
    public function getTipodonacion() {
        return $this->tipodonacion;
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
     * @ORM\JoinColumn(name="Receptor", referencedColumnName="id")
     * @return integer
     */
    private $Receptor;

    public function setReceptor(\HSYS\MainBundle\Entity\Donante $Receptor) {
        $this->Receptor = $Receptor;
    }

    public function getReceptor() {
        return $this->Receptor;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Hospital", inversedBy="Donacion")
     * @ORM\JoinColumn(name="hospital", referencedColumnName="id")
     * @return integer
     */
    private $hospital;

    public function setHospital(\HSYS\MainBundle\Entity\Hospital $hospital) {
        $this->hospital = $hospital;
    }

    public function getHospital() {
        return $this->hospital;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TipoBolsa", inversedBy="Donacion")
     * @ORM\JoinColumn(name="tipoBolsa", referencedColumnName="id")
     * @return integer
     */
    private $tipoBolsa;

    public function setTipoBolsa(\HSYS\MainBundle\Entity\TipoBolsa $tipoBolsa) {
        $this->tipoBolsa = $tipoBolsa;
    }

    public function getTipoBolsa() {
        return $this->tipoBolsa;
    }

    /**
     * @ORM\ManyToOne(targetEntity="MarcaBolsa", inversedBy="Donacion")
     * @ORM\JoinColumn(name="marcaBolsa", referencedColumnName="id")
     * @return integer
     */
    private $marcaBolsa;

    public function setMarcaBolsa(\HSYS\MainBundle\Entity\MarcaBolsa $marcaBolsa) {
        $this->marcaBolsa = $marcaBolsa;
    }

    public function getMarcaBolsa() {
        return $this->marcaBolsa;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Anticoagulante", inversedBy="Donacion")
     * @ORM\JoinColumn(name="anticoagulante", referencedColumnName="id")
     * @return integer
     */
    private $anticoagulante;

    public function setAnticoagulante(\HSYS\MainBundle\Entity\Anticoagulante $anticoagulante) {
        $this->anticoagulante = $anticoagulante;
    }

    public function getAnticoagulante() {
        return $this->anticoagulante;
    }

    //DATOS EXAMEN FISICO
    /**
     * Set peso
     *
     * @param string $peso
     * @return Donacion
     */
    public function setPeso($peso) {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get peso
     *
     * @return string 
     */
    public function getPeso() {
        return $this->peso;
    }

    /**
     * Get tensionarterial
     *
     * @return string 
     */
    public function getTensionarterial() {
        return $this->tensionarterial;
    }

    /**
     * Set tensionarterial
     *
     * @param string $tensionarterial
     * @return Donacion
     */
    public function setTensionarterial($tensionarterial) {
        $this->tensionarterial = $tensionarterial;

        return $this;
    }

    /**
     * Get tensionarterialmax
     *
     * @return string 
     */
    public function getTensionarterialmax() {
        return $this->tensionarterialmax;
    }

    /**
     * Set tensionarterialmax
     *
     * @param string $tensionarterialmax
     * @return Donacion
     */
    public function setTensionarterialmax($tensionarterialmax) {
        $this->tensionarterialmax = $tensionarterialmax;

        return $this;
    }

    /**
     * Get pulso
     *
     * @return string 
     */
    public function getPulso() {
        return $this->pulso;
    }

    /**
     * Set pulso
     *
     * @param string $pulso
     * @return Donacion
     */
    public function setPulso($pulso) {
        $this->pulso = $pulso;

        return $this;
    }

    /**
     * Get temperatura
     *
     * @return string 
     */
    public function getTemperatura() {
        return $this->temperatura;
    }

    /**
     * Set temperatura
     *
     * @param string $temperatura
     * @return Donacion
     */
    public function setTemperatura($temperatura) {
        $this->temperatura = $temperatura;

        return $this;
    }

    /**
     * Get hto
     *
     * @return string 
     */
    public function getHto() {
        return $this->hto;
    }

    /**
     * Set hto
     *
     * @param string $hto
     * @return Donacion
     */
    public function setHto($hto) {
        $this->hto = $hto;

        return $this;
    }

    /**
     * Get inspeccionbrazos
     *
     * @return string 
     */
    public function getInspeccionbrazos() {
        return $this->inspeccionbrazos;
    }

    /**
     * Set inspeccionbrazos
     *
     * @param string $inspeccionbrazos
     * @return Donacion
     */
    public function setInspeccionbrazos($inspeccionbrazos) {
        $this->inspeccionbrazos = $inspeccionbrazos;

        return $this;
    }

    /**
     * Get obs
     *
     * @return string 
     */
    public function getObs() {
        return $this->obs;
    }

    /**
     * Set obs
     *
     * @param string $obs
     * @return Donacion
     */
    public function setObs($obs) {
        $this->obs = $obs;

        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Unidad", mappedBy="Donacion", cascade={"persist"})
     */
    private $Unidades;

    public function __construct() {
        $this->Unidades = new \Doctrine\Common\Collections\ArrayCollection();

        $hoy = new \Datetime('now');
        $this->setFechextraccion($hoy);
        $this->setVencimientobolsa($hoy);
    }

    public function addUnidades(\HSYS\MainBundle\Entity\Unidad $Unidades) {
        $this->Unidades[] = $Unidades;
    }

    public function getUnidades() {
        return $this->Unidades;
    }

    public function crearUnidad(\HSYS\MainBundle\Entity\TipoHemocomponente $TipoHemocomponente, $volumen, $tipobolsa, $nrolote, $marca, $anticoagulante, $vencimientobolsa, $cantidaddedias = 0, $fecharealizacion = null, $factorsang = null, $estado = "Bloqueado") {
        $nuevaunidad = new Unidad;
        if ($fecharealizacion == null) {
            $fecharealizacion1 = $this->fechextraccion;
            $fecharealizacion = $fecharealizacion1->format('Y-m-d');
        }

        if ($cantidaddedias == 0) {
            $sumar = '+' . $TipoHemocomponente->getDuracion() . ' day';
        } else {
            $sumar = '+' . $cantidaddedias . ' day';
        }

        $vencimiento = strtotime($sumar, strtotime($fecharealizacion));
        $vencimiento = date('Y-m-j', $vencimiento);
        $fechaformatvenc = new \DateTime;
        $fechaformatvenc->setDate(substr($vencimiento, 0, 4), substr($vencimiento, 5, 2), substr($vencimiento, 8, 2));
        $nuevaunidad->setVencimiento($fechaformatvenc);

        if ($factorsang == null) {
            $factorsang = $this->getDonante()->getfactorsang();
        }
        $nuevaunidad->setFactorsang($factorsang);
        $nuevaunidad->setVolumen($volumen);
        $nuevaunidad->setIdbolsa($this->getIdbolsa());
        $nuevaunidad->setTipoHemocomponente($TipoHemocomponente);
        $nuevaunidad->setTipobolsa($tipobolsa);
        $nuevaunidad->setNrolote($nrolote);
        $nuevaunidad->setMarca($marca);
        $nuevaunidad->setAnticoagulante($anticoagulante);
        $nuevaunidad->setEstado($estado);
        $nuevaunidad->setDonacion($this);
        $nuevaunidad->setVencimientobolsa($vencimientobolsa);
        $this->addUnidades($nuevaunidad);
    }

    public function setFactores($factorsanguineo) {
        foreach ($this->Unidades as $unidad) {
            $unidad->setFactorsang($factorsanguineo);
        }
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

    public function anularDonacion($nombreTipoExclusion) {
        foreach ($this->getUnidades() as $unidad) {
            $unidad->setEstado("Descartado");
            $unidad->setCausadescarte("Donacion Anulada");
            $unidad->setComentarios($nombreTipoExclusion);
        }
        //todavia no implementado.
        $this->setAnulado($nombreTipoExclusion);
        $this->setTerminado(1);
    }

    /**
     *
     * @var boolean
     * anulado = "null" donacion no anulada.
     * anulado = "motivo" donacion anulada (baja logica) 
     * @ORM\Column(name="anulado", type="string", length=40, nullable=true)  
     */
    private $anulado;

    public function setAnulado($anulado) {
        $this->anulado = $anulado;
        return $this;
    }

    public function getAnulado() {
        return $this->anulado;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="respCuestionario", type="integer", nullable=true)
     */
    private $respCuestionario;

    public function setRespCuestionario($respCuestionario) {
        $this->respCuestionario = $respCuestionario;
        return $this;
    }

    public function getRespCuestionario() {
        return $this->respCuestionario;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="respFisico", type="integer", nullable=true)
     */
    private $respFisico;

    public function setRespFisico($respFisico) {
        $this->respFisico = $respFisico;
        return $this;
    }

    public function getRespFisico() {
        return $this->respFisico;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="respExtraccion", type="integer", nullable=true)
     */
    private $respExtraccion;

    public function setRespExtraccion($respExtraccion) {
        $this->respExtraccion = $respExtraccion;
        return $this;
    }

    public function getRespExtraccion() {
        return $this->respExtraccion;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="respDonacion", type="integer", nullable=true)
     */
    private $respDonacion;

    public function setRespDonacion($respDonacion) {
        $this->respDonacion = $respDonacion;
        return $this;
    }

    public function getRespDonacion() {
        return $this->respDonacion;
    }

}
