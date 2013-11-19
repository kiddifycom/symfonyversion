<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 12:04 PM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Badge;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;

class BadgeTest extends \BaseTest
{


    public function testSetBadge()
    {

        $badge=new Badge();
        $badge->setTitle("funny");
        $this->assertEquals('funny',$badge->getTitle());

        $badge->setKey("key");
        $this->assertEquals('key',$badge->getKey());

        $badge->setTranslation("amusant");
        $this->assertEquals('amusant',$badge->getTranslation());

        $badge->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$badge->getCreated());

        $badge->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$badge->getUpdated());

        $badge->setUrl("http://badge.png");
        $this->assertEquals('http://badge.png',$badge->getUrl());


        $video=new Video();
        $video->setTitle("cook cook ");
        $badge->addVideo($video);

        $this->assertEquals(1, count($badge->getVideo()));
        $returnedVideo = $badge->getVideo()->first();
        $this->assertEquals($video->getTitle(),$returnedVideo->getTitle());


    }
}