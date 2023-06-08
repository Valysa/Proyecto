<!DOCTYPE html>
<html>
   
<head>
    <p> Pour Faire de l ’engagement
        une valeur !</p>
</head>

<body>
    <ul>
        <li class="l1"><a href="./signup.html">Jeune</a></li>
        <li class="l3"><a href="login.html">PARTENAIRES</a>
        </li>
    </ul>

    <p>
    <h1>De quoi s’agit-il ?</h1>
    D’une opportunité : celle qu’un engagement quel qu’il soit puisse être
    considérer à sa juste valeur !
    Toute expérience est source d’enrichissement et doit d’être reconnu
    largement.
    Elle révèle un potentiel, l’expression d’un savoir-être à concrétiser.</p>

    <p>
    <h1>A qui s’adresse-t’il ?</h1>
    A vous, jeunes entre 16 et 30 ans, qui vous êtes investis spontanément
    dans une association ou dans tout type d’action formelle ou informelle, et
    qui avez partagé de votre temps, de votre énergie, pour apporter un
    soutien, une aide, une compétence.
    A vous, responsables de structures ou référents d’un jour, qui avez
    croisé la route de ces jeunes et avez bénéficié même ponctuellement de
    cette implication citoyenne !
    C’est l’occasion de vous engager à votre tour pour ces jeunes en confir-
    mant leur richesse pour en avoir été un temps les témoins mais aussi les
    bénéficiaires !</p>

    <p>A vous, employeurs, recruteurs en ressources humaines, repré-
        sentants d’organismes de formation, qui recevez ces jeunes, pour un
        emploi, un stage, un cursus de qualification, pour qui le savoir-être consti-
        tue le premier fondement de toute capacité humaine.
        Cet engagement est une ressource à valoriser au fil d'un
        parcours en 3 étapes :</p>

    <fieldset>
        <a href="./refID.html">
        <h1>la confirmation</h1>
        <?php 
        echo "REF = ".$_GET['ref'];
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
        foreach ($data as $row) {
            if ($row[0] == $_GET['ref']) {
                $info1 = $row[3]; // Première colonne du CSV
                $info2 = $row[2]; // Deuxième colonne du CSV
                $info3 = $row[1]; // Troisième colonne du CSV
        
                echo '<div class="row">';
                echo '<div class="styled-box">';
                echo '<input type="checkbox" name="selection[]" value="' . $row[0] . '">';
                echo '<p>' . $info1 . '</p>';
                echo '<p>' . $info2 . '</p>';
                echo '<p>' . $info3 . '</p>';
                echo '</div>';
            }
        }
        ?>
        <p>Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune</p>
    </a>
    </fieldset>
</body>

</html>