<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/20/13
 * Time: 1:16 PM
 */
namespace Kiddify\Bundle\WebsiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('username', 'text', array('label' => 'username'))
            ->add('email', 'text', array('label' => 'email'))
            ->add('password', 'text', array('label' => 'password'))
            ->add('avatar_url', 'file', array('label' => 'avatar'))
            ->add('schoolname', 'text', array('label' => 'school name'))
            ->add('parent_email', 'text', array('label' => 'parent email'))
            ->add('tc_agree', 'radio', array('label' => 'agreement'))

            ->add('city', 'text', array('label' => 'city'))
            ->add('birthdate', 'date', array('label' => 'birthday'))



        ;
    }

    // Fields to be shown on filter forms
//    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
//    {
//        $datagridMapper
//            ->add('username')
//            ->add('email')
//
//        ;
//    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->addIdentifier('email')
            ->add('password')
            ->add('avatar_url')
            ->add('schoolname')
            ->add('parent_email')
            ->add('tc_agree')
            ->add('country', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Country'))
            ->add('city')
            ->add('birthdate')
            ->add('created')
            ->add('updated')

        ;
    }
}