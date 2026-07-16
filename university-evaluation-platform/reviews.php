<?php

$conn = mysqli_connect("localhost","root","","evaluation");

if(!$conn)
{
    die("Erreur de connexion");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reviews</title>
</head>

<body>

<form method="post" >

    <label>Choisir un établissement :</label>

     <select name="universite" id="universite" >
                <option value=""> Choisir une université</option>
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
            <input type="submit" value="Afficher">

</form>

<?php

if(isset($_POST['universite']))
{
    $u = $_POST['universite'];

    $req = "SELECT
            AVG(enseignement) AS ens,
            AVG(Ambiance) AS amb,
            AVG(club) AS clu,
            AVG(Services) AS adm,
            AVG(Opportunites) AS op
            FROM evaluations
            WHERE etablissement='$u'";

    $res = mysqli_query($conn,$req);
    if(!$res)
    {
    die(mysqli_error($conn));
    }
    $t = mysqli_fetch_assoc($res);

    echo "<h2>$u</h2>";

    echo "Qualité de l'enseignement : ".round($t['ens'],2)."/5 <br><br>";

    echo "Ambiance universitaire : ".round($t['amb'],2)."/5 <br><br>";

    echo "Vie associative : ".round($t['clu'],2)."/5 <br><br>";

    echo "Services administratifs : ".round($t['adm'],2)."/5 <br><br>";

    echo "Opportunités professionnelles : ".round($t['op'],2)."/5";
}

mysqli_close($conn);

?>

</body>

</html>