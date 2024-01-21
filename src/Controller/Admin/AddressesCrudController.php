<?php

namespace App\Controller\Admin;

use App\Entity\Addresses;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AddressesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Addresses::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email')
        ];
    }

}
