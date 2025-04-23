<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cours = $_POST['cours'];
    $nb_td = intval($_POST['td']);
    $nb_tp = intval($_POST['tp']);
    $nb_interro = intval($_POST['interro']);
    $nb_projet = intval($_POST['projet']);

    $pdo = new PDO("sqlite:cotes.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE TABLE IF NOT EXISTS cotes (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nom TEXT,
        postnom TEXT,
        prenom TEXT,
        cours TEXT,
        moyenne REAL
    )");

    $pdo->exec("DELETE FROM cotes WHERE cours = '$cours'");

    foreach ($_POST['etudiants'] as $etudiant) {
        $total = 0;
        $total_elements = 0;

        foreach (['td', 'tp', 'interro', 'projet'] as $type) {
            if (isset($etudiant[$type])) {
                foreach ($etudiant[$type] as $note) {
                    $total += floatval($note);
                    $total_elements++;
                }
            }
        }
        $moyenne = $total_elements > 0 ? round($total / $total_elements, 2) : 0;

        $stmt = $pdo->prepare("INSERT INTO cotes (nom, postnom, prenom, cours, moyenne) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$etudiant['nom'], $etudiant['postnom'], $etudiant['prenom'], $cours, $moyenne]);
    }
    echo "Cotes enregistrées avec succès.";
}
?>