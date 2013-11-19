<?php
namespace Kiddify\Bundle\WebsiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Follow
 *
 * @ORM\Table(name="follow")
 * @ORM\Entity
 */
class Follow
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="followers")
     * @ORM\JoinColumn(name="follower_id", referencedColumnName="id")
     *
     */
    private $follower;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="followeds")
     * @ORM\JoinColumn(name="followed_id", referencedColumnName="id")
     *
     */
    private $followed;


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
     * Set follower
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\User $followers
     * @return Follow
     */
    public function setFollower(\Kiddify\Bundle\WebsiteBundle\Entity\User $follower = null)
    {
        $this->follower = $follower;

        return $this;
    }

    /**
     * Get follower
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\User
     */
    public function getFollower()
    {
        return $this->follower;
    }

    /**
     * Set followed
     *
     * @param \Kiddify\Bundle\WebsiteBundle\Entity\User $followeds
     * @return Follow
     */
    public function setFollowed(\Kiddify\Bundle\WebsiteBundle\Entity\User $followed = null)
    {
        $this->followed = $followed;

        return $this;
    }

    /**
     * Get followed
     *
     * @return \Kiddify\Bundle\WebsiteBundle\Entity\User
     */
    public function getFollowed()
    {
        return $this->followed;
    }



}