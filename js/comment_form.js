//(function(){ définition de l'espace global


var commentFormBtn = document.querySelector('#comment-form input[type="submit"]');
var showCommentFormBtn = document.querySelector("#show-comment-form");
var commentForm = document.querySelector('#comment-form');
var target = commentForm.action;

showCommentFormBtn.addEventListener('click', function(event){
  event.preventDefault();
  commentForm.classList.toggle('show-comment-form');
});

commentForm.addEventListener('submit', function(event){
  event.preventDefault();
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(request.responseText);
      var out = JSON.parse(request.responseText);
      // console.log(out);
      if (out.result) {
        document.querySelector('.info').style.color = "#3aaa35";
        document.querySelector('.info').innerHTML = "Votre témoignage a bien été transmis, merci!";
        setTimeout(function(){
          document.querySelector('.info').innerHTML = "";
          commentForm.reset();
          commentForm.classList.toggle('show-comment-form');

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
  request.send(new FormData(commentForm));

});


//})();  fin de l'espace global
