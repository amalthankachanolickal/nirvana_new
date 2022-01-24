<?php
include("../model/class.expert.php");



if(($_POST['ActionCall']=="Addinsertimage")){
        
    
if($_FILES['image']['name']!='')
{
    
$imageData=$_FILES['image']['name'];

if(move_uploaded_file($_FILES['image']['tmp_name'],'../mailer_insert_image/'.$imageData)){
   header("location:".DOMAIN.AdminDirectory."send-custom-notification.php?actionResult=actionsuccess"); 
      
           
    //echo "Done";
    
    
   // echo "http://shishir.therwa.in/halloffame_images/".$imageData;
}else{
    echo "ERRR";
}

}


	
$dataU = array(
	'image_caption' => $_POST['image_caption'],
	'image' => $imageData,
	'Width' => $_POST['Width'],
	'Height' => $_POST['Height'],
	
	);



$resultU = $ModelCall->insert('mailer_insert_image',$dataU);

//echo "Done";

}

?>
