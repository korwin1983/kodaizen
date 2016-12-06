<?php include('header.php') ?>
<div class="container">
  <section id="realisations">
    <div class="row">
      <div class="col-md-12">
        <div class="box-h2">
          <h2>Réalisations</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <div class="realisation-top">
          <span class="realisation-title">maison pour la science</span>
          <div class="more"></div>
        </div>
        <article id="mps">
          <div class="content">
            <p>
              Développement d'une vidéo interactive, de diaporamas et d'un quizz<br>
              Développement d'une interface d'administration pour les diaporamas
            </p>
            <a href="realisation.php?part=mps" class="button">en savoir plus</a>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <div class="realisation-top">
          <span class="realisation-title">Global Business</span>
          <div class="more"></div>
        </div>
        <article id="global">
          <div class="content">
            <p>
              Refontes sur mesure de pages sur un site WordPress.<br>
              Développement d'un module newsletter connecté au CRM Zoho.
            </p>
            <a href="" class="button">en savoir plus</a>
          </div>
        </article>
      </div>
      <div class="col-md-4">
        <div class="realisation-top">
          <span class="realisation-title">shop on you</span>
          <div class="more"></div>
        </div>
        <article id="soy">
          <div class="content">
            <!-- <strong>maison Pour La Science</strong> -->
            <p>
              Développement d'une vidéo interactive, de diaporamas et d'un quizz<br>
              Développement d'une interface d'administration pour les diaporamas
            </p>
            <a href="" class="button">en savoir plus</a>
          </div>
        </article>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
currentPage = "realisations";
var moreBtn = document.querySelectorAll('.more');
for (var i = 0; i < moreBtn.length; i++) {
  moreBtn[i].addEventListener('click', function(){
    var top = this.parentElement;
    var article = top.nextElementSibling;
    article.lastElementChild.classList.toggle('show-content');
  }, false);
}
</script>


<?php include('footer.php') ?>
