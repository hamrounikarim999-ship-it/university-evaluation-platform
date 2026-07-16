function verifierInscription()
{

    let id = document.getElementById("id").value;
    let password = document.getElementById("password").value;

    if(id.length != 8)
    {
        alert("L'ID doit contenir exactement 8 caractères.");
        return false;
    }
    let contientLettre = /[a-zA-Z]/.test(password);
    let contientChiffre = /[0-9]/.test(password);


    if(!contientLettre || !contientChiffre)
    {
        alert("Le mot de passe doit contenir des lettres et des chiffres.");
        return false;
    }


    return true;
}