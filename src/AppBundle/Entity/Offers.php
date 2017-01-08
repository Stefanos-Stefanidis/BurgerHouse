<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offers
 *
 * @ORM\Table(name="offers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffersRepository")
 */
class Offers
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
     * @var string
     *
     * @ORM\Column(name="product", type="string", length=255)
     */
    private $product;

    /**
     * @var float
     *
     * @ORM\Column(name="times", type="float")
     */
    private $times;

    /**
     * @var string
     *
     * @ORM\Column(name="offer", type="string", length=255)
     */
    private $offer;


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
     * Set product
     *
     * @param string $product
     *
     * @return Offers
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set times
     *
     * @param float $times
     *
     * @return Offers
     */
    public function setTimes($times)
    {
        $this->times = $times;

        return $this;
    }

    /**
     * Get times
     *
     * @return float
     */
    public function getTimes()
    {
        return $this->times;
    }

    /**
     * Set offer
     *
     * @param string $offer
     *
     * @return Offers
     */
    public function setOffer($offer)
    {
        $this->offer = $offer;

        return $this;
    }

    /**
     * Get offer
     *
     * @return string
     */
    public function getOffer()
    {
        return $this->offer;
    }
}

