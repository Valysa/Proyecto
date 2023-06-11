<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>

<body id="intro_referent">
    <div id="page_head">
        <img id="logojeunes" src="./img/logojeunes.PNG">
        <p id="module">
            &nbsp;
        </p>

        <p id="tagline">
            Pour Faire de l ’engagement
        une valeur !
        </p>
    </div>

    <table id="navbar" style="width: 50%;">
        <tr>



            <td>
                <div><a href="./signup.php">JEUNE</a></div>
            </td>
            <td class="active"><div>RÉFÉRENT</div></td>
            <td><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
    <img id="bg-image" src="./img/jeunesbg.PNG">

    <table id="speech">
        <tr>
            <td>
    <p>
    <h1>De quoi s’agit-il ?</h1>
    D’une opportunité : celle qu’un engagement quel qu’il soit puisse être
    considérer à sa juste valeur ! <br>
    Toute expérience est source d’enrichissement et doit d’être reconnu
    largement.<br>
    Elle révèle un potentiel, l’expression d’un savoir-être à concrétiser.</p>
    </td>
    <td>
    <p>
    <h1>A qui s’adresse-t’il ?</h1>
    A vous, jeunes entre 16 et 30 ans, qui vous êtes investis spontanément
    dans une association ou dans tout type d’action formelle ou informelle, et
    qui avez partagé de votre temps, de votre énergie, pour apporter un
    soutien, une aide, une compétence.<br> <br>
    A vous, responsables de structures ou référents d’un jour, qui avez
    croisé la route de ces jeunes et avez bénéficié même ponctuellement de
    cette implication citoyenne ! <br>
    C’est l’occasion de vous engager à votre tour pour ces jeunes en confir-
    mant leur richesse pour en avoir été un temps les témoins mais aussi les
    bénéficiaires !</p>
    </td>
    <td>
        <h1>&nbsp;</h1>
    <p>A vous, employeurs, recruteurs en ressources humaines, repré-
        sentants d’organismes de formation, qui recevez ces jeunes, pour un
        emploi, un stage, un cursus de qualification, pour qui le savoir-être consti-
        tue le premier fondement de toute capacité humaine.<br> <br> </p>
        <p id="punchline">
        Cet engagement est une ressource à valoriser au fil d'un
        parcours en 3 étapes :</p>

    </td>
    </tr>
</table>
<?php
if (isset($_GET["error"])){
    echo "attention le mot de passe n'est pas valide";
}
if (isset($_GET["ref"])){
    echo '<div id="step1">
    <a href=intermediairereferent.php?ref='.$_GET["ref"].'>
    <div>
        la confirmation
    </div>
    <div>
    <p>Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune</p>
    </div>
    </a>
</div>';
}

?>
</body>

</html>
