<?php

$pseudo_tchat = "Visiteur";
if (!empty($_COOKIE['nom'])) {
    $pseudo_tchat = $_COOKIE['nom'];
} elseif (!empty($_POST['pseudo'])) {
    $pseudo_tchat = $_POST['pseudo'];
    setcookie('nom', $pseudo_tchat, time() + 365 * 24 * 3600, null, null, false, true);
}

?>
<html>
<head>
    <title>Mini-chat</title>
    <style>
        .corps {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="corps">

    <h1> Welcome sur le mini chat !</h1>

    <form action="minichat_post.php" method="post">

        <label for="pseudo">Pseudo : </label><input type="text" id="pseudo" name="pseudo"
                                                    value="<?php echo $pseudo_tchat; ?>">
        <br><br>
        <label for="message">Message : </label><input type="text" id="message" name="message"><br><br>
        <input type="submit" name="valider">

    </form>

    <br/>

    <?php
    include_once 'bdd.php';
    $reponse = $bdd->query('SELECT pseudo,message,DATE_FORMAT(date,"%d/%m/%Y  %Hh%imin%ss") AS date FROM minichat ORDER BY date DESC ');
    while ($donnees = $reponse->fetch()) {
        ?>
        <p>
            <?php echo htmlspecialchars($donnees['date']) ?>
            <strong><?php echo htmlspecialchars($donnees['pseudo']) ?> </strong>
            : <?php echo htmlspecialchars($donnees['message']) ?> <br>

        </p>

        <?php
    }
    $reponse->closeCursor();
    ?>

</div>

</body>
</html>