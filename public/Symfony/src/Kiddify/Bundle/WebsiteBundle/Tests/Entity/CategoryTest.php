<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 12:01 PM
 */

namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;


use Kiddify\Bundle\WebsiteBundle\Entity\Category;

class CategoryTest extends \BaseTest
{


    public function testSetCategory()
    {

       $category=new Category();
        $category->setTitle("cooking");
        $this->assertEquals('cooking',$category->getTitle());


        $category->setKey("kid");
        $this->assertEquals('kid',$category->getKey());

        $category->setLanguage("De");
        $this->assertEquals('De',$category->getLanguage());

        $category->setCreated("18/11/2013");
        $this->assertEquals('18/11/2013',$category->getCreated());

        $category->setUpdated("18/11/2013");
        $this->assertEquals('18/11/2013',$category->getUpdated());


    }
}