<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 11:47 AM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Follow;
use Kiddify\Bundle\WebsiteBundle\Entity\User;

class FollowTest extends \BaseTest
{


    public function testSetFollow()
    {

        $follow=new Follow();
        $user=new User();


        $follow->setFollower($user);
        $this->assertEquals($user,$follow->getFollower());

        $follow->setFollowed($user);
        $this->assertEquals($user,$follow->getFollowed());
    }
}