<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/18/13
 * Time: 4:19 PM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;
use Kiddify\Bundle\WebsiteBundle\Entity\Badge;
use Kiddify\Bundle\WebsiteBundle\Entity\Category;
use Kiddify\Bundle\WebsiteBundle\Entity\Contest;
use Kiddify\Bundle\WebsiteBundle\Entity\Tag;
use Kiddify\Bundle\WebsiteBundle\Entity\User;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;


class VideoTest extends \BaseTest
{


    public function testSetVideo()
    {

        $video=new Video();
        $video->setId(11);
        $this->assertEquals('11',$video->getId());

        $video->setTitle("title");
        $this->assertEquals('title',$video->getTitle());

        $video->setPreviewUrl("https://i1.ytimg.com/vi/fTgSCizDRAQ/mqdefault.jpg");
        $this->assertEquals('https://i1.ytimg.com/vi/fTgSCizDRAQ/mqdefault.jpg',$video->getPreviewUrl());

        $video->setUrl("https://www.youtube.com/watch?v=fTgSCizDRAQ");
        $this->assertEquals('https://www.youtube.com/watch?v=fTgSCizDRAQ',$video->getUrl());

        $video->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$video->getCreated());

        $video->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$video->getUpdated());

        $video->setAccepted("18/11/2013");
        $this->assertEquals('18/11/2013',$video->getAccepted());

        $category= new Category();
        $video->setCategory($category);
        $this->assertEquals($category,$video->getCategory());

        $tag= new Tag();
        $tag->setTitle("taggino");
        $video->addTag($tag);

        $this->assertEquals(1, count($video->getTag()));
        $returnedTag = $video->getTag()->first();
        $this->assertEquals($tag->getTitle(),$returnedTag->getTitle());

        $badge= new Badge();
        $badge->setTitle("badge");
        $video->addBadge($badge);
        $this->assertEquals(1, count($video->getBadge()));
        $returnedBadge = $video->getBadge()->first();
        $this->assertEquals($badge->getTitle(),$returnedBadge->getTitle());

        $user= new User();
        $video->setUser($user);
        $this->assertEquals($user,$video->getUser());

        $contest= new Contest();
        $video->setContest($contest);
        $this->assertEquals($contest,$video->getContest());






    }


}