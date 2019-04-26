<?php 
session_start();
if(isset($_SESSION))
{
session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<title>construction</title>
<style>
    header
    {
        background-image:url('images/viewsImages/bulding.jpg');
        background-size:cover;
        height: 500px;
    }
    header .contenu
    {
        display: flex;
        justify-content: center;
        background-color: rgb(51, 50, 50,.2);
        height: 100%;
        align-items: center;    
    }
    .imgFix
    {
        background-image:url('images/viewsImages/image1.jpg');
        height: 400px;
        background-attachment:fixed; 
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        text-align: center; 
        color:white;
    }
    </style>
</head>
<body>
<?php include 'assert/include/header.php' ?>
<section class="principale">
    <header>
        <div class="contenu">
            <h1>construcion</h1> 
        </div>
    </header>
    <section>
            <!-- section information -->
            <div class="hr"></div>
            <div class="divIntro">
                <h1 class="intro">IsO construcion -Votre Assuancer Notre Enjeux</h1>

                <p>L’entreprise IsO-construcion est un partenaire de confiance pour vos projets. d'origine ivoirienne nous avons notre equipe de proffessionnel sur la quasie totalite du terictoirs</p>
            </div>
            <div class="imgFix">
                <div>
                    <h1> Iso-Construction entreprise  Rénovation est reconnue par le departement de l'industrie et la construction </h1>
                </div>
            </div>

            <div class="h2">
                <h4>Une suivie intergral de l'achat du terain a la construction complete de votre maison </h4>
                <div class="row div ">
                    <div class="div-gauche col-md">
                       <P> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus beatae consectetur reiciendis nulla hic, officia assumenda eos rerum at saepe nemo, ipsa quisquam id sequi repellat dicta ipsam neque asperiores.</p>
                    </div>
                    <div class="div-gauche col-md">
                        <a href="">
                            <img src="images/viewsImages/plan2.jpg" alt="plan2" height="80%" width="100%">
                        </a>
                    </div>
                </div>
            </div>
            <!-- fin de la section h2 -->
            <!-- section de connexion -->
            <div class="connexion">
               <h1> n'esitez pas a vous inscrire </h1>
                <a href="inscription.php " class="lien">cree mon compte</a>
            </div>
            <div class="h2">
                <h4>un partenair de confience </h4>
                <div class="row div ">
                    <div class="div-gauche col-md">
                        <a href="">
                            <img src="images/viewsImages/partenaire.jpg" alt="plan2" height="80%" width="100%">
                        </a>
                    </div>
                    <div class="div-gauche col-md">
                       <P> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus beatae consectetur reiciendis nulla hic, officia assumenda eos rerum at saepe nemo, ipsa quisquam id sequi repellat dicta ipsam neque asperiores.</p>
                    </div>
                </div>
            </div>
    <!-- Fin de la section information -->
  </section>
</section>
</body>
<?php include 'assert/include/footer.php' ?>
</html>