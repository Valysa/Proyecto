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
?>
<!DOCTYPE html>
<html id="jeune">

<head>
    <link rel="stylesheet" type="text/css" href="proyecto.css">
</head>
</head>

<body id="createRef">
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


            <td style="width: 50%">
                <a class="active_jeune"> &nbsp; JEUNE &nbsp; </a>
            </td>
            <td style="width: 50%">RÉFÉRENT</td>
            <td style="width: 50%">CONSULTANT</td>
            <td style="width: 50%;">
                <a href="./partenaires.html">PARTENAIRES</a>
            </td>


        </tr>
    </table>
    <table style="width: 100%;">
        <p id="description">
            Confirmez cette expérience et ce que vous avez
            pu constater au contact de ce jeune.</p>

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

                        <div id="sglcheckbox">
                            <input type="checkbox" name="selfsufficient">
                            <label for="selfsufficient">Autonome</label>
                            <br>
                            <input type="checkbox" name="rational">
                            <label for="rational">Réfléchi</label>
                            <br>
                            <input type="checkbox" name="attentive">
                            <label for="attentive">A l'écoute</label>
                            <br>
                            <input type="checkbox" name="organised">
                            <label for="organised">Organisé</label>
                            <br>
                            <input type="checkbox" name="passionated">
                            <label for="passitionated">Passionné</label>
                            <br>
                            <input type="checkbox" name="reliable">
                            <label for="reliable">Fiable</label>
                            <br>
                            <input type="checkbox" name="patient">
                            <label for="patient">Patient</label>
                            <br>
                            <input type="checkbox" name="responsible">
                            <label for="responsible">Responsable</label>
                            <br>
                            <input type="checkbox" name="Sociable">
                            <label for="Sociable">Sociable</label>
                            <br>
                            <input type="checkbox" name="Optimistic">
                            <label for="Optimistic">Optimiste</label>
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
