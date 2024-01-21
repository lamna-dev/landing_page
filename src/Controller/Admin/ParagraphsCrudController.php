<?php

namespace App\Controller\Admin;

use App\Entity\Paragraphs;;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ParagraphsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paragraphs::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('content'),
            AssociationField::new('posts'),
            TextField::new('featuredImageFile')->setFormType(VichImageType::class)->onlyWhenCreating(),
            ImageField::new('featuredImage')->setBasePath('/uploads/featured_images')->onlyOnIndex(),
        ];
    }
}
