<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/19/13
 * Time: 10:28 AM
 */


namespace Kiddify\Bundle\WebsiteBundle\Tests\Entity;




use Kiddify\Bundle\WebsiteBundle\Entity\Filter;
use Kiddify\Bundle\WebsiteBundle\Entity\Parameter;

class ParameterTest extends \BaseTest
{


    public function testSetParameter()
    {

        $param=new Parameter();
        $param->setBadgeIds("111,222,333");
        $this->assertEquals('111,222,333',$param->getBadgeIds());

        $param->setCategoryIds("111,222,333");
        $this->assertEquals('111,222,333',$param->getCategoryIds());

        $param->setPeopleId(11);
        $this->assertEquals('11',$param->getPeopleId());

        $param->setSortingId(11);
        $this->assertEquals('11',$param->getSortingId());

        $param->setTagIds("111,222,333");
        $this->assertEquals('111,222,333',$param->getTagIds());

        $filter=new Filter();
        $param->setFilter($filter);
        $this->assertEquals($filter,$param->getFilter());





    }
}
