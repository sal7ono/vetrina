<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeLocation
 *
 * @ORM\Table(name="demande_location")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\DemandeLocationRepository")
 */
class DemandeLocation
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
     * One DemandeLocation has One Livraison.
     * @ORM\OneToOne(targetEntity="Livraison")
     * @ORM\JoinColumn(name="Livraison_id", referencedColumnName="id")
     */
    private $Livraison;
 /**
     * One DemandeLocation has One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="demandelocation")
     */
    private $client;
/**
     * One DemandeLocation has One Vetement.
     * @ORM\ManyToOne(targetEntity="Vetement", inversedBy="demandelocation")
     */
    private $vetement;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateloc", type="date", nullable=true)
     */
    private $dateloc;

     /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", columnDefinition="enum('valide', 'echec','attente')")
     */
    private $etat;


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
     * Set dateloc
     *
     * @param \DateTime $dateloc
     *
     * @return DemandeLocation
     */
    public function setDateloc($dateloc)
    {
        $this->dateloc = $dateloc;

        return $this;
    }

    /**
     * Get dateloc
     *
     * @return \DateTime
     */
    public function getDateloc()
    {
        return $this->dateloc;
    }

    /**
     * Set etat
     *
     * @param boolean $etat
     *
     * @return DemandeLocation
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return bool
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set livraison
     *
     * @param \vetrinaBundle\Entity\Livraison $livraison
     *
     * @return DemandeLocation
     */
    public function setLivraison(\vetrinaBundle\Entity\Livraison $livraison = null)
    {
        $this->Livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison
     *
     * @return \vetrinaBundle\Entity\Livraison
     */
    public function getLivraison()
    {
        return $this->Livraison;
    }

    /**
     * Set client
     *
     * @param \vetrinaBundle\Entity\Client $client
     *
     * @return DemandeLocation
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
     * Set vetement
     *
     * @param \vetrinaBundle\Entity\Vetement $vetement
     *
     * @return DemandeLocation
     */
    public function setVetement(\vetrinaBundle\Entity\Vetement $vetement = null)
    {
        $this->vetement = $vetement;

        return $this;
    }

    /**
     * Get vetement
     *
     * @return \vetrinaBundle\Entity\Vetement
     */
    public function getVetement()
    {
        return $this->vetement;
    }
}
