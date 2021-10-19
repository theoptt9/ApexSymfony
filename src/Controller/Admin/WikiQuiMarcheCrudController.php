<?php

namespace App\Controller\Admin;

use App\Entity\WikiQuiMarche;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class WikiQuiMarcheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WikiQuiMarche::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnDetail(),
            TextField::new('nom'),
            TextEditorField::new('description')->hideOnIndex(),
                    ImageField::new('file')->setUploadDir('public/media/actualite'),


        ];
    }
}
