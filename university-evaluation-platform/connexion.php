<?php

session_start();

$conn = mysqli_connect("localhost","root","","evaluation");

if(!$conn)
{
    die("Erreur de connexion");
}

$id = $_POST['id'];
$password = $_POST['mdp'];

$req = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($conn,$req);
if(mysqli_num_rows($res)==1)
{
    $user = mysqli_fetch_assoc($res);

    if($user['pw'] == $password)
    {
        $_SESSION['id'] = $id;

        header("Location: evaluation.php");
        exit();
    }
    else
    {
        echo "<h3>Mot de passe incorrect.</h3>";
        echo "<a href='connexion.html'>Réessayer</a>";
    }
}
else
{
    echo "<h3>Utilisateur introuvable.</h3>";
    echo "<p>Vous devez d'abord créer un compte.</p>";
    echo "<a href='inscription.html'>S'inscrire</a>";
}

mysqli_close($conn);

?>