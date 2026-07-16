<?php

session_start();

$conn = mysqli_connect("localhost","root","","evaluation");

if(!$conn)
{
    die("Erreur de connexion");
}

$id = $_SESSION['id'];
$universite = $_GET['u'];


$req = "SELECT * FROM evaluations 
        WHERE id='$id' 
        AND etablissement='$universite'";

$res = mysqli_query($conn,$req);

if(mysqli_num_rows($res)==0)
{
    die("Evaluation introuvable");
}

$data = mysqli_fetch_assoc($res);


if(isset($_POST['modifier']))
{

$enseignement = $_POST['enseignement'];
$ambiance = $_POST['ambiance'];
$club = $_POST['club'];
$services = $_POST['services'];
$opportunites = $_POST['opportunites'];


$update = "UPDATE evaluations SET

enseignement='$enseignement',
Ambiance='$ambiance',
club='$club',
Services='$services',
Opportunites='$opportunites'

WHERE id='$id'
AND etablissement='$universite'";


mysqli_query($conn,$update);

echo "<h3>Evaluation modifiée avec succès.</h3>";

}

?>


<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<title>Modifier évaluation</title>
</head>


<body>

<h2>Modifier votre évaluation</h2>


<form method="post">


<p>Université : <?php echo $universite; ?></p>


<p>
Enseignement :
<input type="range" name="enseignement"
min="1" max="5"
value="<?php echo $data['enseignement']; ?>"
oninput="afficherValeur(this, 'val1')">

<output id="val1">
<?php echo $data['enseignement']; ?>
</output>
</p>


<p>
Ambiance :
<input type="range" name="ambiance"
min="1" max="5"
value="<?php echo $data['Ambiance']; ?>"
oninput="afficherValeur(this, 'val2')">

<output id="val2">
<?php echo $data['Ambiance']; ?>
</output>
</p>


<p>
Vie associative :
<input type="range" name="club"
min="1" max="5"
value="<?php echo $data['club']; ?>"
oninput="afficherValeur(this, 'val3')">

<output id="val3">
<?php echo $data['club']; ?>
</output>
</p>


<p>
Services :
<input type="range" name="services"
min="1" max="5"
value="<?php echo $data['Services']; ?>"
oninput="afficherValeur(this, 'val4')">

<output id="val4">
<?php echo $data['Services']; ?>
</output>
</p>


<p>
Opportunités :
<input type="range" name="opportunites"
min="1" max="5"
value="<?php echo $data['Opportunites']; ?>"
oninput="afficherValeur(this, 'val5')">

<output id="val5">
<?php echo $data['Opportunites']; ?>
</output>
</p>


<input type="submit" name="modifier" value="Modifier">

</form>


<script>

function afficherValeur(range, output)
{
    document.getElementById(output).innerHTML = range.value;
}

</script>


</body>

</html>