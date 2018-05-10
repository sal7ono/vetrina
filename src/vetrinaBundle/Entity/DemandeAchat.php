<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DemandeAchat
 *
 * @ORM\Table(name="demande_achat")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\DemandeAchatRepository")
 */
class DemandeAchat
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
     * One DemandeAchat has One Livraison.
     * @ORM\OneToOne(targetEntity="Livraison")
     * @ORM\JoinColumn(name="Livraison_id", referencedColumnName="id")
     */
    private $Livraison;
/**
     * One DemandeAchat has One Client.
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="demandeachat")
     */
    private $client;
/**
     * One DemandeAchat has One Vetement.
     * @ORM\ManyToOne(targetEntity="Vetement", inversedBy="demandeachat")
     */
    private $vetement;
    /**
     * @var bool
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
     * Set etat
     *
     * @param boolean $etat
     *
     * @return DemandeAchat
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
     * @return DemandeAchat
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
     * @return DemandeAchat
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
     * @return DemandeAchat
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
