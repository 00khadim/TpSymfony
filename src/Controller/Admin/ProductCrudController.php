<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;


class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Produit')
            ->setEntityLabelInPlural('Produits')
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Titre')->setHelp('Nom')->setHelp('Nom de votre'),
            SlugField::new('slug')->setLabel('URL')->setTargetFieldName('name')->setHelp('URL de votre produit se genéré automatiquement'),
            TextEditorField::new('description')->setLabel('Description')->setHelp('Description de votre produit')
            ImageField::new('ilustration')->setLabel('Image')->setHelp('Image du produit')
        ];
    }
    
}
