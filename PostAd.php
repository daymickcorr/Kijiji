<?php
session_start();
//session_start() - D�marre une nouvelle session ou reprend une session existante

if (isset($_SESSION["id"])){
    echo $_SESSION["id"];
}
else {
    echo "Please login first";
}

?>