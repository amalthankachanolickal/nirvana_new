<?php include('model/class.expert.php');

?>
<script>
console.log(screen.width);
    if (screen.width < 960) {
   window.location.replace("<?php echo SITE_URL;?>bills_mobile.php");
}

// In index1.html
if (screen.width >= 960) {
  window.location.replace("<?php echo SITE_URL;?>bills_desktop.php");
}
</script> 
