<?php

namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReviewCriteria
 *
 * @ORM\Table(name="review_criteria")
 * @ORM\Entity
 */
class ReviewCriteria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="achived", type="boolean", nullable=true)
     */
    private $achived;

    /**
     * @var string
     *
     * @ORM\Column(name="text_key", type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @var \Review
     *
     * @ORM\ManyToOne(targetEntity="Review")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="review_id", referencedColumnName="id")
     * })
     */
    private $review;



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
     * Set achived
     *
     * @param boolean $achived
     * @return ReviewCriteria
     */
    public function setAchived($achived)
    {
        $this->achived = $achived;
    
        return $this;
    }

    /**
     * Get achived
     *
     * @return boolean 
     */
    public function getAchived()
    {
        return $this->achived;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return ReviewCriteria
     */
    public function setKey($key)
    {
        $this->key = $key;
    
        return $this;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set review
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Review $review
     * @return ReviewCriteria
     */
    public function setReview(\Kiddify\Bundle\WebsiteBundle\Entity\Review $review = null)
    {
        $this->review = $review;
    
        return $this;
    }

    /**
     * Get review
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Review 
     */
    public function getReview()
    {
        return $this->review;
    }
}