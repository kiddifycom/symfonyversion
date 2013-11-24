<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:40 AM
 */
namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Filter;
use Kiddify\Bundle\WebsiteBundle\Entity\User;

class FilterTest extends \BaseTest
{


    public function testSetFilter()
    {

        $filter=new Filter();
        $filter->setTitle("filter");
        $this->assertEquals('filter',$filter->getTitle());


        $filter->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$filter->getCreated());

        $filter->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$filter->getUpdated());


        $filter->setDefault("No");
        $this->assertEquals('No',$filter->getDefault());

        $filter->setWeight(100);
        $this->assertEquals('100',$filter->getWeight());


        $user= new User();
        $filter->setUser($user);
        $this->assertEquals($user,$filter->getUser());



    }
}