var slider = document.querySelector('.kd-slider');
var fullscreen = document.querySelector('.kd-slider-fullscreen-btn');
var media = document.querySelectorAll('.kd-slider ul li');
// var stop = document.querySelector('.kd-slider-play-stop-btn');
var next = document.querySelector('.kd-slider-next-btn');
var preview = document.querySelector('.kd-slider-preview-btn');
var videoAll =document.querySelectorAll('.diap');
var current = 0;
var old = 0;
var timeouts = [];

var fullscreenDiapBtn = document.querySelector('.kd-slider-fullscreen-btn');
var playStopDiapBtn = document.querySelector('.kd-slider-play-stop-btn');

var headerTitle = document.querySelector('.kd-header-slider span');

var container = document.querySelector('.kd-slider-container');

var diaporamaConfig = [
  {"autoPlay":false}, // défilement automatique
  {"autoEnd":true}, // stope ou quitte le diaporama à la fin de la série
  {"delay":3} // durée d'affichage des élements en secondes
];

//initialisation du diaporama
for (var i = 0; i < media.length; i++) {
  if (i === current) {
    media[i].style.opacity = 1;
    headerTitle.innerHTML=media[i].getAttribute("data-title");
  }
  else {
    media[i].style.opacity = 0;
  }
}
// slider.style.height = slider.clientWidth /1.777+"px";


// //bouton plein écran
fullscreenDiapBtn.addEventListener('click', function(){
  switchFullscreen(container);
});

//bouton défilement auto
playStopDiapBtn.addEventListener('click', function(){
  if (!diaporamaConfig[0].autoPlay) {
    diaporamaConfig[0].autoPlay = true;
    clearTime();
    checkMedia();
    playStopDiapBtn.style.backgroundImage = "url('vendor/kodaizen_slider/img/ic_stop.svg')";
  }
  else {
    clearTime();
    diaporamaConfig[0].autoPlay = false;
    playStopDiapBtn.style.backgroundImage = "url('vendor/kodaizen_slider/img/ic_play_arrow.svg')";
  }
});

// bouton media suivant
next.addEventListener('click', function(){
  clearTime();
  slideRight();
  checkMedia();
});

//bouton média précédent
preview.addEventListener('click', function(){
  clearTime();
  slideLeft();
  checkMedia();
});

//touche flèches
document.addEventListener("keydown", function(e) {
  clearTime();
  if (e.keyCode == 39) {
    slideRight();
    checkMedia();
  }
  if (e.keyCode == 37) {
    slideLeft();
    checkMedia();
  }
}, false);

//FONCTIONS-----------------------------------------------------------------------

//initialisation du diaporama
function initiate() {
  current = 0;
  for (var i = 0; i < media.length; i++) {
    if (i === current) {
      media[i].style.opacity = 1;
      headerTitle.innerHTML=media[i].getAttribute("data-title");
    }
    else {
      media[i].style.opacity = 0;
    }
  }
  clearTime();
  diaporamaConfig[0].autoPlay = false;
  playStopDiapBtn.style.backgroundImage = "url('vendor/kodaizen_slider/img/ic_play_arrow.svg')";
}
function clearTime(){
  for (var i=0; i<timeouts.length; i++) {
    clearTimeout(timeouts[i]);
  }
}

//vérifie le média et enclenche le défilement auto
function checkMedia() {
  var currentMedia = media[current];
  var elem = currentMedia.firstChild;
  // console.log(elem.nodeName);
  if (elem.nodeName === "VIDEO") {
    clearTime();
    // console.log('media video');
    elem.addEventListener('ended', function(){
      if (current >= media.length-1 && diaporamaConfig[1].autoEnd) {
        clearTime();
      }
      else {
        clearTime();
        if (diaporamaConfig[0].autoPlay) {
          autoAdvance();
        }
      }
    });
  }
  else {  // media = image
    if (current >= media.length-1) {
      clearTime();
    }
    else {
      if (diaporamaConfig[0].autoPlay) {
        autoAdvance();
      }
    }
  }
}

// média suivant
function slideRight() {
  stopVideo();
  old = current;
  if (current === media.length -1) {
    current = 0;
  }
  else {
    current = current + 1;
  }
  setMedia();
}

// média précédent
function slideLeft() {
  stopVideo();
  old = current;
  if (current === 0) {
    current = media.length -1;
  }
  else {
    current = current - 1;
  }
  setMedia();
}

//stope la lecture en cours des vidéo
function stopVideo() {
  for (var i = 0; i < videoAll.length; i++) {
    if (videoAll[i].currentTime > 0) {
      videoAll[i].pause();
      videoAll[i].currentTime = 0;
    }
  }
}

//affiche et masque les médias en fonctions du média courant
function setMedia() {
  if (old<current) {
    console.log('défilement sur la droite');
  }
  else {
    console.log('défilement sur la gauche');
  }
  for (var i = 0; i < media.length; i++) {
    if (i === old) {

      media[i].style.opacity = 0;
      media[i].style.zIndex = 100;
    }
    if (i === current) {
      media[i].style.opacity = 1;
      media[i].style.zIndex = 1000;
      headerTitle.innerHTML=media[i].getAttribute("data-title");
      autoplayVideo(media[i]);
    }

  }
}

// slide automatique
function autoAdvance() {
  clearTime();
  timeouts.push(setTimeout(function(){
    if (current < media.length-1) {
      slideRight();
    }
    var currentMedia = media[current];
    var elem = currentMedia.firstChild;
    if (elem.nodeName === "VIDEO") {  //test si media = video
      elem.addEventListener('ended', function(){
        if (current >= media.length-1) {
          clearTime();
          console.log('diaporama terminé par une vidéo');
          // initiate();
        }
        else {
          clearTime();
          autoAdvance();
        }
      });
    }
    else {  // media = image
      if (current >= media.length-1) {
        clearTime();
        console.log('diaporama terminé');
        setTimeout(function(){
          initiate();
        }, diaporamaConfig[2].delay*1000);

      }
      else {
        autoAdvance();
      }
    }
  }, diaporamaConfig[2].delay*1000));
}

//lancement automatique des vidéo
function autoplayVideo(media){
  var elem = media.firstChild;
  if (elem.nodeName === "VIDEO") {
    elem.play();
  }
}

//enclenche ou quitte le plein écran
function switchFullscreen(elem) {
  //console.log('fullscreen');
  if (!document.mozFullScreen && !document.webkitFullscreenElement) {
    if (elem.mozRequestFullScreen) {
      //console.log('moz');
      elem.mozRequestFullScreen();
    } else {
      //console.log('webkit');
      elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  }
  else {
    if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    }
    if (document.webkitFullscreenElement) {
      document.webkitCancelFullScreen();
    }
  }
}

//quitte le plein écran
function quitFullscreen(elem) {
  if (document.mozCancelFullScreen) {
    document.mozCancelFullScreen();
  }
  else if (document.webkitFullscreenElement) {
    document.webkitCancelFullScreen();
  }
}
