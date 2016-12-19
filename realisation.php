<?php
$part = $_GET['part'];
$page_title = "Réalisations";
 include('header.php') ?>

<?php include('realisations_part/'.$part.'.php') ?>

<script src="vendor/kodaizen_slider/kd-slider.js" charset="utf-8"></script>

<script type="text/javascript">
  currentPage = "realisation";

  //réglage de la hauteur du slider format 16/9


// var slider = document.querySelector('.kd-slider-container');
// slider.style.height = slider.clientWidth /1.777+"px";


</script>
<?php include('footer.php') ?>
