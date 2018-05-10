<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeEchange
 *
 * @ORM\Table(name="demande_echange")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\DemandeEchangeRepository")
 */
class DemandeEchange
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
     * One DemandeEchange has One Livraison.
     * @ORM\OneToOne(targetEntity="Livraison")
     * @ORM\JoinColumn(name="Livraison_id", referencedColumnName="id")
     */
    
    private $Livraison;
/**
     * One DemandeEchange has One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="demandeechange")
     */
    private $client;    
    /**
     * One DemandeEchange has One Vetement.
     * @ORM\ManyToOne(targetEntity="Vetement", inversedBy="demandeechange")
     */
    private $vetement;
    
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", columnDefinition="enum('valide', 'echec','attente')")
     */
    private $etat;
    /**
     * @var int
     *
     * @ORM\Column(name="echanger", type="integer")
     */
    private $echanger;

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
     * Set etat
     *
     * @param string $etat
     *
     * @return DemandeEchange
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
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
     * @return DemandeEchange
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
     * @return DemandeEchange
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
     * @return DemandeEchange
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

    /**
     * Set echanger
     *
     * @param integer $echanger
     *
     * @return DemandeEchange
     */
    public function setEchanger($echanger)
    {
        $this->echanger = $echanger;

        return $this;
    }

    /**
     * Get echanger
     *
     * @return integer
     */
    public function getEchanger()
    {
        return $this->echanger;
    }
}
