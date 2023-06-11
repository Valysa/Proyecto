<!DOCTYPE html>
<html id="jeune">

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>
</head>

<body id="createRef">
    <?php
     function is_session_started()
     {
         if ( php_sapi_name() !== 'cli' ) {
             if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                 return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
             } else {
                 return session_id() === '' ? FALSE : TRUE;
             }
         }
         return FALSE;
     }
     
     if ( is_session_started() === FALSE ) session_start();
if(!isset($_SESSION["ID"])){
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
            <td><div>RÉFÉRENT</div></td>
            <td><div>CONSULTANT</div></td>
            <td >
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>

    <form id="main" class="main_input" action="reference.php" method="POST">
        <table id="ref">
            <tr>
                <td>


                    <p> Décrivez votre expérience et précisez la durée ainsi que le milieu de votre engagement </p>
                    <textarea type="text" name="exp"></textarea>
                </td>

                <td style="width:50%">
                    <fieldset>
                        <legend> Information du référent</legend>
                        <div class="input_text">
                            <input class="writing" type="text" name="name" placeholder="Nom" />
                            <label for="name" class="text_label">Nom</label><br><br>
                        </div>
                        <div class="input_text">
                            <input class="writing" type="text" name="fname" placeholder="Prenom" />
                            <label for="fname" class="text_label">Prenom</label><br><br>
                        </div>
                        <div class="input_text">
                            <input class="writing" type="email" name="mailref" placeholder="Mail" />
                            <label for="mailref" class="text_label">Mail</label><br><br>
                        </div>
                    </fieldset>
                </td>
                <td>
                    <div id="Be">VOS SAVOIRS ETRE</div>

                    <div id="skills" action="data.php" method="POST">

                        <div id="Be2">Je suis*</div>

                        <div id="sglcheckbox" action="checked.php" method="POST">
                            <input type="checkbox" name="skill[]" value="0">
                            <label for="0">Autonome</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="1">
                            <label for="1">Réfléchi</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="2">
                            <label for="2">A l'écoute</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="3">
                            <label for="3">Organisé</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="4">
                            <label for="4">Passionné</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="5">
                            <label for="5">Fiable</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="6">
                            <label for="6">Patient</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="7">
                            <label for="7e">Responsable</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="8">
                            <label for="8">Sociable</label>
                            <br>
                            <input type="checkbox" name="skill[]" value="9">
                            <label for="9">Optimiste</label>
                        </div>


                        <script>
                            function limitCheckBox() {
                                var checkboxgroup = document.getElementById('sglcheckbox').getElementsByTagName("input");

                                var limit = 4;

                                for (var i = 0; i < checkboxgroup.length; i++) {
                                    checkboxgroup[i].onclick = function () {
                                        var checkedcount = 0;
                                        for (var i = 0; i < checkboxgroup.length; i++) {
                                            checkedcount += (checkboxgroup[i].checked) ? 1 : 0;
                                        }
                                        if (checkedcount > limit) {
                                            this.checked = false;
                                        }
                                    }
                                }
                            }
                            limitCheckBox()
                        </script>


                        <br>

                    </div>
                    <div id="fourMax"> *faire 4 choix maximum</div>
                </td>
            </tr>
        </table>
        <br>

        <button type="submit">Valider</button>
    </form>

</body>

</html>
