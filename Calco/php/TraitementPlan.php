<?php 
require 'class/dataBase.php';
require 'class/function.php';
$db =DataBase::connect();
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
			$dir="imagesToUpload/";
			$isUpload=uplaodeImage($image_name,$image_tmp,$dir);
			if($isUpload['status'] && $fildsok)
			{
				$data=[$typePlan,$image_name,$description];
				// insertData($db,'plan',$filds,$val,$data);
				$req=$db->prepare('INSERT INTO plan  (type,images,description) VALUES (?,?,?)');
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
						$id=$listeId[0]['id'];
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
	// Count # of uploaded files in array
		$total = count($_FILES['images']['name']);
		// Loop through each file
		for( $i=0 ; $i < $total ; $i++ ) 
		{
			//Get the temp file path
			$image_name=$_FILES['images']['name'][$i];
			$tmpFilePath=$_FILES['images']['tmp_name'][$i];
			$dir="imagesToUpload/";
			$tmpFilePath = $_FILES['images']['tmp_name'][$i];
			//Make sure we have a file path
			$isUpload=uplaodeImage($image_name,$tmpFilePath,$dir);
			if($isUpload['status'])
			{
				$insert =$db->prepare('INSERT INTO maisons (image,plan) VALUES (?,?)');
				$insert->execute(array($image_name,$id));
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

?>
