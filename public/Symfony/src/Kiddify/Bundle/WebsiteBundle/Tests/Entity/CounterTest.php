<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 11:50 AM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Counter;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;

class CounterTest extends \BaseTest
{


    public function testSetCounter()
    {

        $counter=new Counter();
        $counter->setCounter(5);
        $this->assertEquals('5',$counter->getCounter());

        $counter->setKey("something");
        $this->assertEquals('something',$counter->getKey());


        $video=new Video();
        $counter->setVideo($video);
        $this->assertEquals($video,$counter->getVideo());





    }
}
