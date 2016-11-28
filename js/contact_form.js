
var formSelector = "#form";
var target = "";

var form = document.querySelector(formSelector);
var target = form.action;
form.addEventListener('submit', function(event){
  event.preventDefault();
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(request.responseText);
      var out = JSON.parse(request.responseText);
      // console.log(out);
      if (out.result) {
        document.querySelector('.info').style.color = "#3aaa35";
        document.querySelector('.info').innerHTML = "Votre demande a bien été transmise, merci!";
        setTimeout(function(){
          document.querySelector('.info').innerHTML = "";
          form.reset();
        }, 3000);

      }
      else {
        document.querySelector('.info').style.color = "red";
        document.querySelector('.info').innerHTML = out.info;
      }
    }
    else {

    }
  }
  request.open("POST", target);
  request.send(new FormData(form));
});
