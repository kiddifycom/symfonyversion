<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:21 AM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;



use Kiddify\Bundle\WebsiteBundle\Entity\Review;
use Kiddify\Bundle\WebsiteBundle\Entity\ReviewCriteria;

class ReviewCriteriaTest extends \BaseTest
{


    public function testSetReviewCriteria()
    {

        $rc=new ReviewCriteria();
        $rc->setAchived('false');
        $this->assertEquals('false',$rc->getAchived());

        $rc->setKey("a key");
        $this->assertEquals('a key',$rc->getKey());

        $review=new Review();
        $rc->setReview($review);
        $this->assertEquals($review,$rc->getReview());



    }
}