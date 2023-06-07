<?php
    session_start();
?>
<!DOCTYPE html>
<html id="jeune">

<head>
    <p>
        JEUNE
    </p>
    <p>
        Modifie tes informations
    </p>
</head>

<body>

    <ul>
        <li class="active"><a>Jeune</a></li>
        <li class="l1"><a href="./referent.html">RÉFÉRENT</a></li>
        <li class="l2"><a href="./consultant.html">CONSULTANT </a></li>
        <li class="l3"><a href="login.html">PARTENAIRES</a>
        </li>
    </ul>

     <br><br>

    <form id="main" action="modifjeune2.php" method="POST">
        <fieldset>
            
                <input type="text" name="name" placeholder="Nom" value=<?php echo $_SESSION['name']; ?> onfocus="this.value" /> <br><br>
                <input type="text" name="fname" placeholder="PRENOM" value=<?php echo $_SESSION['fname']; ?> /> <br><br>
                <input type="date" name="birthday" placeholder="Date de naissance" value=<?php echo $_SESSION['birthday']; ?> /> <br><br>
                <input type="email" name="email" placeholder="Mail" value=<?php echo $_SESSION['email']; ?> /> <br> <br>
                <input type="password" name="password" placeholder="Password"value=<?php echo $_SESSION['password']; ?> />
           
        </fieldset>
        
        
        <button type="submit" value="modifj">Valider</button>
    </form>

</body>

</html>