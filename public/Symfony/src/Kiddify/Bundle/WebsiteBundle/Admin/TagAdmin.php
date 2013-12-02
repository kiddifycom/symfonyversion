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

class TagAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('language', 'text', array('label' => 'Language'))

            ->add('created', 'date', array('label' => 'created'))
            ->add('updated', 'date', array('label' => 'Updated'))

            ->with('videos')
            ->add('video', 'sonata_type_model', array('expanded' => true, 'by_reference' => false, 'multiple' => true))
            ->end()

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
            ->addIdentifier('video', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Video'))
            ->add('language')
            ->add('created')
            ->add('updated')
        ;

    }
}