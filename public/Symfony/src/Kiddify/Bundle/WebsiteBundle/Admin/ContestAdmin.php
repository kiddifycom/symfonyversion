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

class ContestAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('logo_url', 'text', array('label' => 'LOGO'))
            ->add('banner_url', 'text', array('label' => 'Banner'))
            ->add('description_short', 'textarea', array('label' => 'Summary'))
            ->add('description_long', 'textarea', array('label' => 'Description'))
            ->add('badge', 'sonata_type_model_list')
            ->add('date_start', 'date', array('label' => 'Start'))
            ->add('date_end', 'date', array('label' => 'End'))
            ->add('created', 'date', array('label' => 'created'))
            ->add('updated', 'date', array('label' => 'Updated'))


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
            ->add('logo_url')
            ->addIdentifier('badge', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Badge'))
            ->add('banner_url')
            ->add('description_short')
            ->add('description_long')
//            ->add('date_start')
//            ->add('date_end')
//            ->add('created')
//            ->add('updated')
        ;

    }
}