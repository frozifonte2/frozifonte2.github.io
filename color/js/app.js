$('.checkform input[type=file]').on('change', function(){
  let file = this.files[0];
  $(this).next().html("Файл добавлен &#10003;");
});
$('.feedback__items').slick({
  slidesToShow: 2,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
  adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }
  ]
});

window.addEventListener("DOMContentLoaded", function() {
    [].forEach.call( document.querySelectorAll('.tel'), function(input) {
    var keyCode;
    function mask(event) {
        event.keyCode && (keyCode = event.keyCode);
        var pos = this.selectionStart;
        if (pos < 3) event.preventDefault();
        var matrix = "+7 (___) ___ ____",
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = this.value.replace(/\D/g, ""),
            new_value = matrix.replace(/[_\d]/g, function(a) {
                return i < val.length ? val.charAt(i++) || def.charAt(i) : a
            });
        i = new_value.indexOf("_");
        if (i != -1) {
            i < 5 && (i = 3);
            new_value = new_value.slice(0, i)
        }
        var reg = matrix.substr(0, this.value.length).replace(/_+/g,
            function(a) {
                return "\\d{1," + a.length + "}"
            }).replace(/[+()]/g, "\\$&");
        reg = new RegExp("^" + reg + "$");
        if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
        if (event.type == "blur" && this.value.length < 5)  this.value = ""
    }

    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false)

  });

});

let btnMenu = document.querySelector('.menu');
let wrapper = document.querySelector('.nav__wrapper');
btnMenu.addEventListener('click', function() {
      btnMenu.classList.toggle('active');
      wrapper.classList.toggle('active');
      if(btnMenu.classList.contains('active')) {
        document.body.style.overflowY = 'hidden'; 
      }
      else {
        document.body.style.overflowY = 'scroll';
      }
});
let = nav = document.querySelector('nav');
window.addEventListener('scroll', function() {
  if (pageYOffset >= 100) {
    nav.classList.add('active');
  }
  else {
    nav.classList.remove('active');
  }
});
$(document).ready(function() {
  $('.portfoliopage__items').magnificPopup({
    delegate: 'a',
    type: 'image',
    closeOnContentClick: false,
    closeBtnInside: false,
    mainClass: 'mfp-with-zoom mfp-img-mobile',
    image: {
      verticalFit: true,
    },
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300, // don't foget to change the duration also in CSS
      opener: function(element) {
        return element.find('img');
      }
    }
  });
});

const lazyLoad = document.querySelector(".lazyload");
window.addEventListener("load", function() {
  lazyLoad.style.opacity = "0"; 
  lazyLoad.style.zIndex = "-1"; 
  document.body.style.overflowY = "scroll";
});

$(document).ready(function() {
  $('.portfoliopage__vid').magnificPopup({
    disableOn: 100,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });
});