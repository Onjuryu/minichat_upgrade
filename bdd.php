<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=exercices;charset=utf8', 'root', '');
} catch (Exception $e) {
    echo 'Erreur :' . $e->getMessage();
}