<?php

namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accepted", type="date", nullable=true)
     */
    private $accepted;

    /**
     * @var string
     *
     * @ORM\Column(name="preview_url", type="string", length=255, nullable=true)
     */
    private $previewUrl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Badge", mappedBy="video")
     */
    private $badge;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="video")
     * @ORM\JoinTable(name="video_tag",
     *   joinColumns={
     *     @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Contest
     *
     * @ORM\ManyToOne(targetEntity="Contest")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="contest_id", referencedColumnName="id")
     * })
     */
    private $contest;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badge = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }
    



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
     * Set title
     *
     * @param string $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set accepted
     *
     * @param \DateTime $accepted
     * @return Video
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;
    
        return $this;
    }

    /**
     * Get accepted
     *
     * @return \DateTime 
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * Set previewUrl
     *
     * @param string $previewUrl
     * @return Video
     */
    public function setPreviewUrl($previewUrl)
    {
        $this->previewUrl = $previewUrl;
    
        return $this;
    }

    /**
     * Get previewUrl
     *
     * @return string 
     */
    public function getPreviewUrl()
    {
        return $this->previewUrl;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Video
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Video
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add badge
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge
     * @return Video
     */
    public function addBadge(\Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge)
    {
        $this->badge[] = $badge;
    
        return $this;
    }

    /**
     * Remove badge
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge
     */
    public function removeBadge(\Kiddify\Bundle\WebsiteBundle\Entity\Badge $badge)
    {
        $this->badge->removeElement($badge);
    }

    /**
     * Get badge
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * Add tag
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Tag $tag
     * @return Video
     */
    public function addTag(\Kiddify\Bundle\WebsiteBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;
    
        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Tag $tag
     */
    public function removeTag(\Kiddify\Bundle\WebsiteBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set user
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\User $user
     * @return Video
     */
    public function setUser(\Kiddify\Bundle\WebsiteBundle\Entity\User $user)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set contest
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Contest $contest
     * @return Video
     */
    public function setContest(\Kiddify\Bundle\WebsiteBundle\Entity\Contest $contest = null)
    {
        $this->contest = $contest;
    
        return $this;
    }

    /**
     * Get contest
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Contest 
     */
    public function getContest()
    {
        return $this->contest;
    }

    /**
     * Set category
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\Category $category
     * @return Video
     */
    public function setCategory(\Kiddify\Bundle\WebsiteBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}