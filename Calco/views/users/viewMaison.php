<?php 
session_start();
    require '../../assert/class/dataBase.php';
    require '../../assert/class/function.php';
    $db=DataBase::connect();
if(isset($_SESSION['userNum']))
{
     $bienvenue=true;
     $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
     $NumeroExist->execute(array($_SESSION['userNum']));
     $resNumExit=$NumeroExist->fetchAll();
     // selection des plans
     $selectPlan=$db->prepare('SELECT * FROM plan');
     $selectPlan->execute(array());
     $resultPlan=$selectPlan->fetchAll();
     //
}
else
{
    header('Location:index.php');
}
    if(isset($_GET['id']))
    {
      //selection des images de maison correspondant au plan 
        $id=$_GET['id'];
        $db=DataBase::connect();
        $selectMaison=$db->prepare('SELECT * FROM maisons WHERE id_plan= ?');
        $selectMaison->execute(array($id));
        $resultMaison=$selectMaison->fetchAll();
        $NombreMaison=sizeof(($resultMaison));

        //selection de l'emtrepreneur quia publier le plan 
        $selectE=$db->prepare('SELECT id_user FROM plan WHERE id= ?');
        $selectE->execute(array($id));
        $resulE=$selectE->fetchAll();
        $id_Em=$resulE['0']['id_user'];
        
    }
    else
    {
      header('Location:index.php');
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<title>Responsive Image Carousel Lightbox Example</title>

	<link rel="stylesheet" href="../../css/lightbox.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" >
<style>
body { overflow: hidden; }
h1    {text-align:center;}
#gallery img { width: 400px; height: 250px; }
.infoMaison{margin: 20px;border: 1px solid black;}
.principale{
    position: absolute;
    min-height: 100%;
    width: 100%;
    background-image: url('images/image4.jpg');
    background-size: cover;
    
  }
.divLeft{
    height: 100%;
    width: 100%;
    position: fixed;
    background-color:rgb(117, 109, 109,.5);
    text-align: center;
}
.divReight
{
}
.divLeft .lien
{
    width: 250px;
}
.divImage
{
    margin: 10px;
}


</style>
</head>
<body>
<div class="principale">
    <div class="row">
    <!--  *****************DIV DE GAUCHE SECTION PROFIL********************* -->
         <div class="col-md-3 divLeft ">
            <div class="divImage">
                <img src="../../images/imagesUser/<?=$resNumExit[0]['image']?>" alt=""  width="130px" height="100px" class="rounded-circle">

                <div style="font-size: 40px">
                    <a href=""><i class="fas fa-user-cog"></i></a>
                </div>
                <div class="seting" style="font-size: 25px">
                    <div class="row"> 
                        <div class="col-sm"><a href="../../index.php"><i class="fas fa-sign-out-alt"></i></a></div>
                        <div class="col-sm"><a href="#"><i class="fas fa-bell"></i><span style="color: red;font-size: 20px"></span><?=$resNumExit[0]['notif']?></a></div>
                        <div class="col-sm"><a href="modif.php"><i class="fas fa-user-edit"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="divLien">
                    <a  href="" class="btn btn-outline-success lien"><i class="far fa-home-lg-alt"></i>Ajouter au favoris</a>
                    <a  href="" class="btn btn-outline-primary lien">Contacter L'entrepreneur</a>
                    <a  href="" class="btn btn-outline-primary lien">Genere un devis </a>
                </div>
          </div>
<!--  ***************** DIV DE DROITE SECTION DYNAMMIQUE ********************* -->
      <div class="offset-md-3  col-md-10 divReight">

          <h1>section de droite </h1>
          <div class="row">
            <div class="col-sm">
              <a  href="emtrepreneur.php?id_E=<?=$id_Em?>" class="btn btn-outline-success lien"><i class="fas fa-user-hard-hat"></i> Contater l'entrepreneur</a>
            </div>
            <div class="col-sm ">
                <a  href="" class="btn btn-outline-warning lien"><i class="fas fa-heart"></i> Ajouter au favories</a>
            </div>
            <div class="col-sm ">
                <a  href="user_profil.php" class="btn btn-outline-info lien"><i class="fas fa-reply"></i> Retour au plans</a>
            </div>
          </div>
          <div class="jquery-script-ads" align="center">
             <!--  <script type="text/javascript">
              google_ad_client = "ca-pub-2783044520727903";
              /* jQuery_demo */
              google_ad_slot = "2780937993";
              google_ad_width = 728;
              google_ad_height = 90;
              //
              </script> -->
              <script type="text/javascript"
              src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
              </script>
          </div>
      <!--*********************SECTION D'AFFICHAGE DYNAMIQUES DES IMAGES************************** --> 
          <div class="centering">
            <div id="gallery" >
                <?php foreach ($resultMaison as $maisons):
                            $imageMaison=$maisons['image']
                        ?>
                  <a href="../../images/imagesMaisons/<?=$imageMaison?>" class="gal_link"><img src="imagesToUpload/<?=$imageMaison?>"></a>
                <?php endforeach ?>
            </div>
          </div> 
    <!--FIN DE LA SECTION DE DROITE  -->
    </div>
  </div>
<!-- FIN DE LA CLASS ROW PRINCIPALE -->
</div>
  <!-- FIN DE LA DIV PRINCIPALE -->
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="../../js/jquery.lightbox.js"></script>
	<script src="../../js/lightbox.js"></script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
