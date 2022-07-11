<?php
//inclure les fonctions pour la base
include "../Core.php";
$bd=connecterBDD();
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
    // on vérifie que le champ "Pseudo" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
    if(empty($_POST['identifiant'])) {
        echo "Le champ Pseudo est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {
            // les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:
            $Pseudo = $_POST['identifiant']; // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL
            $MotDePasse = $_POST['mdp'];
            //on se connecte à la base de données:
            if(!$bd){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:
                $Requete = "SELECT * FROM utilisateur WHERE identifiant = '".$Pseudo."' AND mdp = '".$MotDePasse."'";//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                $exec = mysqli_query($bd,$Requete);
                $tableau = mysqli_fetch_assoc($exec);


              // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                if(mysqli_num_rows($exec) == 0) {
                    echo "<script>alert(\"Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.\")</script>";
                    header('Refresh: URL=Accueil.php');
                } else{

                    // on ouvre la session avec $_SESSION:
                    $_SESSION['Pseudo'] = $Pseudo; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                    $_SESSION['nom'] = $tableau['nom'];
                    $_SESSION['prenom'] = $tableau['prenom'];
                    $_SESSION['adresse'] = $tableau['adresse'];
                    $_SESSION['code'] = $tableau['code'];
                    $_SESSION['ville'] = $tableau['ville'];
                    $_SESSION['tel'] = $tableau['tel'];
                    $_SESSION['mail'] = $tableau['mail'];
                    $_SESSION['age'] = $tableau['age'];
                    $_SESSION['personnefoyer'] = $tableau['nbpersonne'];
                    $_SESSION['photo'] = $tableau['photo'];
                    $_SESSION['type'] = $tableau['typeUtilisateur'];
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }

    deconnecterBDD($bd);
?>
