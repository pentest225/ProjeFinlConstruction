<?php 
session_start();
    require '../../assert/class/dataBase.php';
    require '../../assert/class/function.php';
    $valid["status"]=true;
    $valid["message"]="";
        $nom=$prenoms=$num=$email=$ville=$commune=$diplome=$pass1=$pass2='';
    if(isset ($_POST['submit']))
    {
        $isValid=true;
        extract($_POST);
        $nom=verifInfo($nom);
        $prenoms=verifInfo($prenoms);
        $num=verifInfo($num );
        $email=verifInfo($email);
        $ville=verifInfo($ville);
        $commune=verifInfo($commune);
        $diplome=verifInfo($diplome);
        $pass1=verifInfo($pass1);
        $pass2=verifInfo($pass2);
        
        // if(empty($nom) or empty($prenoms) or empty($num) or empty($email) or empty($ville) or empty($commune) )
        // {
        //     $valid["status"]=false;
        //     $isValid=false;
        //     $valid["message"]="veillez remplire tous les champs";
        // }
        if(empty($condition))
        {
            $valid["status"]=false;
            $isValid=false;
            $valid["message"]="vous avez pas accepter le comdition d'utilisation de cette plate forme";
        }
        if(mb_strlen($pass1)< 5)
        {
            $valid["status"]=false;
            $valid["message"]="password trop court Niminum 5 carataires";
        }
        if(mb_strlen($num)!=8)
        {
            $valid["status"]=false;
            $valid["message"]="veillez saisir un numero valide Ex:09 55 09 56";
        }
        if($pass1 != $pass2)
        {
            $valid["status"]=false;
            $valid["message"]="Les deux mots de pass sons differant ";
        }
        //traitement ces images

        if($valid['status'] && !empty($_FILES) )
        {
            $image_name=$_FILES['image']['name'];
            $tmp_image=$_FILES['image']['tmp_name'];
            $dir="../../images/imagesUser/";
            if(!empty($image_name))
            {
                //connexion al a base de donne 
                $db =DataBase::connect();
                $data=[$nom,$prenoms,$pass2,$num,$email,$image_name,'e'];
                //verifiacation de son numero
                $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
                $NumeroExist->execute(array($num));
                $resNumExit=$NumeroExist->fetch();
                if(!$resNumExit)
                {
                    //si le numero est bon 
                    $isUpload=uplaodeImage($image_name,$tmp_image,$dir);
                    //si l'upload est bon 
                    if($isUpload["status"])
                    {
                        $req=$db->prepare('INSERT INTO User (Nom,Prenoms,Pass,Numero,Email,image,type) VALUES (?,?,?,?,?,?,?)');
                        $res=$req->execute($data);
                        if($res)
                        {
                            $_SESSION['userNum']=$numero;
                            $_SESSION['userName']=$nom;
                            header('Location:../../login.php');
                        }
                    }
                    else
                    {
                        $valid["status"]=false;
                        $valid["message"]=$isUpload["message"];
            
                    }
                    
                }
                else
                {
                    $valid["status"]=false;
                    $valid["message"]="desole ce numero exist dejat dans la base de bonne ";
                }
            }
            
        }
         
    }

 ?>

 <!-- FIN DES TRAITEMENT PHP -->

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
<link rel="stylesheet" href="../../css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>construction</title>
</head>
<body>
<?php include '../include/headerViews.php' ?>

<div class="principale">
    <div class="contenu">
        <div class="form">
            <?php if(!$valid["status"]):?>
                <div class="error" style="color: red;font-style: italic;">
                    <?=$valid["message"] ?>
                </div>
                <?php endif ?>
                    <form action="#" method="post" enctype="multipart/form-data" id='emtrepreneur'>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="nom" id="" placeholder="Nom" class="form-control fas fa-user"  value="<?=$nom ?>">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenom" id="" placeholder="prenom" class="form-control fas fa-user" value="<?=$prenoms ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="Numero" name="num" id="" class="form-control" placeholder="Numero" value="<?=$num ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="" class="form-control" placeholder="E-mail" value="<?=$email ?>">
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <div class="form-control">
                                <label for="estDiplone"  >Etres vous diplome ?</label>
                                <input type="radio" name="estDiplom" id=""  value="false">
                                <input type="radio" name="estDiplom" id="" value="false" >
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="diplome" id="" placeholder="saisir votre dipolme " class="form-control fas fa-user" value="<?=$diplome ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="ville" id="" class="form-control" placeholder="ville" value="<?=$ville ?>">
                            </div>
                        </div>
                        <div class="col-sm">
                        <div class="form-group">
                                <input type="text" name="commune" id=""  class="form-control" placeholder="commune" value="<?=$commune ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="password" name="pass1" id="" value="false" placeholder="password" class="form-control" value="<?=$pass1 ?>">
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="password" name="pass2" id="" placeholder="confirmer" class="form-control fas fa-user" value="<?=$pass2 ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="" class="form-control" placeholder="charger une image de profil" >
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="condition" id="">
                        <a>j'accepte les comdition d'utilisation</a>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-outline-success btn-lg">
                </div>
    </div>            
</div>
</div>
<?php include '../../assert/include/footer.php' ?>
</body>
</html>
