<?php
    session_start();
    session_unset();
    session_destroy();
    echo "Vous avez été déconnecté";
?>