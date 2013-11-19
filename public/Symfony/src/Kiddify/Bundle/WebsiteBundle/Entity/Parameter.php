<?php

namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parameter
 *
 * @ORM\Table(name="parameter")
 * @ORM\Entity
 */
class Parameter
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
     * @var integer
     *
     * @ORM\Column(name="sorting_id", type="integer", nullable=true)
     */
    private $sortingId;

    /**
     * @var integer
     *
     * @ORM\Column(name="people_id", type="integer", nullable=true)
     */
    private $peopleId;

    /**
     * @var string
     *
     * @ORM\Column(name="tag_ids", type="text", nullable=true)
     */
    private $tagIds;

    /**
     * @var string
     *
     * @ORM\Column(name="category_ids", type="text", nullable=true)
     */
    private $categoryIds;

    /**
     * @var string
     *
     * @ORM\Column(name="badge_ids", type="text", nullable=true)
     */
    private $badgeIds;

    /**
     * @var \Filter
     *
     * @ORM\ManyToOne(targetEntity="Filter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="filter_id", referencedColumnName="id")
     * })
     */
    private $filter;



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
     * Set sortingId
     *
     * @param integer $sortingId
     * @return Parameter
     */
    public function setSortingId($sortingId)
    {
        $this->sortingId = $sortingId;
    
        return $this;
    }

    /**
     * Get sortingId
     *
     * @return integer 
     */
    public function getSortingId()
    {
        return $this->sortingId;
    }

    /**
     * Set peopleId
     *
     * @param integer $peopleId
     * @return Parameter
     */
    public function setPeopleId($peopleId)
    {
        $this->peopleId = $peopleId;
    
        return $this;
    }

    /**
     * Get peopleId
     *
     * @return integer 
     */
    public function getPeopleId()
    {
        return $this->peopleId;
    }

    /**
     * Set tagIds
     *
     * @param string $tagIds
     * @return Parameter
     */
    public function setTagIds($tagIds)
    {
        $this->tagIds = $tagIds;
    
        return $this;
    }

    /**
     * Get tagIds
     *
     * @return string 
     */
    public function getTagIds()
    {
        return $this->tagIds;
    }

    /**
     * Set categoryIds
     *
     * @param string $categoryIds
     * @return Parameter
     */
    public function setCategoryIds($categoryIds)
    {
        $this->categoryIds = $categoryIds;
    
        return $this;
    }

    /**
     * Get categoryIds
     *
     * @return string 
     */
    public function getCategoryIds()
    {
        return $this->categoryIds;
    }

    /**
     * Set badgeIds
     *
     * @param string $badgeIds
     * @return Parameter
     */
    public function setBadgeIds($badgeIds)
    {
        $this->badgeIds = $badgeIds;
    
        return $this;
    }

    /**
     * Get badgeIds
     *
     * @return string 
     */
    public function getBadgeIds()
    {
        return $this->badgeIds;
    }

    /**
     * Set filter
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Filter $filter
     * @return Parameter
     */
    public function setFilter(\Kiddify\Bundle\WebsiteBundle\Entity\Filter $filter = null)
    {
        $this->filter = $filter;
    
        return $this;
    }

    /**
     * Get filter
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Filter 
     */
    public function getFilter()
    {
        return $this->filter;
    }
}