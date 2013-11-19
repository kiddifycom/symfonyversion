<?php


namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;
use Kiddify\Bundle\WebsiteBundle\Entity\Contest;
use Kiddify\Bundle\WebsiteBundle\Entity\Country;
use Kiddify\Bundle\WebsiteBundle\Entity\User;


class UserTest extends \BaseTest
{
    public function testSetUser()
    {
        $user= new User();
        $user->setUsername("sansouna");
        $this->assertEquals('sansouna',$user->getUsername());
        $user->setBirthdate("02/05/1988");
        $this->assertEquals('02/05/1988',$user->getBirthdate());
        $user->setAvatarUrl("https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-ash3/1450920_10202798523543392_2110274808_n.jpg");
        $this->assertEquals('https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-ash3/1450920_10202798523543392_2110274808_n.jpg',
                             $user->getAvatarUrl());
        $user->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$user->getCreated());

        $user->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$user->getUpdated());


        $user->setParentEmail("delodi@gmail.net");
        $this->assertEquals('delodi@gmail.net',$user->getParentEmail());

        $user->setPassword("*****");
        $this->assertEquals('*****',$user->getPassword());

        $country= new Country();
        $user->setCountry($country);
        $this->assertEquals($country,$user->getCountry());

        $contest=new Contest();
        $contest->setTitle("contest_Title");
        $user->addContest($contest);
        $this->assertEquals(1, count($user->getContests()));
        $returnedC = $user->getContests()->first();
        $this->assertEquals($contest->getTitle(),$returnedC->getTitle());

        $user->setTcAgree("True");
        $this->assertEquals('True',$user->getTcAgree());

        $user->setCity("Berlin");
        $this->assertEquals('Berlin',$user->getCity());




    }


}