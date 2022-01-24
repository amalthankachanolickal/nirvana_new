<?php include('model/class.expert.php');
include('adminsession_checker.php');
$ModelCall->where("client_id", $getAdminInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDocumentInfo = $ModelCall->get("tbl_survey_results");
$ModelCall->where("status",'Approved');
$ModelCall->where("is_published",'Yes');
$forms=$ModelCall->get('tbl_survey');
$getBlocks= $ModelCall->rawQuery("SELECT * FROM `tbl_block_entry` where status =1 order by id"); 


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo DOMAIN.AdminDirectory;?>assets/img/favicon.png">
<title>Survey Result Dashboard - <?php echo SITENAME;?></title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo DOMAIN.AdminDirectory;?>assets/css/style.css">

<style>
hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
}
</style>
<!--[if lt IE 9]>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/html5shiv.min.js"></script>
			<script src="<?php echo DOMAIN.AdminDirectory;?>assets/js/respond.min.js"></script>
		<![endif]-->
</head>
<body>
<div class="main-wrapper">
  <?php include(includes.'Top_header.php');?>
  <?php include(includes.'side_bar.php');?>
  <div class="page-wrapper">
    <div class="content container-fluid">
      <div class="row">
        <div class="col-xs-4">
          <h4 class="page-title">Survey Result - Dashboard</h4>
        </div>
       </div>

       <div class="row">
        <div class="col-md-12">
        <?php if(count($forms)>0){ 
              foreach($forms as $getDocumentVal){ 
                 $table = "form_response".$getDocumentVal['survey_name'];
                $quesAray = json_decode($getDocumentVal['Questions']); ?>
        <div class="panel panel-table panel-primary">
          <div class="panel-heading"  style="text-align: center;"> <?php echo ucwords(str_replace("_", " ", $getDocumentVal['survey_name']));?></div>
          <div class="panel-body">
          <table class="table table-striped custom-table">
              <thead>
                <tr>
                  <th>Questions </th>
                  <th> # Responses </th>
                  <?php  foreach($getBlocks as $block){   
                    $results[$block['id']]=$ModelCall->rawQuery("SELECT count(*) as total, AVG(q1) as ans1, AVG(q2) as ans2, AVG(q3) as ans3, AVG(q4) as ans4, AVG(q5) as ans5, AVG(q6) as ans6, BlockNo FROM ".$table." where BlockNo=". $block['id']." group by BlockNo order by BlockNo");?>
                    <th> <?php echo $block['block_code'];?> </th>
                  <?php }?>
                  </tr>
                </thead>
                <tbody>
                <?php 
                 $i=1;
                
                foreach($quesAray as $ques){ 
                        if($ques->type=='Rating'){
                         $col= 'q'. $i;
                         $ans= 'ans'. $i;
                         $i++;
                          $total=$ModelCall->rawQuery("SELECT count(*) as total FROM ".$table." where ".  $col." !=''");
                         
                          ?>
                        <tr>
                        <td><?php echo $ques->q;?></td>
                        <td><?php echo $total[0]['total'];?></td>
                        <td><?php 
                        if($results[1][0][$ans]!=''){
                        echo $results[1][0][$ans] ;
                        }else {
                        echo '0';}?>
                        </td>
                        <td><?php 
                        if($results[2][0][$ans]!=''){
                        echo $results[2][0][$ans] ;
                        }else {
                        echo '0';}?></td>
                        <td><?php 
                        if($results[3][0][$ans]!=''){
                        echo $results[3][0][$ans] ;
                        }else {
                        echo '0';}?></td>
                        <td><?php 
                        if($results[4][0][$ans]!=''){
                        echo $results[4][0][$ans] ;
                        }else {
                        echo '0';}?></td>
                        <td><?php 
                        if($results[5][0][$ans]!=''){
                        echo $results[5][0][$ans] ;
                        }else {
                        echo '0';}?></td>
                        </tr>
                    <?php }
                    } ?>
                </tbody>
           </table>
          </div>
        </div>
              <?php } 
            }?>
        </div>
        </div>
    

        <div class="row">
        <div class="col-md-12">
        <?php if(count($forms)>0){ 
              foreach($forms as $getDocumentVal){ 
                 $table = "form_response".$getDocumentVal['survey_name'];
                 $otherresult = $ModelCall->rawQuery("SELECT Suggestions, features, BlockNo, date(added_date) as dateadded FROM ".$table." where Suggestions!='' or features !=''"); ?>
        <div class="panel panel-table panel-primary">
          <div class="panel-heading"  style="text-align: center;">Suggestions </div>
          <div class="panel-body">
          <table class="table table-striped custom-table">
              <thead>
                <tr>
                <th width="10%">Date</th>
                <th width="10%">Block</th>
                <th width="80%">Suggestion</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
            foreach($otherresult as $getVal){
                switch($getVal['BlockNo']){
                    Case 1: 
                    $getVal['BlockNo']= "AG";
                      break;
                   Case 2: 
                      $getVal['BlockNo']= "BC";
                      break;
                  Case 3: 
                      $getVal['BlockNo']= "CC";
                       break;
                       Case 4: 
                      $getVal['BlockNo']= "DC";
                       break;
                       Case 5: 
                      $getVal['BlockNo']= "ES";
                       break;
                } ?>
             <tr>
                <td><?php echo date("d-M-Y",strtotime($getVal['dateadded']));?></td>
                <td><?php echo  $getVal['BlockNo'];?></td>
                <td><?php echo $getVal['Suggestions'];?></td>
                <!-- <td><?php echo $getVal['features'];?></td> -->
                </tr>
            <?php }?>
                </tbody>
           </table>
          </div>
        </div>
              <?php } 
            }?>
        </div>
        </div>

    
      <div class="row">
        <div class="col-md-12">
         <?php if($_REQUEST['actionResult']!='') { include('messageDisplay.php'); }?>
        
         <?php 
        if(count($forms)>0){ 
            foreach($forms as $getDocumentVal){ 
              $table = "form_response".$getDocumentVal['survey_name'];
                $quesAray = json_decode($getDocumentVal['Questions']);

                $results=$ModelCall->rawQuery("SELECT count(*) as total, AVG(q1) as ans1, AVG(q2) as ans2, AVG(q3) as ans3, AVG(q4) as ans4, AVG(q5) as ans5, AVG(q6) as ans6, BlockNo FROM ".$table." group by BlockNo order by BlockNo");

                $otherresult = $ModelCall->rawQuery("SELECT Suggestions, features, BlockNo, date(added_date) as dateadded FROM ".$table." where Suggestions!='' or features !=''");
           //  echo $quesAray[0]->type;?>   
        <div class="panel panel-table panel-primary">
            <div class="panel-heading" style="text-align: center;">
                <?php echo ucwords(str_replace("_", " ", $getDocumentVal['survey_name']));?>
                </div>
            <div class="panel-body">
             <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                  <th>Block - Avg Ratings </th>
                  <th> # of Responses </th>
                 <?php foreach($quesAray as $ques){ 
                        if($ques->type=='Rating'){?>
                        <th><?php echo $ques->q;?></th>
                    <?php }
                    } ?>
                  
                </tr>
              </thead>
              <tbody>
              <?php  $responseTotal =0; foreach($results as $answers){ 
                $responseTotal = $responseTotal+$answers['total'];
                  switch($answers['BlockNo']){
                      Case 1: 
                      $answers['BlockNo']= "AG";
                        break;
                     Case 2: 
                        $answers['BlockNo']= "BC";
                        break;
                    Case 3: 
                        $answers['BlockNo']= "CC";
                         break;
                         Case 4: 
                        $answers['BlockNo']= "DC";
                         break;
                         Case 5: 
                        $answers['BlockNo']= "ES";
                         break;
                  } ?>
              <tr>
              <td><?php echo $answers['BlockNo'];?></td>
              <td><?php echo $answers['total'];?></td>
              <td><?php echo $answers['ans1'];?></td>
              <td><?php echo $answers['ans2'];?></td>
              <td><?php echo $answers['ans3'];?></td>
              <td><?php echo $answers['ans4'];?></td>
              <td><?php echo $answers['ans5'];?></td>
              <td><?php echo $answers['ans6'];?></td>
              </tr>
              <?php }?>
              <tr><td>Total:</td>
              <td><?php echo $responseTotal;?></td></tr>
              </tbody>
            
              </table>

              <hr>
             
             <?php  if(count($otherresult)>0){  ?>
              <table class="table table-striped custom-table datatable">
              <thead>
                <tr>
                <th width="10%">Date</th>
                <th width="10%">Block</th>
                <th width="80%">Suggestion</th>
                <!-- <th width="40%">Additional Website Feature Suggestions</th> -->
                </tr>
                </thead>
                <tbody>
                <?php 
            foreach($otherresult as $getVal){
                switch($getVal['BlockNo']){
                    Case 1: 
                    $getVal['BlockNo']= "AG";
                      break;
                   Case 2: 
                      $getVal['BlockNo']= "BC";
                      break;
                  Case 3: 
                      $getVal['BlockNo']= "CC";
                       break;
                       Case 4: 
                      $getVal['BlockNo']= "DC";
                       break;
                       Case 5: 
                      $getVal['BlockNo']= "ES";
                       break;
                } ?>
             <tr>
                <td><?php echo date("d-M-Y",strtotime($getVal['dateadded']));?></td>
                <td><?php echo  $getVal['BlockNo'];?></td>
                <td><?php echo $getVal['Suggestions'];?></td>
                <!-- <td><?php echo $getVal['features'];?></td> -->
                </tr>
            <?php }?></tbody>
              </table>
              <?php }?>
            </div>
            </div>
        </div>
        <?php } 
    } ?>  
    </div>
  
        </div>
      </div>
    </div>
  </div>

</div>
<div class="sidebar-overlay" data-reff="#sidebar"></div>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/jquery.slimscroll.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="<?php echo DOMAIN.AdminDirectory;?>assets/js/app.js"></script>
</body>
</html>
