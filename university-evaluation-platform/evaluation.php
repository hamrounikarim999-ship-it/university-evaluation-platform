<?php

session_start();

$conn = mysqli_connect("localhost","root","","evaluation");

if(!$conn)
{
    die("Erreur de connexion");
}

$id = $_SESSION['id'];

if(isset($_POST['universite']))
{
    
    $universite = $_POST['universite'];
    $enseignement = $_POST['enseignement'];
    $ambiance = $_POST['ambiance'];
    $club = $_POST['club'];
    $services = $_POST['services'];
    $opportunites = $_POST['opportunites'];
    if($universite=="")
    {
    echo "<h3>Veuillez choisir un établissement.</h3>";
    exit();
    }
    else{$req = "SELECT * FROM evaluations
            WHERE id='$id'
            AND etablissement='$universite'";

    $res = mysqli_query($conn,$req);
   
    }
   
    if(mysqli_num_rows($res)==0)
    {
        $ins = "INSERT INTO evaluations
        VALUES('$id','$universite','$enseignement','$ambiance',
               '$club','$services','$opportunites')";

        mysqli_query($conn,$ins);

        echo "<script>alert('Merci pour votre évaluation.');</script>";
    }
    else
    {
        echo "<script>
if(confirm('Vous avez déjà évalué cet établissement.\\nVoulez-vous modifier votre évaluation ?'))
{
    window.location='modifier.php?u=".urlencode($universite)."';
}
</script>";
    }
}

?>

<!DOCTYPE html>

<html>

<head>
<meta charset="utf-8">
<title>Evaluation</title>
</head>

<body>

<form method="post" action="">

<fieldset>

<legend>Évaluer un établissement</legend>

<table>

<tr>

<td>Choisir un établissement :</td>

<td>

<select name="universite" id="universite">

<option value="">Choisir une université</option>
<option value="sorbonne">Sorbonne Université</option>
<option value="paris-cite">Université Paris Cité</option>
<option value="paris-saclay">Université Paris-Saclay</option>
<option value="paris-nanterre">Université Paris Nanterre</option>
<option value="sorbonne-paris-nord">Université Sorbonne Paris Nord</option>
<option value="gustave-eiffel">Université Gustave Eiffel</option>
<option value="creteil">Université Paris-Est Créteil Val-de-Marne (UPEC)</option>
<option value="paris-8">Université Paris 8 Vincennes-Saint-Denis</option>
<option value="paris-dauphine">Université Paris Dauphine-PSL</option>
<option value="psl">Université PSL (Paris Sciences et Lettres)</option>
<option value="pantheon-sorbonne">Université Paris 1 Panthéon-Sorbonne</option>
<option value="assas">Université Paris-Panthéon-Assas</option>
<option value="paris-descartes">Université Paris Descartes (intégrée à Université Paris Cité)</option>
<option value="paris-sorbonne">Université Paris-Sorbonne (ancienne Paris 4)</option>
<option value="paris-diderot">Université Paris Diderot (ancienne Paris 7)</option>

</select>

</td>

</tr>


<tr>

<td>Qualité de l'enseignement :</td>

<td>
<input type="range" name="enseignement" 
min="1" max="5" value="1"
oninput="afficherValeur(this,'val1')">

<output id="val1">1</output>
</td>

</tr>


<tr>

<td>Ambiance universitaire :</td>

<td>
<input type="range" name="ambiance" 
min="1" max="5" value="1"
oninput="afficherValeur(this,'val2')">

<output id="val2">1</output>
</td>

</tr>


<tr>

<td>Vie associative :</td>

<td>
<input type="range" name="club" 
min="1" max="5" value="1"
oninput="afficherValeur(this,'val3')">

<output id="val3">1</output>
</td>

</tr>


<tr>

<td>Services administratifs :</td>

<td>
<input type="range" name="services" 
min="1" max="5" value="1"
oninput="afficherValeur(this,'val4')">

<output id="val4">1</output>
</td>

</tr>


<tr>

<td>Opportunités professionnelles :</td>

<td>
<input type="range" name="opportunites" 
min="1" max="5" value="1"
oninput="afficherValeur(this,'val5')">

<output id="val5">1</output>
</td>

</tr>


<tr>

<td><input type="reset" value="Annuler"></td>

<td><input type="submit" value="Évaluer"></td>

</tr>


</table>

</fieldset>

</form>


<script>

function afficherValeur(range, output)
{
    document.getElementById(output).innerHTML = range.value;
}

</script>


</body>

</html>

<?php

mysqli_close($conn);

?>