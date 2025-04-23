<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cours = $_POST['cours'];
    $nb_td = intval($_POST['td']);
    $nb_tp = intval($_POST['tp']);
    $nb_interro = intval($_POST['interro']);
    $nb_projet = intval($_POST['projet']);

    $etudiants = json_decode(file_get_contents("http://localhost:8086/liste_etudiants.php"), true);

    echo "<form action='sauvegarder_cotes.php' method='post'>";
    echo "<input type='hidden' name='cours' value='{$cours}'>";
    echo "<input type='hidden' name='td' value='{$nb_td}'>";
    echo "<input type='hidden' name='tp' value='{$nb_tp}'>";
    echo "<input type='hidden' name='interro' value='{$nb_interro}'>";
    echo "<input type='hidden' name='projet' value='{$nb_projet}'>";
    echo "<table border='1'><tr><th>Nom Complet</th>";

    for ($i = 1; $i <= $nb_td; $i++) echo "<th>TD $i</th>";
    for ($i = 1; $i <= $nb_tp; $i++) echo "<th>TP $i</th>";
    for ($i = 1; $i <= $nb_interro; $i++) echo "<th>Interro $i</th>";
    for ($i = 1; $i <= $nb_projet; $i++) echo "<th>Projet $i</th>";
    echo "</tr>";

    foreach ($etudiants as $index => $etudiant) {
        echo "<tr>";
        $nom_complet = $etudiant['nom'] . ' ' . $etudiant['postnom'] . ' ' . $etudiant['prenom'];
        echo "<td>$nom_complet</td>";
        echo "<input type='hidden' name='etudiants[$index][nom]' value='{$etudiant['nom']}'>";
        echo "<input type='hidden' name='etudiants[$index][postnom]' value='{$etudiant['postnom']}'>";
        echo "<input type='hidden' name='etudiants[$index][prenom]' value='{$etudiant['prenom']}'>";

        for ($i = 1; $i <= $nb_td; $i++) echo "<td><input type='number' name='etudiants[$index][td][$i]' min='0' max='10' required></td>";
        for ($i = 1; $i <= $nb_tp; $i++) echo "<td><input type='number' name='etudiants[$index][tp][$i]' min='0' max='10' required></td>";
        for ($i = 1; $i <= $nb_interro; $i++) echo "<td><input type='number' name='etudiants[$index][interro][$i]' min='0' max='10' required></td>";
        for ($i = 1; $i <= $nb_projet; $i++) echo "<td><input type='number' name='etudiants[$index][projet][$i]' min='0' max='10' required></td>";
        echo "</tr>";
    }
    echo "</table><br><input type='submit' value='Enregistrer les Cotes'></form>";
}
?>