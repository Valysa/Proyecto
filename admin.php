<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page d'administration</title>
</head>
<body>
    <?php
        if($_SESSION["ID"] == "a1" || !isset($_GET["ID"])){
            header("Location: accueil.html");
            exit;
        }
    ?>
    <h1>Page d'administration</h1>

    <!-- Formulaire de modification de reference.csv -->
    <h2>Base des références</h2>
    <form action="admin.php" method="POST">
        <textarea name="csv_data" rows="10" cols="50"><?php echo file_get_contents('BDD2/reference.csv'); ?></textarea>
        <br>
        <input type="submit" name="update_csv" value="Mettre à jour">
    </form>

    <?php
    // Vérifier si le formulaire de reference.csv a été soumis et traiter les données
    if (isset($_POST['update_csv'])) {
        $csv_data = $_POST['csv_data'];

        // Écrire les données mises à jour dans le fichier reference.csv
        file_put_contents('BDD2/reference.csv', $csv_data);
        echo '<p>Le fichier reference.csv a été mis à jour.</p>';
    }
    ?>

    <!-- Afficher et modifier le contenu des fichiers CSV dans le répertoire BDD -->
    <h2>Base des jeunes</h2>
    <?php
    $csv_files = glob('BDD/*.csv');

    if (!empty($csv_files)) {
        foreach ($csv_files as $csv_file) {
            $filename = basename($csv_file);
            echo '<h3>' . $filename . '</h3>';
            // Formulaire pour la modification du fichier
            echo '<form action="admin.php" method="POST">';
            echo '<textarea name="csv_data" rows="10" cols="50">' . file_get_contents($csv_file) . '</textarea>';
            echo '<br>';
            echo '<input type="hidden" name="file_to_update" value="' . $filename . '">';
            echo '<input type="submit" name="update_file" value="Mettre à jour">';
            echo '</form>';

            echo '<hr>';

            // Traiter les données soumises pour la mise à jour du fichier
            if (isset($_POST['update_file']) && $_POST['file_to_update'] === $filename) {
                $updated_data = $_POST['csv_data'];

                // Écrire les données mises à jour dans le fichier
                file_put_contents($csv_file, $updated_data);
                echo '<p>Le fichier ' . $filename . ' a été mis à jour.</p>';
            }
        }
    } else {
        echo '<p>Aucun fichier CSV trouvé dans le répertoire BDD.</p>';
    }
    ?>
</body>
</html>
