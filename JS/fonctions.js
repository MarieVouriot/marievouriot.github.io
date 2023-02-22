function VerifierConnexion()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/VerifierConnexion.php",
            data:"login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Identifiants Incorrects")
                else{
                    location.href='PHP/panel';
                }
            },
            error: function()
            {
                alert("Erreur appel des utilisateurs");
            }
        }
    )
}

function CreerUtilisateur()
{
    $.ajax
    (
        {
            type:"POST",
            url:"PHP/CreerUtilisateur.php",
            data:"nom="+txtNom.value+"&login="+txtLogin.value+"&mdp="+txtMdp.value,
            success: function(data)
            {
                if(data == "0")
                    alert("Un compte avec les même identifiants existe déjà")
                else{
                    alert("Votre compte a bien été créé")
                    location.href='../index';
                }
            },
            error: function()
            {
                alert("Erreur appel de la création");
            }
        }
    )
} 

function GetLogementsDisponible()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/logementDisponible.php",
            success:function(data)
            {
                console.log("GetLogementDisponible", data);
                $(".displayLogement").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : logement");
            }
        }
    );
}

function GetNbLogementDispo()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/getNbLogementDispo.php",
            success:function(data)
            {
                $(".nbLogementDispo").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : NbLogementDispos");
            }
        }
    );
}

function GetNbVilles()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/getNbVilles.php",
            success:function(data)
            {
                $(".nbVilles").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : NbLogementDispos");
            }
        }
    );
}

function GetAvgPrix()
{
    $.ajax
    (
        {
            type:"GET",
            url:"PHP/getAvgPrix.php",
            success:function(data)
            {
                $(".avgPrix").append(data);
            },
            error:function()
            {
                alert("Erreur de récupération : NbLogementDispos");
            }
        }
    );
}
