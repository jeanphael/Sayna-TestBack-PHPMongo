# Projet Sayna Test Back End 
 
## Table des matières
1. [Information générale](#info-general)
2. [Technologies](#technologies)
3. [Installation](#installation)

### Information générale
***
Le projet consiste à développer des apis pour la gestion d'accès à des sources audios.
Voici l'url principal : https://guarded-sierra-18583.herokuapp.com/
Il y a la page home qui sera afiché en cliquant sur l'url principal.
L'utilisateur devra tout d'abord créer un compte en s'enregistrant.
API : https://guarded-sierra-18583.herokuapp.com/register , La méthode utilisé est "POST" , les paramètres à enregistrer sont : firstname , lastname , email , password , datenaissance , sexe

Une fois enregistré, ses informations seront stockés dans la base MONGODB.

Il pourra ensuite se connecter en utilisant le mail et le mot de passe.
API : https://guarded-sierra-18583.herokuapp.com/register , La méthode utilisé est "POST"

Si les informations de connexion correspondent à ce qui est dans la base de données , l'utilisateur recoit un token qui sera utilisé durant toute exécution des autres apis tels que : listings des sources audios , récupération d'un seul source audio, récupération de facture , ajout d'une carte bancaire , suppression de son compte.

Pour lister les sources audios , l'api a utiliser est API : https://guarded-sierra-18583.herokuapp.com/songs 

Pour récupérer un seul source audio parmi toutes les sources, l'api a utilisé est API : https://guarded-sierra-18583.herokuapp.com/songs/{id} , remplacer le {id} par l'id de l'utilisateur qui est enregistré dans la base de données (collection nommée user)

Pour supprimer le compte de l'utilisateur ayant un token , il fallait utiliser l'api https://guarded-sierra-18583.herokuapp.com/user en utilisant la méthode DELETE 

Pour ajouter une carte bancaire : https://guarded-sierra-18583.herokuapp.com/user/cart avec les paramètres numberCart , default , month , year , le token également pour marquer que la carte enregistrée correspond à cet utilisateur

Pour récuperer les factures , voici l'api https://guarded-sierra-18583.herokuapp.com/bills.
## Technologies
***
Ci-dessous la liste des technologies utilisés pour la mise en place du projet
* [Langage]PHP: 
* [Framework]Code igniter
* [Base de données] MongoDB Atlas 
Les collections crées ont été : user , card , songs
* [Hébergement de l'application] Heroku
* [Dépot / Versionning ] Github https://github.com/jeanphael/Sayna-TestBack-PHPMongo.git
* [IDE] Visual Studio Code
* [Outil pour le test] Postman

## Installation
Pour tester le projet : il fallait juste utiliser un outils comme postman puis y éxécuter les urls de l'api.
***
Pour installer le projet en local: 
```
$ git clone https://github.com/jeanphael/Sayna-TestBack-PHPMongo.git

```
Il fallait avoir un xamp ou wamp , mettre le dossier de l'application dans www ou htdocs , puis démarrer le serveur apache.
Modifier le fichier dans app/Config/App.php et remplacer l'url du base url par "localhost"

