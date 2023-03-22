# Structure

## Dossier `/public`

Le dossier `/public` est le seul dossier qui sera accessible depuis l'extérieur (navigateurs...).
On y retrouve le front controller (`index.php`) et le `.htaccess` qui permet de rediriger les requêtes qui ne sont pas faites pour un dossier/fichier existant vers celui-ci. C'est ici que sont également placés les assets qui seront demandées par le client (images, CSS, JS, fonts ...).

## Dossier `/app`

Le dossier `/app` contient toute la logique propre à notre application et qui ne doit pas être accessible depuis l'extérieur du serveur (navigateurs...). On y retrouvera entre autre :

- Les contrôleurs dans `/app/Controllers`
- Les templates de nos vues dans `/app/views`
- Les modèles dans `/app/Models`
- Un fichier `.htaccess` pour empêcher l'accès depuis l'extérieur du serveur
- Des classes PHP variées qui seront utiles à notre application
