<?php
/**
 * Created by PhpStorm.
 * User: sananoussette
 * Date: 11/20/13
 * Time: 1:16 PM
 */
namespace Kiddify\Bundle\WebsiteBundle\Admin;

use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class VideoAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Title'))
            ->add('user', 'sonata_type_model')
            ->add('url', 'text', array('label' => 'URL'))
            ->add('preview_url', 'text', array('label' => 'Preview URL'))
        ->with('contests')
            ->add('contest', 'sonata_type_model')
        ->end()
            ->add('category', 'sonata_type_model')
        ->with('badges')
            ->add('badge', 'sonata_type_model', array('expanded' => true, 'by_reference' => false, 'multiple' => true))
        ->end()
        ->with('tags')
            ->add('tag', 'sonata_type_model', array('expanded' => true, 'by_reference' => false, 'multiple' => true))
        ->end()
            ->add('accepted','date', array('label'=>'Acceptance date'))
            ->add('created', 'date', array('label' => 'Created'))
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
            ->addIdentifier('user', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\User'))
            ->addIdentifier('contest', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Contest'))
            ->addIdentifier('category', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Category'))
            ->addIdentifier('badge', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Badge'))
            ->addIdentifier('tag', 'entity', array('class' => 'Kiddify\Bundle\WebsiteBundle\Entity\Tag'))
            ->add('url')
            ->add('preview_url')
            ->add('created')
            ->add('updated')
        ;

    }
}