<?php include('model/class.expert.php');
if(isset($_POST['id'])){
    $property_id=$_POST['id'];
    $ModelCall->where("id",$property_id);
    $getPropertyDetail = $ModelCall->get("newbuynsell");
/* $query= mysqli_query($ModalCall,"select * from buynsell where id='$property_id'")or die(mysqli_error($ModalCall));
 $getPropertyDetails = mysqli_fetch_assoc($query);*/
 $output='';
foreach($getPropertyDetail as $getPropertyDetails){
    
                                    $Approval_Date = $getPropertyDetails['approvalDate'];  
                                    $new_approval_Date = date("d-m-Y", strtotime($Approval_Date));  
                                    
                                    if($getPropertyDetails['price'] > 0 && $getPropertyDetails['price'] < 1000){
                                        $output_price = $getPropertyDetails['price'];
                                    }else if($getPropertyDetails['price'] >= 1000 && $getPropertyDetails['price'] < 100000){
                                        $Price = $getPropertyDetails['price']/1000;
                                        $Price_Decimal = $getPropertyDetails['price']%1000;
                                        $output_price = substr($Price_Decimal, 0, 0);
                                        $output_price = "Rs.".$Price.$output_price." K";
                                    }else if($getPropertyDetails['price'] >= 100000 && $getPropertyDetails['price'] < 10000000){
                                        $Price = $getPropertyDetails['price']/100000;
                                        $Price_Decimal = $getPropertyDetails['price']%100000;
                                        $output_price = substr($Price_Decimal, 0, 0);
                                        $output_price = "Rs.".$Price.$output_price." L";
                                    }else if($getPropertyDetails['price'] >= 10000000 ){
                                        $Price = $getPropertyDetails['price']/10000000;
                                        $Price_Decimal = $getPropertyDetails['price']%10000000;
                                        $output_price = substr($Price_Decimal, 0, 0);
                                        $output_price = "Rs.".$Price.$output_price." C";
                                    }else if($getPropertyDetails['price'] == 0){
                                        $output_price = "N/A";
                                    }


                                    if($getPropertyDetails['bedroom'] == NULL || $getPropertyDetails['bedroom'] == ''){
                                        $Bedrooms = "N/A";
                                    }else{
                                        $Bedrooms = $getPropertyDetails['bedroom']."BHK";
                                    }
                                    
                                    if($getPropertyDetails['property_type'] == NULL || $getPropertyDetails['property_type'] == ''){
                                        $getPropertyDetailstype = "N/A";
                                    }else{
                                        $getPropertyDetailstype = $getPropertyDetails['property_type'];
                                    }
                                    
                                    if($getPropertyDetails['area'] == NULL || $getPropertyDetails['area'] == ''){
                                        $getPropertyDetails_area = "N/A";
                                    }else{
                                        $getPropertyDetails_area = $getPropertyDetails['area']." (sq. Ft.)";
                                    }
                                    
                                    if($getPropertyDetails['expectedRental'] == NULL || $getPropertyDetails['expectedRental'] == ''){
                                        $Expectedrent = "N/A";
                                    }else{
                                        $Expectedrent = "Rs. ".$getPropertyDetails['expectedRental']."Rent/month";
                                    }
                                    
$output.='<div style="width:50%;float:left;display:inline-block">
      <div class="modal-header">
        <h3 >SMS/Email to owner</h3>
      
      </div>
    
      <div class="modal-body">
        <form action="'.SITE_URL.'controller/property_enquiry.php?property_id='.$property_id.'" method="post">
             <div class="form-group">
           
            <input type="text" class="form-control" name="name" id="recipient-name"  placeholder="Name" required>
          </div>
           <div class="form-group">
            
            <input type="email" class="form-control" name="email" id="recipient-name" placeholder="Email" required>
          </div>
         
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="msg" id="message-text" style="height:100px" required placeholder="Your Message"></textarea>
          </div>
          
        
       <div class="modal-footer">
       <div class="text-center">
            <button type="submit" class="btn custom_btn" style="background-color:green" name="submit">Send</button>
       </div>
      </div>
      </form>
      </div>
      </div>
      <div class="vl"></div>
       <div style="width:50%;display:inline-block;height:500px;">
      
      <div class="modal-header">
      
        <h3>Property details</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
    
      <div class="modal-body ">';
      
      if($getPropertyDetails['bedroomImage'] <> '' || $getPropertyDetails['bedroomImage'] <> NULL){
        $output.=' <img src="'.SITE_URL.'properties_images/'.$getPropertyDetails['bedroomImage'].'" alt="image" width=120 height=100>' ; 
      }
      if($getPropertyDetails['bathroomImage'] <> '' || $getPropertyDetails['bathroomImage'] <> NULL){
          $output.='<img src="'.SITE_URL.'properties_images/'.$getPropertyDetails['bathroomImage'].'" alt="image" width=120 height=100>';
      }
      if($getPropertyDetails['balconyImage'] <> '' || $getPropertyDetails['balconyImage'] <> NULL){
          $output.='<img src="'.SITE_URL.'properties_images/'.$getPropertyDetails['balconyImage'].'" alt="image" width=120 height=100>';
      }
      if($getPropertyDetails['frontImage'] <> '' || $getPropertyDetails['frontImage'] <> NULL){
          $output.='<img src="'.SITE_URL.'properties_images/'.$getPropertyDetails['frontImage'].'" alt="image" width=120 height=100>';
      }
    
    $output.='<b class="text-muted">Description</b>';
      $output.='<a href="#"><h4>'.$getPropertyDetails['description'].'</h4><br>
       <h4>Bedrooms: '.$Bedrooms.'  '.$getPropertyDetailstype.'</h4>';
       if($getPropertyDetails['listing_type']=="sell" || $getPropertyDetails['listing_type']=="buy"){
       $output.='<p>Price: '.$output_price.'  </p>';
       }else{
       $output.='<p>Price: '.$output_price.'</p><br></p>';
       }
       if($getPropertyDetails['houseNo'] == NULL || $getPropertyDetails['houseNo'] == ''){
           $output.='<p>Address: '.$getPropertyDetails['locality'].', '.$getPropertyDetails['city'].'</p></a>';
       }else{
       $output.='<p>Address: '.$getPropertyDetails['houseNo'].', '.$getPropertyDetails['locality'].', '.$getPropertyDetails['city'].'</p></a>';
       }
      '</div>
     
     
      
    </div>';
echo $output;     
}
}
?>
