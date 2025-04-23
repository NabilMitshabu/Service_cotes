<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Encodage des Cotes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-select, input[type="number"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        @media (max-width: 500px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h2>Encodage des Cotes des Étudiants</h2>
    <form action="ajouter_cotes.php" method="post">
        <label for="cours">Cours :</label>
        <select name="cours" required class="form-select">
            <option value="" disabled selected>-- Sélectionnez un cours --</option>
            <option value="Logique 2">Logique 2</option>
            <option value="Admin">Admin</option>
            <option value="Test logiciels">Test logiciels</option>
            <option value="Prog Système">Prog Système</option>
        </select>

        <label>Nombre de TD :</label>
        <input type="number" name="td" min="0" required>

        <label>Nombre de TP :</label>
        <input type="number" name="tp" min="0" required>

        <label>Nombre d'Interros :</label>
        <input type="number" name="interro" min="0" required>

        <label>Nombre de Projets :</label>
        <input type="number" name="projet" min="0" required>

        <input type="submit" value="Générer formulaire pour cotes">
    </form>
</body>
</html>