<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 11:54 AM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;



use Kiddify\Bundle\WebsiteBundle\Entity\Badge;
use Kiddify\Bundle\WebsiteBundle\Entity\Contest;
use Kiddify\Bundle\WebsiteBundle\Entity\User;

class ContestTest extends \BaseTest
{


    public function testSetContest()
    {

        $contest=new Contest();
        $contest->setTitle("title");
        $this->assertEquals('title',$contest->getTitle());

        $contest->setBannerUrl("https://url.html");
        $this->assertEquals('https://url.html',$contest->getBannerUrl());

        $contest->setDescriptionLong("loooooooooong description");
        $this->assertEquals('loooooooooong description',$contest->getDescriptionLong());

        $contest->setDescriptionShort("short description");
        $this->assertEquals('short description',$contest->getDescriptionShort());

        $contest->setLogoUrl("http://logo.jpg");
        $this->assertEquals('http://logo.jpg',$contest->getLogoUrl());

        $contest->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$contest->getCreated());

        $contest->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$contest->getUpdated());

        $contest->setDateStart("18/11/2013");
        $this->assertEquals('18/11/2013',$contest->getDateStart());

        $contest->setDateEnd("18/11/2013");
        $this->assertEquals('18/11/2013',$contest->getDateEnd());


        $badge=new Badge();
        $contest->setBadge($badge);
        $this->assertEquals($badge,$contest->getBadge());


        $user=new User();
        $user->setUsername("sansouna");
        $contest->addUser($user);
        $this->assertEquals(1, count($contest->getUsers()));
        $returnedUser = $contest->getUsers()->first();
        $this->assertEquals($user->getUsername(),$returnedUser->getUsername());





    }
}