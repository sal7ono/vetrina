<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\validator\Constraints as Assert;

/**
 * Vetement
 *
 * @ORM\Table(name="vetement")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\VetementRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Vetement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
 /**
     * One vetement has One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="vetement")
     */
    private $client;
/**
     * One Client has Many DemandeAchat.
     * @ORM\OneToMany(targetEntity="DemandeAchat",mappedBy="vetement")
     * @ORM\JoinColumn(name="DemandeAchat_id", referencedColumnName="id")
     */
    private $demandeachat;
    /**
     * One vetement has Many DemandeLocation.
     * @ORM\OneToMany(targetEntity="DemandeLocation",mappedBy="vetement")
     * @ORM\JoinColumn(name="DemandeLocation_id", referencedColumnName="id")
     */
    private $demandelocation;
    /**
     * One Client has Many DemandeEchange.
     * @ORM\OneToMany(targetEntity="DemandeEchange",mappedBy="vetement")
     * @ORM\JoinColumn(name="DemandeEchange_id", referencedColumnName="id")
     */
    private $demandeechange;

    
    
    
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomvet", type="string", length=255, nullable=true)
     */
    private $nomvet;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="etatVet", type="string", length=255, nullable=true)
     */
    private $etatVet;

    /**
     * @var int
     *
     * @ORM\Column(name="prixloc", type="integer", nullable=true)
     */
    private $prixloc;

    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer", nullable=true)
     */
    private $prix;

    /**
     * @var bool
     *
     * @ORM\Column(name="disponibilite", type="boolean", nullable=true)
     */
    private $disponibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=true)
     */
    private $categorie;

 
    
    /**
     * @ORM\Column(type="string",length=255, nullable=true) 
     */
    private $path;
    
    public $file;
     public function getUploadRootDir()
    {
        return __dir__.'/../../../web/uploads';
    }
     public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }

/**
     * @ORM\PrePersist()
     * @ORM\PreUpdate() 
     */
    public function preUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
        $this->oldFile = $this->getPath();
        if (null !== $this->file) 
            $this->path = sha1(uniqid(mt_rand(),true)).'.'.$this->file->guessExtension();
    }
     /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate() 
     */
    public function upload()
    {
        if (null !== $this->file) {
            $this->file->move($this->getUploadRootDir(),$this->path);
            unset($this->file);
            
            if ($this->oldFile != null) unlink($this->tempFile);
        }
    }
/**
     * @ORM\PreRemove() 
     */
    public function preRemoveUpload()
    {
        $this->tempFile = $this->getAbsolutePath();
    }
    
    /**
     * @ORM\PostRemove() 
     */
    public function removeUpload()
    {
        if (file_exists($this->tempFile)) unlink($this->tempFile);
    }    
   
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
     * Set nomvet
     *
     * @param string $nomvet
     *
     * @return Vetement
     */
    public function setNomvet($nomvet)
    {
        $this->nomvet = $nomvet;

        return $this;
    }

    /**
     * Get nomvet
     *
     * @return string
     */
    public function getNomvet()
    {
        return $this->nomvet;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Vetement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return Vetement
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return Vetement
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set etatVet
     *
     * @param string $etatVet
     *
     * @return Vetement
     */
    public function setEtatVet($etatVet)
    {
        $this->etatVet = $etatVet;

        return $this;
    }

    /**
     * Get etatVet
     *
     * @return string
     */
    public function getEtatVet()
    {
        return $this->etatVet;
    }

    /**
     * Set prixloc
     *
     * @param integer $prixloc
     *
     * @return Vetement
     */
    public function setPrixloc($prixloc)
    {
        $this->prixloc = $prixloc;

        return $this;
    }

    /**
     * Get prixloc
     *
     * @return int
     */
    public function getPrixloc()
    {
        return $this->prixloc;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     *
     * @return Vetement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return int
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set disponibilite
     *
     * @param boolean $disponibilite
     *
     * @return Vetement
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return bool
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Vetement
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
public function getPath()
    {
        return $this->path;
    }
    
   
    
    
    /**
     * Set path
     *
     * @param string $path
     * @return String
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }
    
   
   
        
    
   
    /**
     * Set client
     *
     * @param \vetrinaBundle\Entity\Client $client
     *
     * @return Vetement
     */
    public function setClient(\vetrinaBundle\Entity\Client $client = null)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return \vetrinaBundle\Entity\Client
     */
    public function getClient()
    {
        return $this->client;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->demandeachat = new \Doctrine\Common\Collections\ArrayCollection();
        $this->demandelocation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->demandeechange = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add demandeachat
     *
     * @param \vetrinaBundle\Entity\DemandeAchat $demandeachat
     *
     * @return Vetement
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
     * @return Vetement
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
     * @return Vetement
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

    /**
     * Add client
     *
     * @param \vetrinaBundle\Entity\Client $client
     *
     * @return Vetement
     */
    public function addClient(\vetrinaBundle\Entity\Client $client)
    {
        $this->client[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \vetrinaBundle\Entity\Client $client
     */
    public function removeClient(\vetrinaBundle\Entity\Client $client)
    {
        $this->client->removeElement($client);
    }
}
