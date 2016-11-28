<?php include('header.php') ?>
<div class="container-fluid">
  <section id="contact-maps">
    <div class="row">
      <div class="col-md-12">
        <div class="box-h2">
          <h2>Contact</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="map"></div>
      </div>
    </div>
  </section>
</div>
<section id="contact-form">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p>Et si on discutait de votre projet?</p>
      </div>

    </div>
    <div class="row">

      <div class="contact-form col-md-12">
        <form id="form" action="admin/process_contact_form.php" method="post">
          <div class="form-box flex-column">
            <label for="">Nom*</label>
            <input type="text" name="last-name">
            <label for="">Prénom*</label>
            <input type="text" name="first-name">
            <label for="">E-mail*</label>
            <input type="email" name="email">
            <label for="">Téléphone</label>
            <input type="phone" name="phone">
            <label for="">Message*</label>
            <textarea name="message" rows="8" cols="80"></textarea>
            <input class="button" type="submit" name="" value="valider">
            <p>* champs obligatoires</p>
              <p class="info"></p>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>

<script type="text/javascript">
currentPage = "contact";
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJkivfuZ4l10xSjSYL4t8V4BtrBdjrwc8&callback=initMap">
</script>
<script src="js/maps.js" charset="utf-8"></script>
<script src="js/contact_form.js" charset="utf-8"></script>
<?php include('footer.php') ?>
