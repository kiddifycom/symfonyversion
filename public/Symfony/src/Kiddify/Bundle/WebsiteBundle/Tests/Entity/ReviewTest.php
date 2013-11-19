<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:25 AM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Review;
use Kiddify\Bundle\WebsiteBundle\Entity\User;
use Kiddify\Bundle\WebsiteBundle\Entity\Video;

class ReviewTest extends \BaseTest
{


    public function testSetReview()
    {


        $review=new Review();


        $review->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$review->getCreated());

        $review->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$review->getUpdated());


        $user= new User();
        $review->setUser($user);
        $this->assertEquals($user,$review->getUser());

        $video= new Video();
        $review->setVideo($video);
        $this->assertEquals($video,$review->getVideo());



    }
}