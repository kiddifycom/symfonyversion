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

class FilterAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('weight', 'text', array('label' => 'Weight'))
            ->add('default', 'radio', array('label' => 'As Default'))
            ->add('created', 'date', array('label' => 'created'))
            ->add('updated', 'date', array('label' => 'Updated'))

//            ->add('user_id',  'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\User'))

        ;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')


        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
//            ->addIdentifier('user_id', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\User'))
            ->add('weight')
            ->add('default')
            ->add('created')
            ->add('updated')
        ;

    }
}