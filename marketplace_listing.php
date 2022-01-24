<div class="col-lg-9 col-md-12">
                <!-- Option bar start -->
                <?php /*?><div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                    <!-- <div class="col-lg-7 col-md-7 col-sm-7">
                     <p> <?php echo count($getMarketPlaceInfo);?> Listing available</p>
                     </div>-->
                        <div class="col-lg-5 col-md-5 col-sm-5 pull-right">
                       
                            <div class="sorting-options2">
                                <span class="sort">Sort by:</span>
                                <select class="selectpicker search-fields" name="sortby">
                                    <option value="">Select</option>
                                    <option value="rating_0">Rating High to Low</option>
                                    <option value="rating_1">Rating: Low to High</option>
                                    <option value="newest_0">Newest listing</option>
                                    <option value="newest_1">Oldest listing</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div><?php */?>
                <div class="row">
                    
<?php if($getMarketPlaceInfo[0]>0){ foreach($getMarketPlaceInfo as $getMarketPlaceInfoVal){
$ModelCall->where("id", $getMarketPlaceInfoVal['catgeory_id']);
$ModelCall->orderBy("category_name","asc");
$GetCategoryList = $ModelCall->get("tbl_category_entry");
					 ?>          
                    <div class="col-lg-4 col-md-4 col-sm-12" >
                        <div class="listing-item-box">
                            <div class="listing-thumbnail">
                                <a href="" data-toggle="modal" data-target="#listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" class="listing-photo">
                                    <div class="tag"><?php echo ucwords($GetCategoryList[0]['category_name']);?></div>
                                    <div class="location">
                                        <i class="flaticon-pin"></i><?php echo ucwords($getMarketPlaceInfoVal['service_address']);?>
                                    </div>
                                    <div class="ratings">
                                    <?php if($getMarketPlaceInfoVal['rating']==5){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <?php } else if($getMarketPlaceInfoVal['rating']==4){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==3){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                       <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==2){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==1){?>
                                        <i class="fa fa-star"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else {?>
                                        <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <?php } ?>
                                        <!--<span>( 0 Reviews )</span>-->
                                    </div>
                                    <?php if($getMarketPlaceInfoVal['service_pic']!=''){?>
                                    <img class="d-block w-100" src="<?php echo SITE_URL.MAINADMIN;?>events/photo/<?php echo $getMarketPlaceInfoVal['service_pic'];?>" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" alt="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" style="height: 200px;">
                                    <?php } else { ?>
                                     <img class="d-block w-100" src="<?php echo SITE_URL;?>images/img-5.jpg" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" alt="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>">
                                    <?php } ?>
                                </a>
                            </div>
                            <div class="detail" style="height: 165px;">
                                <a data-toggle="modal" data-target="#listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>" href="" class="icon">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <h3 class="title">
                                    <a href="" data-toggle="modal" data-target="#listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>">
									<?php echo ucwords($getMarketPlaceInfoVal['service_name']); ?>
									</a>
                                </h3>
                                <p><?php if(strlen($getMarketPlaceInfoVal['about_service'])>=81) { echo ucwords(substr($getMarketPlaceInfoVal['about_service'],0,80));?> ...<?php } else { echo $getMarketPlaceInfoVal['about_service'];}?> </p>
                                
                            </div>
                        </div>
                    </div>
                    
                    
<div class="modal fade" id="listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>" tabindex="-1" role="dialog" aria-labelledby="listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listinginfo<?php echo $getMarketPlaceInfoVal['id'];?>"><?php echo ucwords($getMarketPlaceInfoVal['service_name']); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
      <div class="modal-body" style="padding:0px;">
      <div class="listing-thumbnail">
                              
                                    
                                    <div class="ratings">
                                    <?php if($getMarketPlaceInfoVal['rating']==5){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <?php } else if($getMarketPlaceInfoVal['rating']==4){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==3){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                       <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==2){?>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else if($getMarketPlaceInfoVal['rating']==1){?>
                                        <i class="fa fa-star"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                      <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                          <?php } else {?>
                                        <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                       <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <?php } ?>
                                        <!--<span>( 0 Reviews )</span>-->
                                    </div>
                                    <div class="location" style="position: absolute;bottom: 40px;left: 15px; z-index: 20;color: #fff;
    font-size: 14px;font-weight: 500;">
                                        <i class="flaticon-pin"></i> <?php echo ucwords($getMarketPlaceInfoVal['service_address']);?>
                                    </div>
                                    <?php if($getMarketPlaceInfoVal['service_pic']!=''){?>
                                    <img class="d-block w-100" src="<?php echo SITE_URL.MAINADMIN;?>events/photo/<?php echo $getMarketPlaceInfoVal['service_pic'];?>" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" alt="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" style="height:350px;">
                                    <?php } else { ?>
                                     <img class="d-block w-100" src="<?php echo SITE_URL;?>images/img-5.jpg" title="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>" alt="<?php echo ucwords($getMarketPlaceInfoVal['service_name']);?>">
                                    <?php } ?>
                                
                            </div>
        
         
                                    
        <p style="padding:10px;"><?php  echo $getMarketPlaceInfoVal['about_service'];?></p>
          <p style="padding-left:10px;"><strong>Days/Hours:</strong> <?php  echo $getMarketPlaceInfoVal['service_opening_days'];?>/<?php  echo $getMarketPlaceInfoVal['service_opening_times'];?></p>
            <p style="padding-left:10px;"><strong>Phone:</strong> <?php  echo $getMarketPlaceInfoVal['service_contact_phone'];?></p>
            <?php if($getMarketPlaceInfoVal['service_contact_website']!=''){ ?>
            <p style="padding-left:10px;"><strong>Website:</strong> <?php  echo $getMarketPlaceInfoVal['service_contact_website'];?></p>
            <?php } ?>
        
      
      </div>
    </div>
  </div>
</div>
                    
                    
                    <?php } } else {?>
                    <div class="col-lg-12 col-md-12 col-sm-12" >
                    <p style="text-align:center; font-size:16px; color:#FF0000;">There is no service available according your search keyword</p>
                    </div>
                    <?php } ?>
                </div>
                <!-- Page navigation start -->
                <?php /*?><div class="pagination-box p-box text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#">Prev</a>
                            </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="">2</a></li>
                            <li class="page-item"><a class="page-link" href="">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div><?php */?>
            </div>