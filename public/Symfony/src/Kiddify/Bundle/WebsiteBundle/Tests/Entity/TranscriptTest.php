<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:08 AM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;



use Kiddify\Bundle\WebsiteBundle\Entity\Transcript;
use Kiddify\Bundle\WebsiteBundle\Entity\User;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;

class TranscriptTest extends \BaseTest
{


    public function testSetTranscript()
    {
        $transcript=new Transcript();
        $transcript->setLanguage("De");
        $this->assertEquals('De',$transcript->getLanguage());

        $transcript->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$transcript->getCreated());

        $transcript->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$transcript->getUpdated());

        $transcript->setIsSrt("True");
        $this->assertEquals('True',$transcript->getIsSrt());

        $transcript->setBody("a high quality transcript");
        $this->assertEquals('a high quality transcript',$transcript->getBody());

        $transcript->setVersion(002);
        $this->assertEquals('002',$transcript->getVersion());

        $user= new User();
        $transcript->setUser($user);
        $this->assertEquals($user,$transcript->getUser());

        $video=new Video();
        $transcript->setVideo($video);
        $this->assertEquals($video,$transcript->getVideo());





    }
}