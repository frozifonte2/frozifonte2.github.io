"use strict"

let menu = document.querySelector(".header__menu");
let btnMenu = document.querySelector(".header__wrapbtn");
let cancel = document.querySelector(".header__buttonmenu");

btnMenu.addEventListener("click", toggleMenu);

function toggleMenu() {
	if (!menu.classList.contains("active")) {
		menu.classList.add("active");
		document.body.style.overflowY = "hidden";
		cancel.innerHTML = "&#x2715";
	} else {
		menu.classList.remove("active");
		document.body.style.overflowY = "scroll";
		cancel.innerHTML = "&#9776;";
	}
	
}

let btnpop = document.querySelector(".popup__button"),
		form = document.querySelector(".popup__form"),
		txText = document.querySelector(".popup__text"),
		input = document.querySelector(".popup__input");

btnpop.addEventListener('submit', function(e) {
	  e.preventDefault();
		form.style.display = "none";
		txText.style.display = "flex";
		input.reset();
})

let popOverlay = document.querySelector(".popup");
let closePop = document.querySelector(".popup__cancel");
let openPuBtn = document.querySelector(".header__btntop");
let hNav = document.querySelectorAll(".header__nav");

openPuBtn.addEventListener("click", openPopup);
closePop.addEventListener("click", closePopup);

function closePopup() {
	popOverlay.style.display = "none";
	document.body.style.overflowY = "scroll";
}

function openPopup() { 
	popOverlay.style.display = "flex";
	document.body.style.overflowY = "hidden";
}

$(document).ready(function() {
	$(".dishes__cards").slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		vertical: true,
		autoplay:true,
		infinite:true,
		arrows:false,
		verticalSwiping: true
	});
})
$(document).ready(function(){
  $('.menu__cards').slick({
  	slidesToShow: 3,
  	slidesToScroll: 1,
  	infinite: true,
  	arrows: false,
  	autoplay:true,
  	responsive: [
  		{
  			breakpoint: 836,
  			settings: {
  				slidesToShow: 2,
  				slidesToScroll: 1,
  				infinite: true
  			}

  		},
  		{
  			breakpoint: 620,
  			settings: {
  				slidesToShow: 1,
  				slidesToScroll: 1,
  				infinite: true
  			},
  			
  		}
  	]
  	
  })
});

$(document).ready(function(){
  $('.feedback__items').slick({
  	dots:true,
  	arrows:false,
  	slidesToShow: 1,
  	slidesToScroll: 1,
  	infinite: true
  })
});

    

    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
