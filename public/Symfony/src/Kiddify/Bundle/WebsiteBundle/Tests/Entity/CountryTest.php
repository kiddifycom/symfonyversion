<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:48 AM
 */


namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Country;

class CountryTest extends \BaseTest
{


    public function testSetCountry()
    {

        $country=new Country();
        $country->setName("Germany");
        $this->assertEquals('Germany',$country->getName());


    }

}