<?php

$db = new mysqli("localhost", "root", "", "coop_yuraj");
if ($db->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $mysqli->connect_error;
}

?>