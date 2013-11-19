<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:17 AM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Tag;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;

class TagTest extends \BaseTest
{


    public function testSetTag()
    {
        $tag=new Tag();
        $tag->setLanguage("De");
        $this->assertEquals('De',$tag->getLanguage());


        $tag->setTitle("tag_title");
        $this->assertEquals('tag_title',$tag->getTitle());

        $tag->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$tag->getCreated());

        $tag->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$tag->getUpdated());

        $video= new Video();
        $video->setTitle("video_title");
        $tag->addVideo($video);

        $this->assertEquals(1, count($tag->getVideo()));
        $returnedV = $tag->getVideo()->first();
        $this->assertEquals($video->getTitle(),$returnedV->getTitle());



    }
}