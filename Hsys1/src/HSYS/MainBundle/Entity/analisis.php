<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * analisis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\analisisRepository")
 */
class analisis {

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
     * @ORM\Column(name="fechanalisis", type="date", nullable=true)
     */
    private $fechanalisis;

    /**
     * @var string
     *
     * @ORM\Column(name="chhai", type="string", length=10, nullable=true)
     */
    private $chhai;

    /**
     * @var string
     *
     * @ORM\Column(name="cheia", type="string", length=10, nullable=true)
     */
    private $cheia;

    /**
     * @var string
     *
     * @ORM\Column(name="anticore", type="string", length=10, nullable=true)
     */
    private $anticore;

    /**
     * @var string
     *
     * @ORM\Column(name="hbsag", type="string", length=10, nullable=true)
     */
    private $hbsag;

    /**
     * @var string
     *
     * @ORM\Column(name="hcvagac", type="string", length=10, nullable=true)
     */
    private $hcvagac;

    /**
     * @var string
     *
     * @ORM\Column(name="hivac", type="string", length=10, nullable=true)
     */
    private $hivac;

    /**
     * @var string
     *
     * @ORM\Column(name="agp24", type="string", length=10, nullable=true)
     */
    private $agp24;

    /**
     * @var string
     *
     * @ORM\Column(name="htlv", type="string", length=10, nullable=true)
     */
    private $htlv;

    /**
     * @var string
     *
     * @ORM\Column(name="brucelosis", type="string", length=10, nullable=true)
     */
    private $brucelosis;

    /**
     * @var string
     *
     * @ORM\Column(name="sifilis", type="string", length=10, nullable=true)
     */
    private $sifilis;

    /**
     * @var string
     *
     * @ORM\Column(name="factorsang", type="string", length=10, nullable=true)
     */
    private $factorsang;

    /**
     * @var string
     *
     * @ORM\Column(name="du", type="string", length=10, nullable=true)
     */
    private $du;

    /**
     * @var string
     *
     * @ORM\Column(name="cde", type="string", length=10, nullable=true)
     */
    private $cde;

    /**
     * @var string
     *
     * @ORM\Column(name="fenotipo", type="string", length=10, nullable=true)
     */
    private $fenotipo;

    /**
     * @var string
     *
     * @ORM\Column(name="pci", type="string", length=10, nullable=true)
     */
    private $pci;

    /**
     * @var string
     *
     * @ORM\Column(name="reactivo", type="string", length=10, nullable=true)
     */
    private $reactivo;

    /**
     * @var string
     *
     * @ORM\Column(name="comentario", type="string", length=200, nullable=true)
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
     * Set fechanalisis
     *
     * @param \DateTime $fechanalisis
     * @return analisis
     */
    public function setFechanalisis($fechanalisis) {
        $this->fechanalisis = $fechanalisis;

        return $this;
    }

    /**
     * Get fechanalisis
     *
     * @return \DateTime 
     */
    public function getFechanalisis() {
        return $this->fechanalisis;
    }

    /**
     * Set chhai
     *
     * @param string $chhai
     * @return analisis
     */
    public function setChhai($chhai) {
        $this->chhai = $chhai;

        return $this;
    }

    /**
     * Get chhai
     *
     * @return string 
     */
    public function getChhai() {
        return $this->chhai;
    }

    /**
     * Set cheia
     *
     * @param string $cheia
     * @return analisis
     */
    public function setCheia($cheia) {
        $this->cheia = $cheia;

        return $this;
    }

    /**
     * Get cheia
     *
     * @return string 
     */
    public function getCheia() {
        return $this->cheia;
    }

    /**
     * Set anticore
     *
     * @param string $anticore
     * @return analisis
     */
    public function setAnticore($anticore) {
        $this->anticore = $anticore;

        return $this;
    }

    /**
     * Get anticore
     *
     * @return string 
     */
    public function getAnticore() {
        return $this->anticore;
    }

    /**
     * Set hbsag
     *
     * @param string $hbsag
     * @return analisis
     */
    public function setHbsag($hbsag) {
        $this->hbsag = $hbsag;

        return $this;
    }

