<?php 
error_reporting();
include("../model/class.expert.php"); ?>
<?php
if($_REQUEST['response']){
$table_name='form_response'.$_REQUEST['response'];
$result=$ModelCall->get($table_name);
//echo $result;
//echo($result[0]);
$ModelCall->where('survey_name',$_REQUEST['response']);
$resulthead=$ModelCall->get('tbl_survey');
$csv='id,';
//echo $result[0];
$mykey=array_keys(json_decode($resulthead[0]['Questions']));
//$mkey=array_keys($mykey);
$qarray= $resulthead[0]['Questions'];
$final= json_decode($qarray);
$size1=sizeof($final);
for($i=0;$i<$size1;$i++){
$csv.=$final[$i]->q;
if($size1-$i>1)
$csv.=',';
}
$csv.=",Suggestions,Featuers,Name,House Number,Block No,Form Name";
$csv.="\n";
$size2=sizeof($result);
for($j=0;$j<$size2;$j++){
$l = 0;
$len = sizeof($result[$j]);
foreach($result[$j] as $value){
$l++;
$value= str_replace(",",". ",$value);
$data= $value;
$csv.=$data;
if($len-$l>1)
$csv.=",";
}
$csv.="\n";
}
echo $csv;
}
?>

