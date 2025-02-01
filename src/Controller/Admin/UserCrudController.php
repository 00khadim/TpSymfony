<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
            //ici je spescifie ce qui peut modifer notre utilisateur admin
       return [

            TextField::new('firstname')->setLabel('Prenom'),
            TextField::new('lastname')->setLabel('Nom'),
            //L'adresse mail n'est pas modifiable mais on peut le voir dans l'index (page utilisateurs)
            TextField::new('email')->setLabel('Email')->onlyOnIndex(),
            
    ];
    }
    
}
