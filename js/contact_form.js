

var formSelector = "#form";
var target = "";


var form = document.querySelector(formSelector);
var target = form.action;
form.addEventListener('submit', function(event){
  event.preventDefault();
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //envoie réussi
      //retour texte: request.responseText
      console.log(request.responseText);
    }
    else {
      //échec envoie

    }
  }
  request.open("POST", target);
  request.send(new FormData(form));
});
