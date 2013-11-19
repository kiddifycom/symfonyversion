<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:34 AM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Message;
use Kiddify\Bundle\WebsiteBundle\Entity\User;

class MessageTest extends \BaseTest
{


    public function testSetMessage()
    {

        $msg=new Message();
        $msg->setBody("new message");
        $this->assertEquals('new message',$msg->getBody());


        $msg->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$msg->getCreated());

        $msg->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$msg->getUpdated());


        $msg->setSubject("msg");
        $this->assertEquals('msg',$msg->getSubject());

        $msg->setViewed('Yes');
        $this->assertEquals('Yes',$msg->getViewed());

        $user=new User();
        $msg->setRecipient($user);
        $this->assertEquals($user,$msg->getRecipient());

        $msg->setSender($user);
        $this->assertEquals($user,$msg->getSender());



    }
}