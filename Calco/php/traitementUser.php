<?php 
session_start();
    require '../assert/class/dataBase.php';
    require '../assert/class/function.php';
    $valid["status"]=false;
    $valid["message"]="";
    if(isset ($_POST) && !empty($_POST))
    {
        $isValid=true;
        extract($_POST);
        $nom=verifInfo($nom);
        $prenoms=verifInfo($prenoms);
        $numero=verifInfo($num );
        $email=verifInfo($email);
        $pass1=verifInfo($pass);
        if(empty($nom) or empty($prenoms) or empty($numero) or empty($email) or empty($typeUser))
        {
            $valid["status"]=false;
            $valid["message"]="veillez remplire tous les champs";
        }
        if(mb_strlen($pass1)< 5)
        {
            $valid["status"]=false;
            $valid["message"]="password trop court Niminum 5 carataires";
        }
        //traitement ces images 
        if($valid["status"] and !empty($_FILES) )
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
                    $data=[$nom,$prenoms,$pass2,$numero,$email,$image_name];
                    //verifiacation de son numero
                    $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
                    $NumeroExist->execute(array($numero));
                    $resNumExit=$NumeroExist->fetch();
                    if(!$resNumExit)
                    {
                        $req=$db->prepare('INSERT INTO User (Nom,Prenoms,Pass,Numero,Email,image,type) VALUES (?,?,?,?,?,?)');
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
                        $valid["status"]=false;
                        $valid["message"]="desole ce numero exist dejat dans la base de bonne ";
                    }
                }
                else
                {
                    $valid["status"]=false;
                    $valid["message"]=$isUpload["message"];
                }
                //Insertion des infromations dans la base de bonne 
                

            }
            
        }
         
    }

 ?>