<?php
include("../model/class.expert.php");

if ($_SESSION['UR_LOGINID'] != '') {
  $ModelCall->where("user_id", $_SESSION['UR_LOGINID']);
  $ModelCall->where("groc_id", $_POST['pid']);
  $data = $ModelCall->get("tbl_grocery_review");
  if ($ModelCall->count > 0) {
    $likeC = $data[0]['like_count'];
    $unlikeC = $data[0]['unlike_count'];
    $ModelCall->where("groc_id", $_POST['pid']);
    $ModelCall->where("user_id", $_SESSION['UR_LOGINID']);
    if ($_POST['req'] == 'like') {
      $up = array("like_count" => "1", "unlike_count" => "0");
    } else {
      $up = array("unlike_count" => "1", "like_count" => "0");
    }
    $ModelCall->update("tbl_grocery_review", $up);
  } else {
    if ($_POST['req'] == 'like') {
      $data = array(
        "user_id" => $_SESSION['UR_LOGINID'],
        "like_count" => "1",
        "groc_id" => $_POST['pid']
      );
    } else {
      $data = array(
        "user_id" => $_SESSION['UR_LOGINID'],
        "unlike_count" => "1",
        "groc_id" => $_POST['pid']
      );
    }
    $ModelCall->insert("tbl_grocery_review", $data);
  }

  $ModelCall->where("like_count", "1");
  $ModelCall->where("groc_id", $_POST['pid']);
  $ModelCall->get("tbl_grocery_review");
  $like = $ModelCall->count;

  $ModelCall->where("unlike_count", "1");
  $ModelCall->where("groc_id", $_POST['pid']);
  $ModelCall->get("tbl_grocery_review");
  $unlike = $ModelCall->count;


  header('Content-Type: application/json');
  echo json_encode(array("like" => $like, "unlike" => $unlike));
} else {
  echo "login_error";
}
?>