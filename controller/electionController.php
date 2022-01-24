<?php include("../model/class.expert.php"); 
require('../mailin-lib/Mailin.php');
include('PHPMailer-master/PHPMailerAutoload.php');
error_reporting("E_ALL");
//print_r($_POST);
 //print_r($_FILES);
//exit(0);

if(($_POST['ActionCall']=="SaveVote"))
{
 $ModelCall->where("candidateid",$_POST['candidateid']);
 $ModelCall->where("voterid",$_POST['voterid']);
 $getInfo = $ModelCall->get("tbl_candidates_votes");
 
 
$dataU = array(
	'candidateid' => $_POST['candidateid'],
	'voterid' => $_POST['voterid'],
	'like_vote' => $_POST['like_vote'],
	'dislike' => $_POST['dislike']
	);
	
if( count($getInfo)>0){
     $ModelCall->where("candidateid",$_POST['candidateid']);
     $ModelCall->where("voterid",$_POST['voterid']);
     $result =  $ModelCall->update('tbl_candidates_votes', $dataU);
     $alreadyVoted=1;
}else{
$result =  $ModelCall->insert('tbl_candidates_votes', $dataU);
$alreadyVoted=0;
}
    if($alreadyVoted==1){
        if($_POST['like_vote']==1 && $getInfo[0]['like_vote']==1){
             echo "-1";
        } else if($_POST['dislike']==1 && $getInfo[0]['dislike']==1){
          echo "-1";
        } else if($_POST['like_vote']==1 && $getInfo[0]['like_vote']==0){
               echo "2";
        } else if($_POST['dislike']==1 && $getInfo[0]['dislike']==0){
              echo "3";
        }
       
    }else{
        
       if($_POST['like_vote']==1){
           echo "1";
           
       }
        if($_POST['dislike']==1){
           echo "0";
           
       }
    }
}



?>