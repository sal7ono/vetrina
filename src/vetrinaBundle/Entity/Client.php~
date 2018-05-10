<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\ClientRepository")
 */
class Client extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
  /**
     * One Client has Many Vetement.
     * @ORM\OneToMany(targetEntity="Vetement",mappedBy="client",cascade={"persist"}))
     * @ORM\JoinColumn(name="Vetement_id", referencedColumnName="id")
     */
    private $vetement;
    /**
     * One Client has Many DemandeAchat.
     * @ORM\OneToMany(targetEntity="DemandeAchat",mappedBy="client")
     * @ORM\JoinColumn(name="DemandeAchat_id", referencedColumnName="id")
     */
    private $demandeachat;
    /**
     * One Client has Many DemandeLocation.
     * @ORM\OneToMany(targetEntity="DemandeLocation",mappedBy="client")
     * @ORM\JoinColumn(name="DemandeLocation_id", referencedColumnName="id")
     */
    private $demandelocation;
    /**
     * One Client has Many DemandeEchange.
     * @ORM\OneToMany(targetEntity="DemandeEchange",mappedBy="client")
     * @ORM\JoinColumn(name="DemandeEchange_id", referencedColumnName="id")
     */
    private $demandeechange;




    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
	 
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=true)
     */
    private $sexe;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaiss", type="date", nullable=true)
     */
    private $datenaiss;

    /**
     * @var string
     *
     * @ORM\Column(name="numtel", type="string", length=255, nullable=true)
     */
    private $numtel;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="codepostal", type="integer", nullable=true)
     */
    private $codepostal;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Client
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Client
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set datenaiss
     *
     * @param \DateTime $datenaiss
     *
     * @return Client
     */
    public function setDatenaiss($datenaiss)
    {
        $this->datenaiss = $datenaiss;

        return $this;
    }

    /**
     * Get datenaiss
     *
     * @return \DateTime
     */
    public function getDatenaiss()
    {
        return $this->datenaiss;
    }

    /**
     * Set numtel
     *
     * @param string $numtel
     *
     * @return Client
     */
    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;

        return $this;
    }

    /**
     * Get numtel
     *
     * @return string
     */
    public function getNumtel()
    {
        return $this->numtel;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Client
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codepostal
     *
     * @param integer $codepostal
     *
     * @return Client
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return int
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Add vetement
     *
     * @param \vetrinaBundle\Entity\Vetement $vetement
     *
     * @return Client
     */
    public function addVetement(\vetrinaBundle\Entity\Vetement $vetement)
    {
        $this->vetement[] = $vetement;

        return $this;
    }

    /**
     * Remove vetement
     *
     * @param \vetrinaBundle\Entity\Vetement $vetement
     */
    public function removeVetement(\vetrinaBundle\Entity\Vetement $vetement)
    {
        $this->vetement->removeElement($vetement);
    }

    /**
     * Get vetement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVetement()
    {
        return $this->vetement;
    }

    /**
     * Add demandeachat
     *
     * @param \vetrinaBundle\Entity\DemandeAchat $demandeachat
     *
     * @return Client
     */
    public function addDemandeachat(\vetrinaBundle\Entity\DemandeAchat $demandeachat)
    {
        $this->demandeachat[] = $demandeachat;

        return $this;
    }

    /**
     * Remove demandeachat
     *
     * @param \vetrinaBundle\Entity\DemandeAchat $demandeachat
     */
    public function removeDemandeachat(\vetrinaBundle\Entity\DemandeAchat $demandeachat)
    {
        $this->demandeachat->removeElement($demandeachat);
    }

    /**
     * Get demandeachat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandeachat()
    {
        return $this->demandeachat;
    }

    /**
     * Add demandelocation
     *
     * @param \vetrinaBundle\Entity\DemandeLocation $demandelocation
     *
     * @return Client
     */
    public function addDemandelocation(\vetrinaBundle\Entity\DemandeLocation $demandelocation)
    {
        $this->demandelocation[] = $demandelocation;

        return $this;
    }

    /**
     * Remove demandelocation
     *
     * @param \vetrinaBundle\Entity\DemandeLocation $demandelocation
     */
    public function removeDemandelocation(\vetrinaBundle\Entity\DemandeLocation $demandelocation)
    {
        $this->demandelocation->removeElement($demandelocation);
    }

    /**
     * Get demandelocation
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandelocation()
    {
        return $this->demandelocation;
    }

    /**
     * Add demandeechange
     *
     * @param \vetrinaBundle\Entity\DemandeEchange $demandeechange
     *
     * @return Client
     */
    public function addDemandeechange(\vetrinaBundle\Entity\DemandeEchange $demandeechange)
    {
        $this->demandeechange[] = $demandeechange;

        return $this;
    }

    /**
     * Remove demandeechange
     *
     * @param \vetrinaBundle\Entity\DemandeEchange $demandeechange
     */
    public function removeDemandeechange(\vetrinaBundle\Entity\DemandeEchange $demandeechange)
    {
        $this->demandeechange->removeElement($demandeechange);
    }

    /**
     * Get demandeechange
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDemandeechange()
    {
        return $this->demandeechange;
    }
    
      public function __construct()
    {
        parent::__construct();
      $this->vetement= new \Doctrine\Common\Collections\ArrayCollection();
      $this->demandeachat= new \Doctrine\Common\Collections\ArrayCollection();
      $this->demandeechange= new \Doctrine\Common\Collections\ArrayCollection();
      $this->demandelocation= new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    
    
    

    /**
     * Set vetement
     *
     * @param \vetrinaBundle\Entity\Vetement $vetement
     *
     * @return Client
     */
    public function setVetement(\vetrinaBundle\Entity\Vetement $vetement = null)
    {
        $this->vetement = $vetement;

        return $this;
    }
}
