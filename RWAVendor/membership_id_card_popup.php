

<div class="modal fade" id="idCardModal<?php echo $getDocumentVal['serialno'];?>" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">ID Card</h4>
        </div>
        <div class="modal-body p-0">
            <div class="container-fluid idCardContainer section-to-print" id="idCardContainer">
                <div class="row">
                    <div class="col col-2 col-xs-2 text-center idCardLogo">
                        <img src="https://www.nirvanacountry.co.in/RWAVendor//client_logo/5c4af13edde8dhome-logo.png" alt="Logo">
                    </div>
                    <div class="col col-2 col-xs-8 text-center idCardHeading">
                        <div>NIRVANA RESIDANTS WELFARE ASSOCIATION</div>
                        <div class="underlined">IDENTITY CARD</div>
                    </div>
                    <div class="col col-2 col-xs-2">
                        <!-- this will be empty -->
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12 col-md-6 mt-2">
                        <span>I Card No:-</span>
                        <span class="borderBottomDotted blankField"></span>
                    </div>
                    <div class="col col-xs-12 col-md-6 mt-2">
                        <span>Type of Membership:-</span>
                        <span class="borderBottomDotted blankField"><?php echo $getDocumentVal['member_type'];?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-xs-12 col-md-10 sideInfo">
                        <div class="mt-2">
                            <span class="key">Name</span>
                            <span class="borderBottomDotted blankField value"> 
                            <?= ucfirst($getDocumentVal['title_1']) .' '. ucfirst($getDocumentVal['tenant_first_name']) .' '. ucfirst($getDocumentVal['tenant_last_name']) ?> </span>
                        </div>
                        <div class="mt-2">
                            <span class="key">S/o W/o</span>
                            <span class="borderBottomDotted blankField value">
                                <?= ucfirst($getDocumentVal['title_2']) .' '. ucfirst($getDocumentVal['father_first_name']) .' '. ucfirst($getDocumentVal['father_last_name']) ?></span>
                        </div>
                        <div class="mt-2">
                            <span class="key">Address</span>
                            <span class="borderBottomDotted blankField value">  <?= getBlock($getDocumentVal['block_prime']) . '-' . $getDocumentVal['house_number'] . $isfloor . getFloor($getDocumentVal['floor_prime']) ?></span>
                        </div>
                        <div class="mt-2">
                            <span class="key">Membership No</span>
                            <span class="borderBottomDotted blankField value"><?php echo $getDocumentVal['app_membership_no'];?></span>
                        </div>
                    </div>
                    <div class="col col-xs-12 col-md-2 sideImg text-center">
                        <img src="<?php echo DOMAIN.$getDocumentVal['photograph_user'];?>" alt="" class="mt-2">
                    </div>
                </div>
                <div class="row lastSection">
                    <div class="col-xs-12 col-md-6 mt-2">
                        <span class="key">Date of Birth</span>
                        <span class="borderBottomDotted blankField value"><?php echo date('jS M, Y', strtotime($getDocumentVal['dob']));?></span>
                    </div>
                    <div class="col-xs-12 col-md-6 mt-2">
                        <span class="key">Date of Issue</span>
                        <span class="borderBottomDotted blankField value"><?= date('jS M, Y') ?></span>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-xs-6 text-center">
                        <div class="signImg text-center" style="height: 90px;">
                            <img src="<?php echo DOMAIN.$getDocumentVal['signature'];?>" alt="" height="40px" >
                        </div>
                        <div class="text-center">
                            Holder's Signature
                        </div>
                    </div>
                    <div class="col-xs-6 text-center">
                        <div class="signImg text-center" style="height: 90px;">
                           <img src="<?php echo DOMAIN;?>images/stamps-images/office-stamp.jpeg" alt="" height="40px" >
                        </div>
                        <div class="text-center">
                            Authorised Signatory of the Society
                        </div>
                    </div>
                </div>
            </div>


            <!-- modal end -->
        </div>
        <div class="modal-footer" style="display: flex; justify-content: space-evenly;">
          <button type="button" class="btn btn-success"  onclick="printIDCARD(<?php echo $getDocumentVal['id'];?>);">Print</button> <!-- data-dismiss="modal" -->
          <!--<button type="button" class="btn btn-primary"   onclick="printIDCARD(<?php echo $getDocumentVal['id'];?>);">Download</button>-->
        </div>
      </div>
    </div>
  </div>

