# Système de Gestion des Cotes (PHP + SQLite)

## Fichiers Inclus

- `index.php` : Choix du cours et du nombre d’épreuves
- `ajouter_cotes.php` : Génère un formulaire dynamique pour attribuer les cotes
- `sauvegarder_cotes.php` : Calcule et enregistre les moyennes dans SQLite
- `api_cotes.php` : Service REST exposant les résultats finaux au format JSON

## Consommation du Service Étudiant

Les noms des étudiants sont récupérés depuis un service en ligne:
```
https://service-inscription.onrender.com/liste_etudiants.php 
```

## Utilisation

1. Ouvrir le  `formulaire` choisir le cours et les travaux qui seront faient
2. Récupérer les noms à partir du service d'inscription deployé avec Render : `https://service-inscription.onrender.com/liste_etudiants.php `
3. Saisir les notes, valider
4. ET on peut acceder aux notes à l'aide ce service deployé avec Render: `https://service-cotes.onrender.com/api_cotes.php `