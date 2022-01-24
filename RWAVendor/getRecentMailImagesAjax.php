<?php include('model/class.expert.php');?>

<?php
$ModelCall->orderBy("id","desc");
$recent_images = $ModelCall->get("mailer_insert_image") ;
//print_r($recent_images);

$table = "<table class='table table-striped custom-table datatable'>
<thead>
<tr>
<th><b>IMAGE</b></th>
<th><b>ACTION</b></th>
</tr>
</thead>";

foreach ($recent_images as $image){
    $table .="<tr>";
    $table .="<td>";
    $table .= "<img id='img_".$image['Id']."' src=".SITE_URL."RWAVendor/mailer_insert_image/".$image['image']." width='".$image['Width']."' height='".$image['Height']."' >";
    $table .="</td>";
    $table .="<td>";
    $table .= "<button onclick='tryit(".$image['Id'].",".$image['Width'].",".$image['Height'].")' class='btn btn-primary rounded' ><i class='fa fa-image'></i>  Choose & Insert</button>";
    $table .="</td>";
    $table .="</tr>";
    
}

$table .="</table>";
echo $table;

?>
          
