var timeouts = [];




//slider témoignages------------------------------------------------------------
$(document).ready(function(){
	$('.testimonials-slider').slick({
		autoplay: true
	});
	// alert('Site en cours de construction.');
});


//menu mobile-------------------------------------------------------------------
document.querySelector('#bouton-menu-mobile').addEventListener('click', function(){
	document.querySelector('.menu').style.right = 0;
	document.querySelector('#filtre-menu-mobile').style.display = "block";
});
document.querySelector('#fermeture-menu-mobile').addEventListener('click', function(){
	document.querySelector('.menu').style.right = '-200px';
	setTimeout(function(){
		document.querySelector('#filtre-menu-mobile').style.display = "none";
	}, 300);
});

//bouton remonter---------------------------------------------------------------
var upBtn = document.querySelector('.bouton-remonter');
upBtn.addEventListener('click', function(){
	smoothScroll('.top',1000);
});

window.addEventListener('scroll', function(){
	if (window.pageYOffset>100) {
		upBtn.classList.add('show');
		timeouts.push(setTimeout(function(){
			upBtn.classList.remove('show');
			clearTimeouts(timeouts);
		}, 4000));
	}
});

//item courant menu------------------------------------------------------------
var menuLink = document.querySelectorAll('.menu ul li a');
for (var i = 0; i < menuLink.length; i++) {
	if (currentPage === menuLink[i].getAttribute("data-name")) {
		console.log(menuLink[i].getAttribute("data-name"));
		menuLink[i].classList.add('current-link');
	}
}



//FUNCTION----------------------------------------------------------------------
function clearTimeouts(table){
	for (var i=0; i<table.length; i++) {
		clearTimeout(table[i]);
	}
	table = [];
}

function smoothScroll(elemSel, speed){
	var elem = document.querySelector(elemSel);
	var step = (speed/100)*5;
	var scrolled = 0;
	var targetTop = 0;
	do {
		targetTop += elem.offsetTop-elem.scrollTop;
	} while ( elem = elem.offsetParent );
	var currentTop = window.pageYOffset;
	if (targetTop < 0) {
		step = -step;
	}
	var timer = setInterval(function(){
		window.scrollBy(0,step);
		scrolled+=step;
		if (scrolled < 0) {
			if (scrolled < targetTop) {
				clearTimeout(timer);
			}
		}
		else {
			if (scrolled >= targetTop) {
				clearTimeout(timer);
			}
		}
	},5);
}

function position(elem) {
	var left = 0,
	top = 0;
	do {
		left += elem.offsetLeft-elem.scrollLeft;
		top += elem.offsetTop-elem.scrollTop;
	} while ( elem = elem.offsetParent );
	return [ left, top ];
}
