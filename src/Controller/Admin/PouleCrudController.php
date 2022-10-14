<?php

namespace App\Controller\Admin;

use App\Entity\Poule;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PouleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poule::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
