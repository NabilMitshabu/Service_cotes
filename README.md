# 📚 Système de Gestion des Cotes (PHP + SQLite)

## 🔧 Fichiers Inclus

- `formulaire.html` : Choix du cours et du nombre d’épreuves
- `ajouter_cotes.php` : Génère un formulaire dynamique pour attribuer les cotes
- `sauvegarder_cotes.php` : Calcule et enregistre les moyennes dans SQLite
- `api_cotes.php` : Service REST exposant les résultats finaux au format JSON

## 🔗 Consommation du Service Étudiant

Les noms des étudiants sont récupérés depuis :
```
http://localhost:8086/liste_etudiants.php
```

## 🌐 Utilisation

1. Déposer tous les fichiers dans votre dossier `www` (Laragon)
2. Lancer : `http://localhost/gestion_cotes/formulaire.html`
3. Saisir les notes, valider
4. Obtenir les moyennes via : `http://localhost/gestion_cotes/api_cotes.php`