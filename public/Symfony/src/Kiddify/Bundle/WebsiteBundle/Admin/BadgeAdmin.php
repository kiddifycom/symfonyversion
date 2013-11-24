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

class BadgeAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('url', 'text', array('label' => 'URL'))
            ->add('translation', 'text', array('label' => 'Translation'))
            ->add('text_key', 'text', array('label' => 'Key'))
            ->add('created', 'date', array('label' => 'created'))
            ->add('updated', 'date', array('label' => 'Updated'))
        ;
//            ->add('video', 'sonata_type_model', array('expanded' => true, 'by_reference' => false, 'multiple' => true))

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
            ->add('url')
            ->add('translation')
            ->add('key')
            ->add('created')
            ->add('updated')
        ;

    }
}