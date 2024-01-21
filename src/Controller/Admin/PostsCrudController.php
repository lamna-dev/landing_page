<?php

namespace App\Controller\Admin;

use App\Entity\Posts;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PostsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Posts::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            SlugField::new('slug')->setTargetFieldName('title'),
            TextEditorField::new('content'),
            TextField::new('featuredImageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('featuredImage')->setBasePath('/uploads/featured_images')->onlyOnIndex(),
            DateField::new('created_at'),
            AssociationField::new('categories'),
            AssociationField::new('users')
        ];
    }
}
