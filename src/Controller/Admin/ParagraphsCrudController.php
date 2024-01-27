<?php

namespace App\Controller\Admin;

use App\Entity\Paragraphs;;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParagraphsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paragraphs::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->update(Crud::PAGE_INDEX, Action::NEW, function(Action $action){
            return $action->setIcon('fa-solid fa-paragraph')->addCssClass('btn btn-success');
        });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('content'),
            TextField::new('featuredImageFile')->setFormType(VichImageType::class)->onlyOnIndex(),
            ImageField::new('featuredImage', 'Image')->setUploadDir('assets/images/articles/paragraph_featured_images')->setBasePath('/images/articles/paragraph_featured_images'),
            TextField::new('caption'),
            AssociationField::new('post'),
            DateField::new('created_at')->renderAsChoice(),
            DateField::new('updated_at')->renderAsChoice(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add('title')
        ;
    }
}
