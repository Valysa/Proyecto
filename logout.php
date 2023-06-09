<?php
    session_unset();
    echo session_status();
    session_destroy();
    echo "Vous avez été déconnecté";
?>