<?php
//si on l'upload du plan est bon on passe a l'uplaode des maison
foreach($_FILES['images'] as $fichiers)
    {
        var_dump($fichier);
        $image_name=$fichier['name'];
        $tmp_image=$fichier['tmp_name'];
        $dir="imagesToUpload/";
        if($fichier == UPLOAD_ERR_NO_FILE)
        {
            continue;
        }
        //insertion des images de maison dans la base de donnee
        if(!empty($image_name))
        {
            $isUpload=uplaodeImage($image_name,$tmp_image,$dir);
            if($isUpload['status'] && $fildsok)
            {
                $data=[$image_name,$id];
                // insertData($db,'plan',$filds,$val,$data); 
                $req=$db->prepare('INSERT INTO maisons  (image,plan) VALUES (?,?)');
                $res=$req->execute(array($image_name,$id));
                if($res)
                {
                    $result=[
                        'status'=>true,
                        'message'=>"ok le fichier ".$image_name." a ete enregistre "
                    ];				

                }
            }
        }
    }