<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="<?php if(basename($_SERVER['PHP_SELF'])=="index.php"){?>active<?php } ?>"><a href="index.php"><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/dashboard.png" style="width: 32px;height: 32px;" /><span> Dashboard</span>
          <!--<span class="menu-arrow"></span>-->
          </a></li>
          
            <?php if($getAdminSubInfo[0]['user_management']==1){ ?>
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/user.png" style="width: 32px;height: 32px;" /><span> Users  </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="users_management.php">User Management</a></li>
            <li><a href="send_username_password.php">Send Username Password</a></li>
	 <li><a href="membership_application_status.php">Membership Applications</a></li>

            <!-- <li><a href="car_stickers_management.php">Car Sticker Management</a></li> -->
          </ul>
        </li>
        <?php } ?>
            <?php if($getAdminSubInfo[0]['billing_management']==1){ ?>
        
         <li><a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/document.png" style="width: 32px;height: 32px;" /><span> Billing </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="billing_management_new.php">Add/Manage Bills</a></li>
            <li><a href="trigger-generate-pdf-for-cambills.php" target="_blank">Genrate Cam Bill PDFs</a></li>
             <li><a href="send_cam_bills_mailsandsms.php" >Trigger Cam Email/ SMS</a></li>
             <!--<li><a href="billing_management_report.php">Payment Reports</a></li>-->
             <li><a href="billing_upload_records.php">Payment Records</a></li>
            
          </ul>
        </li>
        <?php } ?>
          
          
        <?php if($getAdminSubInfo[0]['team_management']==1){ ?>
            <?php $getNotificationFlag= $ModelCall->rawQuery("SELECT * FROM `tbl_feature_switch` where feature = 'CUSTOM_NOTIFICATION' and active = 'Y'"); 
            if(count($getNotificationFlag)==1){?>
             <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Mailer </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled" style="display: none;">
                  <li><a href="send-custom-notification.php">Send Custom Notification</a></li>
                    <li><a href="mails_report.php"> Custom Mail Report</a></li>
                    <li><a href="message_report.php"> Custom Message Report</a></li>
              <!--<li><a href="send_emails.php">Send Mail</a></li>-->
              <!--<li><a href="send_emails_test.php">Test All Mails</a></li>-->
              </ul>
            </li>
            <?php }else { ?>
                <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Mailer </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled" style="display: none;">
                  <li><a href="send-custom-emails.php">Send Custom Mails</a></li>
                    <li><a href="mails_report.php"> Custom Mail Report</a></li>
              <!--<li><a href="send_emails.php">Send Mail</a></li>-->
              <!--<li><a href="send_emails_test.php">Test All Mails</a></li>-->
              </ul>
            </li>
            <?php } ?>    
        <?php } ?> 
        
        <!--    <?php if($getAdminSubInfo[0]['team_management']==1){ ?>-->
        
        <!-- <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Mailer </span> <span class="menu-arrow"></span></a>-->
        <!--  <ul class="list-unstyled" style="display: none;">-->
        <!--      <li><a href="send-custom-emails.php">Send Custom Mail</a></li>-->
        <!--        <li><a href="mails_report.php"> Custom Mail Report</a></li>-->
          <!--<li><a href="send_emails.php">Send Mail</a></li>-->
          <!--<li><a href="send_emails_test.php">Test All Mails</a></li>-->
        <!--  </ul>-->
        <!--</li>-->
        <!--<?php } ?>-->
          
            <?php if($getAdminSubInfo[0]['document_management']==1){ ?>
        <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/document.png" style="width: 32px;height: 32px;" /><span> Documents </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="document_management.php">Add/Manage Document</a></li>
            <li><a href="covid_document_management.php">Covid Documents</a></li>
            <li><a href="grocery_management.php">Grocery Documents</a></li>
            <li><a href="doctors_management.php">Doctors List Documents</a></li>
          </ul>
        </li>  
        <?php } ?>
         
         
          
          <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/document.png" style="width: 32px;height: 32px;" /><span> Covid Vaccine List </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="covid_vaccine_list.php">Covid Vaccine List</a></li>
          </ul>
        </li>
        
          <?php if($getAdminSubInfo[0]['notice_board']==1){ ?>
          <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/notice_bord.png" style="width: 32px;height: 32px;" /><span> Notice Board </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="notice_post_management.php">Add/Manage Notices</a></li>
          </ul>
        </li>
        <?php } ?>
          <?php if($getAdminSubInfo[0]['home_slider']==1){ ?>
        <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/home_slide.png" style="width: 32px;height: 32px;" /><span> Home Slider </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="home_flash.php">Add/Manage Home Slider</a></li>
          </ul>
        </li>
        <?php } ?>
          <?php if($getAdminSubInfo[0]['blocks_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/block.png" style="width: 32px;height: 32px;" /><span> Blocks </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="block_management.php">Add/Manage Block</a></li>
          </ul>
        </li>
        <?php } ?>
          <?php if($getAdminSubInfo[0]['event_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/event.png" style="width: 32px;height: 32px;" /><span> Events </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="event_management.php">Add/Manage Events</a></li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if($getAdminSubInfo[0]['newspaper_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/news.jpg" style="width: 32px;height: 32px;" /><span> Newpapers </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="newspaper_management.php">Add/Manage Newspapers</a></li>
             <li><a href="newspaper_bills_managements.php">Add Newspapers Bills</a></li>
          </ul>
        </li>
        <?php } ?>
        
    
          <?php if($getAdminSubInfo[0]['amenities_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/amenties.png" style="width: 32px;height: 32px;" /><span> Amenities </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="amenities_management.php">Add/Manage Amenities</a></li>
          </ul>
        </li>
        <?php } ?>
          <?php if($getAdminSubInfo[0]['service_bazaar_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/bazzar.png" style="width: 32px;height: 32px;" /><span> Bazzar </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
          <li><a href="service_category_management.php">Add/Manage Category</a></li>
          <li><a href="service_subcategory_management.php">Add/Manage Sub Category</a></li>
            <li><a href="service_bazzar_management.php">Add/Manage Bazzar</a></li>
          </ul>
        </li>
        <?php } ?>
        
        <?php if($getAdminSubInfo[0]['highlight_event']==1){ ?>
           <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/Report.png" style="width: 32px;height: 32px;" /><span> Highlight Event </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="highlight_settings.php">Highlight Event</a></li>
          </ul>
        </li>
        <?php } ?>
        
       <?php /*?> 
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/discussion_post.png" style="width: 32px;height: 32px;" /><span> Discussion Post </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="discussion_post_management.php">Discussion Post</a></li>
          </ul>
        </li><?php */?>
        
          <?php if($getAdminSubInfo[0]['team_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Teams </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="team_management.php">Add/Manage Team</a></li>
          </ul>
        </li>
        <?php } ?>
        
        
        <?php if($getAdminSubInfo[0]['team_management']==1){ ?>
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Ec Management  </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="EC_management.php">Add/Manage EC</a></li>
        
          </ul>
        </li>
        <?php } ?>
        
          <?php if($getAdminSubInfo[0]['cms_management']==1){ ?>  
        
        <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/cms.png" style="width: 32px;height: 32px;" /><span> CMS </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="aboutus_content.php">About Us</a></li>
            <li><a href="discussion_content.php">Discussion Forum</a></li>
            <li><a href="privacy_content.php">Privacy & Policy</a></li>
            <li><a href="terms_content.php">Terms & Conditions</a></li>
            <li><a href="cookies_policy_content.php">Cookies Policy</a></li>
             <li><a href="contribute_content.php">Contribute</a></li>
             <li><a href="advertise_content.php">Advertise</a></li>
             <li><a href="ad_tnc.php">Ad TnC</a></li>
          </ul>
        </li>  
        <?php } ?>
          <?php if($getAdminSubInfo[0]['google_ad_management']==1){ ?>
        
        
         <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/google_ad.png" style="width: 32px;height: 32px;" /><span> Advertisement </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
           <!-- <li><a href="google_ad_management.php">Add/Manage Google Ad</a></li>-->
             <li><a href="ads_management_management.php">Add/Manage Banner Ad</a></li>
             <li><a href="emailer_ad_management.php">Add/Manage Emailer Ad</a></li>
          </ul>
        </li>  
        
        
        <?php } ?>
         <?php if($getAdminSubInfo[0]['survey_management']==1){ ?>
        
        <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/amenties.png" style="width: 32px;height: 32px;" /><span> Surveys </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="Survey_forms_management.php">Add/Manage Surveys</a></li>
            <li><a href="survey_results_management.php">Add/Manage Surveys Results</a></li>
            <li><a href="survey-result-dashboard.php">Surveys Dashboard</a></li>
          </ul>
        </li>
         <?php } ?>
          <?php if($getAdminSubInfo[0]['setting_management']==1){ ?>
        
        <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/Setting.png" style="width: 32px;height: 32px;" /><span> Settings </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="settings.php">Settings</a></li>
          </ul>
        </li> 
        <?php } ?>
          <?php if($getAdminSubInfo[0]['vendor_admin_management']==1){ ?> 
        
      
      <li class="submenu <?php if(basename($_SERVER['PHP_SELF'])=="roles-permissions.php"){?>active<?php } ?>"> <a href="#" class="<?php if(basename($_SERVER['PHP_SELF'])=="roles-permissions.php"){?>subdrop<?php } ?>"><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/administrator.png" style="width: 32px;height: 32px;" /><span> Vendor Admin </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled" <?php if(basename($_SERVER['PHP_SELF'])=="roles-permissions.php"){?>style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>>
          <li><a href="roles-permissions.php"> Add Sub Vendor </a></li>
          <li><a href="sendAdminData.php"> Send Vendor Details </a></li>
          <li><a href="roles-permissions.php#sms"> Manage Sub Vendor </a></li>
          <li><a href="rwa_membership.php"> RWA Membership </a></li>
        </ul>
      </li>
      <?php } ?>
          <?php if($getAdminSubInfo[0]['advertise_request_management']==1){ ?>
      
      <li> <a href="#" class=""><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/advertisement.png" style="width: 32px;height: 32px;" /><span> Advertise Request </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" style="display: none;">
            <li><a href="advertise_request_management.php">Advertise Request</a></li>
          </ul>
        </li>  
        <?php } ?>
      <li class="<?php if(basename($_SERVER['PHP_SELF'])=="logout.php"){?>active<?php } ?>"><a href="index.php"><img src="<?php echo DOMAIN.AdminDirectory;?>allicons/logout.png" style="width: 32px;height: 32px;" /><span> Logout</span>
        <!--<span class="menu-arrow"></span>-->
        </a></li>
      </ul>
    </div>
  </div>
</div>
