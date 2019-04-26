<?php 
session_start();
    require 'assert/class/dataBase.php';
    require 'assert/class/function.php';
    $db=DataBase::connect();
if(isset($_SESSION['userNum']))
{
     $bienvenue=true;
     $NumeroExist=$db->prepare('SELECT * FROM User WHERE Numero = ?');
     $NumeroExist->execute(array($_SESSION['userNum']));
     $resNumExit=$NumeroExist->fetchAll();
     //***************** TRAITEMENT DES IMAGES A UPLOADER *************************
     $result=[];
		if(isset($_POST['submit']))
		{
			extract($_POST);
			$fildsok=true;
			//var_dump(empty($typeplan));
			//montre l'erreur a stephane demain 
			if(empty($typePlan))
			{
				$fildsok=false;
				$result=[
					'status'=>false,
					'message'=>"veillez saisir le type du plan"
				];
			};
			if(empty($description))
			{
				$fildsok=false;
				$result=[
					'status'=>false,
					'message'=>"veillez la description du plan"
				];
				
			};
			if(!empty($_FILES))
			{
				if(isset($_FILES['plan']) && !empty($_FILES['plan']))
				{
					$image_name=$_FILES['plan']['name'];
					$image_tmp=$_FILES['plan']['tmp_name'];
					$dir="images/imagesPlan/";
					$isUpload=uplaodeImage($image_name,$image_tmp,$dir);
					if($isUpload['status'] && $fildsok)
					{
						
						$data=[$typePlan,$image_name,$description,$resNumExit[0]['id']];
						// insertData($db,'plan',$filds,$val,$data);
						$req=$db->prepare('INSERT INTO plan  (type,images,description,id_user) VALUES (?,?,?,?)');
						$res=$req->execute($data);
						if($res)
						{
							$result=[
								'status'=>true,
								'message'=>"ok le fichier ".$image_name." a ete enregistre "
							];
							//nous selectionnons en suite l'id du plan 
							$listeId=select($db,'id','plan','images',$image_name);
							if($listeId)
							{
								$id_plan=$listeId[0]['id'];
							}
						}
						//si on on a pas pu inserer le plan dans la base de bonne 
						else
						{
							$result=[
								'status'=>false,
								'message'=>"erreur lor de l'insertion de  ".$image_name." dans la base de donnee "
							];
						}
					}
					//si erreur dans le traitement de l'images du plan 
					else
					{
						$result=[
							'status'=>false,
							'message'=>$isUpload['message']
						];
					}
					
						
				};

			}
			//si on a pu inserer le plan dans la base de bonne alor suis 
			if(isset($id_plan))
			{
				// Count # of uploaded files in array
				$total = count($_FILES['images']['name']);
				// Loop through each file
				for( $i=0 ; $i < $total ; $i++ ) 
				{
					//Get the temp file path
					$image_name=$_FILES['images']['name'][$i];
					$tmpFilePath=$_FILES['images']['tmp_name'][$i];
					$dir="images/imagesMaisons/";
					$tmpFilePath = $_FILES['images']['tmp_name'][$i];
					//Make sure we have a file path
					$isUpload=uplaodeImage($image_name,$tmpFilePath,$dir);
					if($isUpload['status'])
					{
						$insert =$db->prepare('INSERT INTO maisons (image,id_plan,id_user) VALUES (?,?,?)');
						$insert->execute(array($image_name,$id_plan,$resNumExit[0]['id']));
						if($insert)
						{
							$result=[
								'status'=>true,
								'message'=>"ok l'image ".$image_name." est enregistre"
							];
						}
						else{
							$result=[
								'status'=>false,
								'message'=>"Error pendant l'enregistrement de l'image ".$image_name." ."
							];
						}
					}else
					{
						$result=[
							'status'=>false,
							'message'=>$isUpload['message']
						];
					}	

				}
			}
			else
			{
				$result=[
							'status'=>false,
							'message'=>"Erreur lor de l'insertion du plan ;("
						];
			}
			
		}


}
else
{
    header('Location:index.php');
}
//************************FIN DU TRAITEMENT DES IMAGES ***********************************
?>
<!-- TRAITEMENT DES INFORMATION EN PHP  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/profil.css">
    <title>Document</title>
</head>
<body>

<div class="principale">
    <div class="row">
        <div class="col-md-3 divLeft">
            <div class="divImage">
                <img src="images/imagesUser/<?=$resNumExit[0]['image']?>" alt=""  width="130px" height="100px" class="rounded-circle">

                <div style="font-size: 40px">
                    <a href=""><i class="fas fa-user-cog"></i></a>
                </div>
                <div class="seting" style="font-size: 25px">
                    <div class="row"> 
                        <div class="col-sm"><a href="index.php"><i class="fas fa-sign-out-alt"></i></a></div>
                        <div class="col-sm"><a href="modif.php"><i class="fas fa-user-edit"></i></a></div>
                    </div>
                </div>
            </div>
	<!-- LES ONGLES DE LA PAGE DE PROFIL -->
     <div class="divLien">
        <a  href="#" class="btn btn-outline-success lien"><i class="far fa-home-lg-alt"></i>Ajouter des Plan </a>
        <a  href="" class="btn btn-outline-primary lien">Clien</a>
        <a  href="" class="btn btn-outline-primary lien">Genere un devis </a>
    </div>
</div><!-- CETTE DIV EST OUVERTE DANS LE INCLUDE DONC A NE PAS SUPPRIMER -->
    <!--************************ SECTION DE DROITE DE LA PAGES************************** -->
<div class="offset-md-3  col-md-8 ">
    <div class="form">
			<h2>Ajouter des plans et maison </h2>
			<!-- AFFICHAGE DU MESSAGES DE CONFIRMATION -->
			<?php if(isset($result['status']) and ($result['status'])):?>
			<div class="alert alert-success">
				<p><?=$result['message'] ?></p>
			</div>
			<?php endif ?>
			<?php if(isset($result['status']) and (!$result['status'])): ?>
				<div class="alert alert-danger">
					<p><?=$result['message'] ?></p>
				</div>
			<?php endif ?>
			<!-- AFFICHAGE DES MESSAGES D'ERREUR -->
			<div class="container">
					<form class="form" action="#" , method="post" enctype="multipart/form-data">
							
						<div class="row">
							<!-- plan -->
							<div class="col-sm">
								<div class="form-group">
								<input type="file" name="plan" id="image" placeholder=" charger l'images du plan " class="form-control">
								</div>
							</div>
							<!--type de plan -->
							<div class="col-sm">
								<select name="typePlan" id="typePlan" class="form-control">
								<option value="">Selectionne le model de plan</option>
									<?php 
										$type_plan = selectAll($db,'type_plan');
										foreach ($type_plan as $plan):
											$id =$plan['id'];
											$nom=$plan['Nom'];
										?>
									<option value="<?= $id ?>"><?= $nom ?></option>
								<?php endforeach ?>
								</select>
							</div>
						</div>
						
						
						<!-- maisons et commentaire-->
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
								<input type="file" name="images[]" multiple id="image" placeholder=" maison1 " class="form-control">
								</div>
							</div>
							<div class="col-sm"> 
								<div class="form-group">
									<textarea name="description" id="description"  class="form-control" placeholder="descriptions du plan">
									</textarea>
								</div>
							</div>
						</div>
						<div class="from-group">
							<input type="submit" value="Ajouter" class="btn btn-success" name="submit">
						</div>
				</form>
			</div>

    </div>
</div>
<!-- FIN DE LA DIV DE DROITE -->
<
</body>
</html>

