<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Affichage CSV</title>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>
<body id="consult">
<?php
function is_session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
            return session_id() === '' ? false : true;
        }
    }
    return false;
}

if (is_session_started() === false) {
    session_start();
}
if (!isset($_SESSION["ID"])) {
    header("Location: accueil.html");
    exit;
}
?>
<div id="page_head">
    <img id="logojeunes" src="./img/logojeunes.PNG">
    <p id="module">
        JEUNE
    </p>
    <p id="tagline">
        Je donne de la valeur à mon engagement
    </p>
</div>

<table id="navbar" style="width: 50%;">
    <tr>
        <td class="active">
            <div>JEUNE</div>
        </td>
        <td>RÉFÉRENT</td>
        <td>CONSULTANT</td>
        <td>
            <a href="./partenaires.html">PARTENAIRES</a>
        </td>
    </tr>
</table>

<form action="transition.php" method="POST">
    <div class="container">
        <?php
        $file = fopen('BDD2/reference.csv', 'r');
        $data = [];
        $firstLineSkipped = false;
        while (($row = fgetcsv($file, 1000, ',')) !== false) {
            if (!$firstLineSkipped) {
                $firstLineSkipped = true;
                continue; // Ignore la première ligne du CSV
            }
            $data[] = $row;
        }
        fclose($file);
        $i = 1;
        echo '<table id="references">';
        foreach ($data as $row) {
            if ($row[5] == $_SESSION["ID"]) {
                $i++;
                if ($i % 2 == 0) {
                    $info1 = $row[3]; // Première colonne du CSV
                    $info2 = $row[2]; // Deuxième colonne du CSV
                    $info3 = $row[1]; // Troisième colonne du CSV
                    if ($row[6] == "validated") {
                        echo '<tr><td>';
                        echo '<div class="validated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                        echo '</td></tr></table></div>';
                        echo '</td>';
                                            } elseif ($row[6] == "invalid") {
                        echo '<tr><td>';
                        echo '<div class="unvalidated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<div class="unvalid_msg">cette référence a été refusée</div>';
                        echo '</td></tr></table></div>';
                        echo '</td>';
                    } else {
                        echo '<tr><td>';
                        echo '<div class="waiting"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<div class="unvalid_msg">cette référence est en attente de validation</div>';
                        echo '</td></tr></table></div>';
                        echo '</td>';
                    }
                } else {
                    $info1 = $row[3]; // Première colonne du CSV
                    $info2 = $row[2]; // Deuxième colonne du CSV
                    $info3 = $row[1]; // Troisième colonne du CSV
                    if ($row[6] == "validated") {
                        echo '<td>';
                        echo '<div class="validated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                        echo '</td></tr></table></div>';
                        echo '</td>';
                    } elseif ($row[6] == "invalid") {
                        echo '<td>';
                        echo '<div class="unvalidated"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<div class="unvalid_msg">cette référence a été refusée</div>';
                        echo '</td></tr></table></div>';
                        echo '</td></tr>';
                    } else {
                        echo '<td>';
                        echo '<div class="waiting"><table><tr><td>';
                        echo '<p>' . $info1 . '</p>';
                        echo '<p>' . $info2 . '</p>';
                        echo '<p>' . $info3 . '</p>';
                        echo '</td><td>';
                        echo '<div class="unvalid_msg">cette référence est en attente de validation</div>';
                        echo '</td></tr></table></div>';
                        echo '</td></tr>';
                    }
                }
            }
        }
        if ($i % 2 == 0) {
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <div class="row">
            <input type="submit" value="Valider" style="float: right;">
        </div>
    </div>
</form>
</form>
