<?php

$conn = mysqli_connect("localhost","root","","evaluation");


if(!$conn)
{
    die("Erreur de connexion");
}


$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$id = $_POST['id'];
$email = $_POST['email'];
$password = $_POST['password'];


$req = "SELECT * FROM users WHERE id='$id'";

$res = mysqli_query($conn,$req);


if(mysqli_num_rows($res)>0)
{
    echo "<h3>Cet ID existe déjà.</h3>";
    echo "<a href='inscription.html'>Retour</a>";
    exit();
}


$req2 = "SELECT * FROM users WHERE email='$email'";

$res2 = mysqli_query($conn,$req2);


if(mysqli_num_rows($res2)>0)
{
    echo "<h3>Cet email existe déjà.</h3>";
    echo "<a href='inscription.html'>Retour</a>";
    exit();
}


$insert = "INSERT INTO users
VALUES('$id','$nom','$prenom','$email','$password')";


if(mysqli_query($conn,$insert))
{
    echo "<h3>Inscription réussie.</h3>";
    echo "<a href='connexion.html'>Se connecter</a>";
}
else
{
    echo mysqli_error($conn);
}


mysqli_close($conn);

?>