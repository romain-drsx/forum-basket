# forum-symfony sur le basketball

# 1. Installer le projet
## Vérification 
Vérifiez que vous avez bien PHP d'installer  
``$ php -v``  
Vérifiez que vous avez bien Symfony d'installer (https://symfony.com/download)  
``$ symfony -v``  
Vérifiez que vous avez bien Composer d'installer, ça falicitera l'installation (si besoin https://getcomposer.org/download/)  
``$ composer -v``  

## Installation
Créez un dossier où vous souhaitez créer votre projet  
``$ cd projects/``  
Une fois que vous êtes bien sur votre bon dossier, clonez le projet  
``$ git clone git@github.com:romain-drsx/forum-basket.git``  
Ensuite, déplacez vous sur le dossier du projet  
``$ cd my-project/``  
Installez le projet facilement grâce à Composer  
``$ composer install``  
Créez ensuite la base de données sur PhpMyAdmin  
Remplissez le fichier .env en fonction de la base de données que vous venez de créer  
Importez la structure de la BDD   
``$  php bin/console doctrine:migrations:migrate``  
Enfin, importez les données  
``$ php bin/console doctrine:fixtures:load``  

# 2. Lancer le projet
Mettez vous bien sur le dossier du projet forum-basket/  
Si besoin :  
``$ cd forum-basket/``  
Lancez le projet  
``$ symfony server:start``  

# 3. Vérifier que le projet est bien fonctionnel
Se connectez sur un des comptes utilisateurs crées par défaut ou créez vous un compte.  
Ensuite, testez de créez un ticket avec une des catégories et commencez à parler dans cette discussion.  
Une fois que vous en avez assez laisser le ticket et revenez plus tard si un autre utilisateur a publié des choses sur le ticket.  
Sinon si vous pensez avoir fait le tour cloturer le ticket.  
  
En tant qu'admin, vous pouvez gérer les utilisateurs, les messages et les tickets.  

# 4. Les divers commandes utiles (re-générer des données / etc.)

Créer un contrôleur  
``$ symfony console make:controller``  
Créer une entité  
``$ symfony console make:entity``  
Créer un formulaire  
``$ symfony console make:form``  
Créer une migration  
``$ symfony console make:migration``  
Création de la base de données    
``$ symfony console doctrine:database:create``  
Pour supprimer la bdd  
``$ symfony console doctrine:database:drop``  
Application de la dernière migration  
``$ symfony console doctrine:migrations:migrate``  