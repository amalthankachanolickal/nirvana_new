<?php
include("../model/class.expert.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(($_POST['ActionCall']=="Addinsertimage")){
        $imageData = $_FILES['image_save']['name'];
        if(move_uploaded_file($_FILES['image_save']['tmp_name'],'../mailer_insert_image/'.$imageData)){
            $dataU = array(
        	'image_caption' => $_POST['image_caption_save'],
        	'image' => $imageData,
        	'Width' => $_POST['Width'],
        	'Height' => $_POST['Height'],
        	);
        	$resultU = $ModelCall->insert('mailer_insert_image',$dataU);
        	echo "<img src=".SITE_URL."RWAVendor/mailer_insert_image/".$dataU['image']." width='".$dataU['Width']."' height='".$dataU['Height']."' >";
        }
    }
}
?>
