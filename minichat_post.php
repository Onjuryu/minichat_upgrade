<?php
include_once 'bdd.php';
// Test des variables + insertion
if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {

    $req = $bdd->prepare('INSERT INTO minichat(pseudo, message, date) VALUES (:pseudo,:message,now())');
    $req->execute(array('pseudo' => $_POST['pseudo'], 'message' => $_POST['message']));

    header('Location:minichat.php');
}