    /**
     * Get hbsag
     *
     * @return string 
     */
    public function getHbsag() {
        return $this->hbsag;
    }

    /**
     * Set hcvagac
     *
     * @param string $hcvagac
     * @return analisis
     */
    public function setHcvagac($hcvagac) {
        $this->hcvagac = $hcvagac;

        return $this;
    }

    /**
     * Get hcvagac
     *
     * @return string 
     */
    public function getHcvagac() {
        return $this->hcvagac;
    }

    /**
     * Set hivac
     *
     * @param string $hivac
     * @return analisis
     */
    public function setHivac($hivac) {
        $this->hivac = $hivac;

        return $this;
    }

    /**
     * Get hivac
     *
     * @return string 
     */
    public function getHivac() {
        return $this->hivac;
    }

    /**
     * Set agp24
     *
     * @param string $agp24
     * @return analisis
     */
    public function setAgp24($agp24) {
        $this->agp24 = $agp24;

        return $this;
    }

    /**
     * Get agp24
     *
     * @return string 
     */
    public function getAgp24() {
        return $this->agp24;
    }

    /**
     * Set htlv
     *
     * @param string $htlv
     * @return analisis
     */
    public function setHtlv($htlv) {
        $this->htlv = $htlv;

        return $this;
    }

    /**
     * Get htlv
     *
     * @return string 
     */
    public function getHtlv() {
        return $this->htlv;
    }

    /**
     * Set brucelosis
     *
     * @param string $brucelosis
     * @return analisis
     */
    public function setBrucelosis($brucelosis) {
        $this->brucelosis = $brucelosis;

        return $this;
    }

    /**
     * Get brucelosis
     *
     * @return string 
     */
    public function getBrucelosis() {
        return $this->brucelosis;
    }

    /**
     * Set sifilis
     *
     * @param string $sifilis
     * @return analisis
     */
    public function setSifilis($sifilis) {
        $this->sifilis = $sifilis;

        return $this;
    }

    /**
     * Get sifilis
     *
     * @return string 
     */
    public function getSifilis() {
        return $this->sifilis;
    }

    /**
     * Set du
     *
     * @param string $du
     * @return analisis
     */
    public function setDu($du) {
        $this->du = $du;

        return $this;
    }

    /**
     * Get du
     *
     * @return string 
     */
    public function getDu() {
        return $this->du;
    }

    /**
     * Set cde
     *
     * @param string $cde
     * @return analisis
     */
    public function setCde($cde) {
        $this->cde = $cde;

        return $this;
    }

    /**
     * Get cde
     *
     * @return string 
     */
    public function getCde() {
        return $this->cde;
    }

    /**
     * Set fenotipo
     *
     * @param string $fenotipo
     * @return analisis
     */
    public function setFenotipo($fenotipo) {
        $this->fenotipo = $fenotipo;

        return $this;
    }

    /**
     * Get fenotipo
     *
     * @return string 
     */
    public function getFenotipo() {
        return $this->fenotipo;
    }

    /**
     * Set pci
     *
     * @param string $pci
     * @return analisis
     */
    public function setPci($pci) {
        $this->pci = $pci;

        return $this;
    }

    /**
     * Get pci
     *
     * @return string 
     */
    public function getPci() {
        return $this->pci;
    }

    /**
     * Set reactivo
     *
     * @param string $reactivo
     * @return analisis
     */
    public function setReactivo($reactivo) {
        $this->reactivo = $reactivo;

        return $this;
    }

    /**
     * Get reactivo
     *
     * @return string 
     */
    public function getReactivo() {
        return $this->reactivo;
    }

    /**
     * @ORM\OneToOne(targetEntity="Donacion", mappedBy="analisis")
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
     * Set factorsang
     *
     * @param string $factorsang
     * @return Donante
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

    public function setComentario($comentario){
        $this->comentario = $comentario;
        return $this;
    }
    
    public function getComentario(){
        return $this->comentario;
    }
}
