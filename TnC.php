<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");   
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Nirvana Country</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo SITE_URL;?>css/responsive.css">




</head>
<style>
.sign_in_sec form input, .sign_in_sec form select
{
padding: 0 15px 0 10px;
}
.select1 {
	color:#b3a7da !important;
	-webkit-appearance: menulist;
	-moz-appearance: menulist;
}

input:required:focus {
  border: 1px solid red;
  outline: none;
}

</style>

<body class="sign-in">
<div class="wrapper">
  <div class="sign-in-page">
    <div class="signin-popup">
      <div class="signin-pop ">
        <div class="border-left">
          <div class="row" style="margin: 0;">
<!--        <div class="col-lg-6">  
              <div class="cmp-info text-center">
                <div class="cm-logo col-lg-12"> <a  href="<?php echo SITE_URL;?>"><img src="<?php echo SITE_URL;?>nirwana-img/logo-01.png" alt=""> </a></div>
                <!--cm-logo end-->
<!--            <div class="clearfix"></div>
                <div class="sign-info-content col-lg-12">
                  <h3 class="sign-h3">Welcome to Nirvana Country</h3>
                  <p class="sign-p"><?php echo $getDiscussionInfo[0]['content_data']; ?></p>
                </div>
                <div class="col-lg-12"> <img src="<?php echo SITE_URL;?>nirwana-img/login_bg.png" alt="" class="sign-bottom-img"> </div>
              </div>
              <!--cmp-info end-->
<!--        </div> -->
            <div class="col-lg-6">
              <div class="login-sec">
          
               <?php if($_REQUEST['actionResult']=="regsuccess"){?>
                 
                        
			   <?php }  else {?>
              <ul class="sign-control">
                 <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                  <li><a href="<?php echo SITE_URL;?>advertisement.php" style="background-color: #37a000;color: #fff;" title="">Back To Advertisement</a></li>
                </ul>
                
               <div class="sign_in_sec" style="display:block;">
                    
                       
                    <form method="post" enctype="multipart/form-data" action="<?php echo SITE_URL;?>CreateaccountAccessCallFuct" onSubmit="return validateform();">
                   
                      <div class="row">
                      <div class="col-lg-12 no-pdd">
                          <div class="sn-field">
                              
                            <!--  <p><strong>Terms and Conditions</strong></p>-->

<p>
<?php
echo $getCMSAdvertiseInfo[0][content_data];
?>
</p>
          
                  </div>
               </div> 
                <?php } ?>
              </div>
              <!--login-sec end-->
              <ul class="sign-control">
                 <!--<li><a href="<?php echo SITE_URL;?>login_signup.php" title="" >Sign in</a></li> -->
                  <li><a href="<?php echo SITE_URL;?>" style="background-color: #37a000;color: #fff;" title="">Back To Home</a></li>
                </ul>
            </div>
          </div>
        </div>
      </div>
      <!--signin-pop end-->
    </div>
    <!--signin-popup end-->
    <div class="footy-sec">
      <div class="container">
        <ul style="margin-top:0;">
        <!--  <li><a href="" title="" data-toggle="modal" data-target="#exampleModal">Help Center</a></li>-->
          
        </ul>
        <p>Copyright &copy; 2019<a href="http://innovatuslimited.com/" target="_blank" style="color:#37a000;"> Innovatus Technologies Pvt. Ltd.</a> All rights reserved.</p>
      </div>
    </div>
    <!--footy-sec end-->
  </div>
  <!--sign-in-page end-->
</div>
<!--theme-layout end-->
<script src="<?php echo SITE_URL;?>assets/js/jquery.min.js"></script>
<script src="<?php echo SITE_URL;?>assets/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="<?php echo SITE_URL;?>js/forscript.js"></script>-->


</body>
</html>


<div class="modal fade" id="advertise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Advertise with us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center"><?php echo $getCMSAdvertiseInfo[0]['content_data'];?></p>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="margin: 130px auto;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Help Center</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <p class="text-center" style="font-size:17px;">Email to<span style="color:#000099;">Corporate@innovatuslimited.com</span></p>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">function add_chatinline(){var hccid=70940255;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
<script type="text/javascript">
function getBlockHouseNo(str)
{
   if(str=="")
      alert("Please select any block");
	else
     var ajx;  // The variable that makes Ajax possible!
	
	if(window.XMLHttpRequest)
	ajx=new XMLHttpRequest();
	ajx.onreadystatechange = function()
	{

		if(ajx.readyState == 4)
		{
		//alert(ajx.responseText);	
                document.getElementById("house_number_id").innerHTML= ajx.responseText;
		}
	}
	ajx.open("GET", "<?php echo SITE_URL;?>ajax-lib/getBlockHouseNumber.php?block_id="+str);
	ajx.send(); 

}

</script>