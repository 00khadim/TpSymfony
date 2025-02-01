# 📌 README - Fonctionnement de l'application


## 🚀 Fonctionnalités principales
- **Inscription et connexion** : Un utilisateur peut créer un compte et se connecter.
  - Page de connexion : `http://127.0.0.1:8000/connexion`
  - Page d'inscription : `http://127.0.0.1:8000/inscription`
- **Gestion des rôles** : En fonction du rôle de l'utilisateur, l'accès aux pages change.
- **Espace administrateur** : Accessible via `http://127.0.0.1:8000/admin`, cette section permet :
  - De gérer les utilisateurs (création, modification, suppression)
  - De gérer les catégories (création, modification, suppression)
  - De gérer les produits (création, modification, suppression)
- **Affichage des produits par catégorie** : Accessible via `http://127.0.0.1:8000/categorie/XXX`, cette page affiche tous les produits liés à une catégorie. Chaque produit est cliquable et mène à une page détaillée.

## 🛠️ Contrôleurs et leur utilité
- **AccountController** : Gère l'inscription et la connexion des utilisateurs.
- **CategoryController** : Permet l'affichage des catégories et des produits liés.
- **HomeController** : Gère la page d'accueil.
- **LoginController** : S'occupe de l'authentification des utilisateurs.
- **ProductController** : Permet la gestion et l'affichage des produits.
- **RegisterController** : Gère le processus d'inscription.

## ⚠️ Difficultés rencontrées
- **Migration qui ne s'exécutait pas** : J'ai rencontré un problème où une migration refusait de s'exécuter. J'ai pu résoudre cela grâce à la commande suivante :
  ```bash
  symfony console doctrine:schema:update --force
  ```
- **Problème avec EasyAdmin** : L'intégration d'EasyAdmin a posé problème car il ne supportait pas la version de Twig utilisée dans mon projet. J'ai passé au moins deux jours à essayer de comprendre le problème et à trouver une solution.
- **Impact des problèmes rencontrés** : À cause du retard causé par ces problèmes, je n'ai pas pu améliorer le design CSS ni mettre en place un système de panier comme je l'aurais souhaité.




