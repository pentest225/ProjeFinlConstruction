<?php 
session_start();
    if(isset($_SESSION['userNum']))
    {

    }
    require 'class/dataBase.php';
    require 'class/function.php';
    $err=$nom=$prenoms =$numero =$email=$typeUser=$pass1=$pass2=$image_name="";
    if(isset ($_POST) && !empty($_POST))
    {
        $isValid=true;
        extract($_POST);
        $nom=verifInfo($nom);
        $prenoms=verifInfo($prenoms);
        $numero=verifInfo($numero);
        $email=verifInfo($email);
        $typeUser=verifInfo($typeUser);
        $pass1=verifInfo($pass1);
    
        if(empty($nom) or empty($prenoms) or empty($numero) or empty($email) or empty($typeUser))
        {
            $err="veillez remplire tous les champs";
            $isValid=false;
        }
        if(mb_strlen($pass1)< 5)
        {
           $err="password trop court ";
            $isValid=false; 
        }
        if(($pass1 != $pass2))
        {
            $err="Les deux mot de pass doivent etre identique";
            $isValid=false;
        }
        //traitement ces images 
        if($isValid and !empty($_FILES) )
        {
            $image_name=$_FILES['image']['name'];
            $tmp_image=$_FILES['image']['tmp_name'];
            $dir="imagesUser/";
            if(!empty($image_name))
            {
                $isUpload=uplaodeImage($image_name,$tmp_image,$dir);
                var_dump($isUpload["status"]);
                if($isUpload["status"])
                {
                    //connexion al a base de donne 
                    $db =DataBase::connect();
                    $data=[$nom,$prenoms,$pass2,$numero,$email,$image_name,$typeUser];
                    //verifiacation de son numero
                    $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
                    $NumeroExist->execute(array($numero));
                    $resNumExit=$NumeroExist->fetch();
                    if(!$resNumExit)
                    {
                        $req=$db->prepare('INSERT INTO User (Nom,Prenoms,Pass,Numero,Email,image,type) VALUES (?,?,?,?,?,?,?)');
                            $res=$req->execute($data);
                            if($res)
                            {
                                $_SESSION['userNum']=$numero;
                                $_SESSION['userName']=$nom;
                                header('Location:login.php');
                            }
                    }
                    else
                    {
                        $err="desole ce numero exist dejat dans la base de bonne ";
                    }
                }
                else
                {
                    $err=$isUpload["message"];
                }
                //Insertion des infromations dans la base de bonne 
                

            }
            
        }
         
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
<link rel="stylesheet" href="css/inscription.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<title>construction</title>
</head>
<body>
<?php include 'include/header.php' ?>
<section class="principale">
<header>
    <div class="contenu">
            <div class="form">
            <?php if(!empty($err)) :?>
            <div class="err">
               <p><?=$err ?></p> 
            </div>
            <?php endif ?>
            <form method='post' action='#' enctype='multipart/form-data'>
            <h2>Mercie de nous donne plus d'information sur vous</h2>
                <div class="form-group">
                    <select name="typeUser" id="typeUser" class="form-control">
                        <option value="">Je suis ???</option>
                        <option value="u">Client</option>
                        <option value="f">Fournisseur</option>
                        <option value="e">Entreprenneur</option>
                    </select>
                </div>
                    <div class="row">
                        <!-- nom -->
                        <div class="col-sm">
                            <div class="form-group">
                            <input type="text" name="nom" id="nom" placeholder=" votre nom" class="form-control" value="<?=$nom?>">
                            </div>
                        </div>
                        <!-- prenoms -->
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" name="prenoms" id="prenoms" placeholder=" votre prenoms" class="form-control" value="<?=$prenoms?>">
                            </div>
                        </div>
                    </div>
                        <!-- numero -->
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <select name="NumPays" id="NumPays" class="form-control">
                                    <option value="">Cote d'ivoire +225</option>
                                    <option value="">Cote d'ivoire +225</option>
                                    <option value="">Cote d'ivoire +225</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="number" name="numero" id="numero" placeholder=" votre numero" class="form-control" value="<?=$numero?>">
                            </div>
                        </div>
                    </div>
                        <!-- fin numero -->
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="adresse email" class="form-control" value="<?=$email?>">
                    </div>
                    <div class="row">
                        <!-- password -->
                        <div class="col-sm">
                            <div class="form-group">
                            <input type="password" name="pass1" id="pass" placeholder=" mot de passe " class="form-control">
                            </div>
                        </div>
                        <!-- password2 -->
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="password" name="pass2" id="pass" placeholder=" confirmer " class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" id="image" placeholder="charger une photo " class="form-control" value="<?=$image_name?>"><i class="far fa-camera"></i> 
                    </div>
                    <div class="from-group">
                        <input type="submit" value="s'inscrire" class="btn btn-success">
                    </div>
                    </form>
                    <!-- fin du formulaire -->
                </div>
            </div>
        </div>
    </div>
</header>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true" id="connexion">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">connexion</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form action="">
                        <div class="form-group">
                        <i class="fas fa-user"></i><input type="text" name="" id="" placeholder="Login" class="form-control" >
                        </div>
                        <div class="form-group">
                        <input type="password" name="" id="" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="col-sm">
                        <input type="submit" value="connecter" class="btn btn-success">
                    </div>
                </div>
                </form>

            </div>
            <div class="modal-footer">
                        <button class="btn btn-danger"> fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
</section>
</body>
</html>