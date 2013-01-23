<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * analisis
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="HSYS\MainBundle\Entity\analisisRepository")
 */
class analisis
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
     * @var \DateTime
     *
     * @ORM\Column(name="fechanalisis", type="date")
     */
    private $fechanalisis;

    /**
     * @var string
     *
     * @ORM\Column(name="chhai", type="string", length=10)
     */
    private $chhai;

    /**
     * @var string
     *
     * @ORM\Column(name="cheza", type="string", length=10)
     */
    private $cheza;

    /**
     * @var string
     *
     * @ORM\Column(name="anticore", type="string", length=10)
     */
    private $anticore;

    /**
     * @var string
     *
     * @ORM\Column(name="hbsag", type="string", length=10)
     */
    private $hbsag;

    /**
     * @var string
     *
     * @ORM\Column(name="hcvagac", type="string", length=10)
     */
    private $hcvagac;

    /**
     * @var string
     *
     * @ORM\Column(name="hivac", type="string", length=10)
     */
    private $hivac;

    /**
     * @var string
     *
     * @ORM\Column(name="agp2y", type="string", length=10)
     */
    private $agp2y;

    /**
     * @var string
     *
     * @ORM\Column(name="htlv", type="string", length=10)
     */
    private $htlv;

    /**
     * @var string
     *
     * @ORM\Column(name="brucelosis", type="string", length=10)
     */
    private $brucelosis;

    /**
     * @var string
     *
     * @ORM\Column(name="sifilis", type="string", length=10)
     */
    private $sifilis;

    /**
     * @var string
     *
     * @ORM\Column(name="abo", type="string", length=10)
     */
    private $abo;

    /**
     * @var string
     *
     * @ORM\Column(name="rhd", type="string", length=10)
     */
    private $rhd;

    /**
     * @var string
     *
     * @ORM\Column(name="du", type="string", length=10)
     */
    private $du;

    /**
     * @var string
     *
     * @ORM\Column(name="cde", type="string", length=10)
     */
    private $cde;

    /**
     * @var string
     *
     * @ORM\Column(name="fenotipo", type="string", length=10)
     */
    private $fenotipo;

    /**
     * @var string
     *
     * @ORM\Column(name="pci", type="string", length=10)
     */
    private $pci;


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
     * Set fechanalisis
     *
     * @param \DateTime $fechanalisis
     * @return analisis
     */
    public function setFechanalisis($fechanalisis)
    {
        $this->fechanalisis = $fechanalisis;
    
        return $this;
    }

    /**
     * Get fechanalisis
     *
     * @return \DateTime 
     */
    public function getFechanalisis()
    {
        return $this->fechanalisis;
    }

    /**
     * Set chhai
     *
     * @param string $chhai
     * @return analisis
     */
    public function setChhai($chhai)
    {
        $this->chhai = $chhai;
    
        return $this;
    }

    /**
     * Get chhai
     *
     * @return string 
     */
    public function getChhai()
    {
        return $this->chhai;
    }

    /**
     * Set cheza
     *
     * @param string $cheza
     * @return analisis
     */
    public function setCheza($cheza)
    {
        $this->cheza = $cheza;
    
        return $this;
    }

    /**
     * Get cheza
     *
     * @return string 
     */
    public function getCheza()
    {
        return $this->cheza;
    }

    /**
     * Set anticore
     *
     * @param string $anticore
     * @return analisis
     */
    public function setAnticore($anticore)
    {
        $this->anticore = $anticore;
    
        return $this;
    }

    /**
     * Get anticore
     *
     * @return string 
     */
    public function getAnticore()
    {
        return $this->anticore;
    }

    /**
     * Set hbsag
     *
     * @param string $hbsag
     * @return analisis
     */
    public function setHbsag($hbsag)
    {
        $this->hbsag = $hbsag;
    
        return $this;
    }

    /**
     * Get hbsag
     *
     * @return string 
     */
    public function getHbsag()
    {
        return $this->hbsag;
    }

    /**
     * Set hcvagac
     *
     * @param string $hcvagac
     * @return analisis
     */
    public function setHcvagac($hcvagac)
    {
        $this->hcvagac = $hcvagac;
    
        return $this;
    }

    /**
     * Get hcvagac
     *
     * @return string 
     */
    public function getHcvagac()
    {
        return $this->hcvagac;
    }

    /**
     * Set hivac
     *
     * @param string $hivac
     * @return analisis
     */
    public function setHivac($hivac)
    {
        $this->hivac = $hivac;
    
        return $this;
    }

    /**
     * Get hivac
     *
     * @return string 
     */
    public function getHivac()
    {
        return $this->hivac;
    }

    /**
     * Set agp2y
     *
     * @param string $agp2y
     * @return analisis
     */
    public function setAgp2y($agp2y)
    {
        $this->agp2y = $agp2y;
    
        return $this;
    }

    /**
     * Get agp2y
     *
     * @return string 
     */
    public function getAgp2y()
    {
        return $this->agp2y;
    }

    /**
     * Set htlv
     *
     * @param string $htlv
     * @return analisis
     */
    public function setHtlv($htlv)
    {
        $this->htlv = $htlv;
    
        return $this;
    }

    /**
     * Get htlv
     *
     * @return string 
     */
    public function getHtlv()
    {
        return $this->htlv;
    }

    /**
     * Set brucelosis
     *
     * @param string $brucelosis
     * @return analisis
     */
    public function setBrucelosis($brucelosis)
    {
        $this->brucelosis = $brucelosis;
    
        return $this;
    }

    /**
     * Get brucelosis
     *
     * @return string 
     */
    public function getBrucelosis()
    {
        return $this->brucelosis;
    }

    /**
     * Set sifilis
     *
     * @param string $sifilis
     * @return analisis
     */
    public function setSifilis($sifilis)
    {
        $this->sifilis = $sifilis;
    
        return $this;
    }

    /**
     * Get sifilis
     *
     * @return string 
     */
    public function getSifilis()
    {
        return $this->sifilis;
    }

    /**
     * Set abo
     *
     * @param string $abo
     * @return analisis
     */
    public function setAbo($abo)
    {
        $this->abo = $abo;
    
        return $this;
    }

    /**
     * Get abo
     *
     * @return string 
     */
    public function getAbo()
    {
        return $this->abo;
    }

    /**
     * Set rhd
     *
     * @param string $rhd
     * @return analisis
     */
    public function setRhd($rhd)
    {
        $this->rhd = $rhd;
    
        return $this;
    }

    /**
     * Get rhd
     *
     * @return string 
     */
    public function getRhd()
    {
        return $this->rhd;
    }

    /**
     * Set du
     *
     * @param string $du
     * @return analisis
     */
    public function setDu($du)
    {
        $this->du = $du;
    
        return $this;
    }

    /**
     * Get du
     *
     * @return string 
     */
    public function getDu()
    {
        return $this->du;
    }

    /**
     * Set cde
     *
     * @param string $cde
     * @return analisis
     */
    public function setCde($cde)
    {
        $this->cde = $cde;
    
        return $this;
    }

    /**
     * Get cde
     *
     * @return string 
     */
    public function getCde()
    {
        return $this->cde;
    }

    /**
     * Set fenotipo
     *
     * @param string $fenotipo
     * @return analisis
     */
    public function setFenotipo($fenotipo)
    {
        $this->fenotipo = $fenotipo;
    
        return $this;
    }

    /**
     * Get fenotipo
     *
     * @return string 
     */
    public function getFenotipo()
    {
        return $this->fenotipo;
    }

    /**
     * Set pci
     *
     * @param string $pci
     * @return analisis
     */
    public function setPci($pci)
    {
        $this->pci = $pci;
    
        return $this;
    }

    /**
     * Get pci
     *
     * @return string 
     */
    public function getPci()
    {
        return $this->pci;
    }
}
