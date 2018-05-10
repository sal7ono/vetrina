<?php

namespace vetrinaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="vetrinaBundle\Repository\LivraisonRepository")
 */
class Livraison
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateLiv", type="date", nullable=true)
     */
    private $dateLiv;
/**
     * @var string
     *
     * @ORM\Column(name="pdf", type="string",length=255, nullable=true)
     */
    private $pdf;

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
     * Set dateLiv
     *
     * @param \DateTime $dateLiv
     *
     * @return Livraison
     */
    public function setDateLiv($dateLiv)
    {
        $this->dateLiv = $dateLiv;

        return $this;
    }

    /**
     * Get dateLiv
     *
     * @return \DateTime
     */
    public function getDateLiv()
    {
        return $this->dateLiv;
    }

    /**
     * Set pdf
     *
     * @param string $pdf
     *
     * @return Livraison
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * Get pdf
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }
}
