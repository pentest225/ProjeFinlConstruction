<?php 
 require '../../assert/class/dataBase.php';
 require '../../assert/class/function.php';
	if(isset($_POST))
	{
		$retour=[
				'status'=>true,
				'message'=>''
			];
		extract($_POST);
		
		$message=verifInfo($message);
		$emmeteur=verifInfo($emmeteur);
		$recepteur=verifInfo($recepteur);
		if(empty($message))
		{

			$retour=[
				'status'=>false,
				'message'=>'Veillez saisir votre messages'
			];
		}
		if($retour['status'])
		{
			$db=dataBase::connect();
			$insertion=$db->prepare('INSERT INTO message (id_emmeteur,id_recepteur,message) VALUES(?,?,?)');
			$insertion->execute(array($emmeteur,$recepteur,$message));

			//mise a jour des notifiaction 
			$lastNotif=$db->prepare('SELECT notif FROM user WHERE id =?');
			$lastNotif->execute(array($recepteur));
			$resLastNotif=$lastNotif->fetch();
			$InsterNotif=$db->prepare('UPDATE user set notif = ? WHERE id=?');
			
			$nweNotif=($resLastNotif[0]+1);
			$InsterNotif->execute(array($nweNotif,$recepteur));
			if($insertion && $InsterNotif)
			{
				$retour=[
					'status'=>true,
					'message'=>'votre message a bien ete envoyer ;)'
				];
			}
			else
			{
				$retour=[
					'status'=>false,
					'message'=>'Erreur pandant l\'insertion ;( '
				];
			}
		}

		echo json_encode($retour);
	}


?>