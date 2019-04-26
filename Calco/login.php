<?php 
session_start();
if(isset($_SESSION['userName']))
{
    $bienvenue=true;
}
    require 'assert/class/dataBase.php';
    require 'assert/class/function.php';
    $err=$nom="";
    if(isset ($_POST['submit']))
    {
        $isValid=true;
        extract($_POST);
        if(!empty($numero))
        {
            //connexion al a base de donne 
            $db =DataBase::connect();

            //verfication des informations dans la base de bonnes 
            $req=$db->prepare('SELECT * FROM user WHERE Numero = ?');
            $req->execute(array($numero));
            $res=$req->fetch();
            if($res)
            {
                
                if($res['Pass']= $pass)
                {
                    $_SESSION['userNum']=$numero;
                    //redirection en fonction du type de usert 
                   
                    if($res['type']=='u')
                    {
                        header('Location:views/users/user_profil.php');
                    }
                    elseif($res['type']=='e')
                    {
                        header('Location:views/emtrepreneur/addPlan.php');
                    }
                    else
                    {
                        header('Location:index.php');
                    }
                    
                }
                else
                {
                    $err="error password";
                    $isValid=false;
                }
            }
            
        }
        else
        {
           $err="veillez remplire tous les champs";
            $isValid=false; 
        }            
            /*$data=[$nom,$prenoms];
            var_dump($_POST["nom"]);
            $req=$db->prepare('INSERT INTO user (nom,prenoms) VALUES (?,?)');
            $req->execute($data);
            if($req)
            {
                $_SESSION["user"]=$nom;
            } */          
                //Insertion des infromations dans la base de bonne 
      
         
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="css/inscription.css">
<title>construction</title>
</head>
<body>
<?php include 'assert/include/header.php' ?>
<section class="principale">
     <?php if(isset($bienvenue)) : ?>
            <div class="animated bounce  bienvenue">
                <h4>Bienvenue Momsieur <strong><?=$_SESSION['userName'] ?></strong> Veillez saisir vos info pour accede a votre profil .</h4>
            </div>
        <?php endif ?>
<header> 
    <div class="contenu">
            <form  action="#" method="POST" id="form">
            <div class="form">
            <h2>Mercie de vous connecter </h2>
               <div class="err"><?= $err ?></div>
                    <div class="row">
                        <!-- nom -->
                        <div class="col-sm">
                            <div class="form-group">
                            <input type="number" name="numero" id="numero" placeholder=" votre numero" class="form-control" >
                            </div>
                        </div>
                        <!-- prenoms -->
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="password" name="pass"  placeholder="password" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <!-- date naissance -->
                 
                    <!-- fin des champs -->
                    <div class="from-group">
                        <input type="submit" value="s'inscrire" name ="submit" class="btn btn-warning" id="submit">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</header>


    
</section>
</body>
</html>