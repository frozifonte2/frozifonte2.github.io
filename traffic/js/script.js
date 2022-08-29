let acc = document.querySelectorAll(".button-acc");

for (let i = 0; i < acc.length; i++) {
	acc[i].addEventListener('click', function() {
		let content = this.nextElementSibling;
		let img = this.firstElementChild;
		if (content.classList.contains('active')) {
			content.classList.remove('active');
			img.setAttribute("src", 'images/arrowdown.svg');
		} else {
			content.classList.add('active');
			img.setAttribute("src", 'images/arrowup.svg');
			acc[i].classList.remove('active');
			
		}
	});
}

$(document).ready(function(){
  $('#number').inputmask({"mask": "+7(999)999-99-99"});
  $('#tel').inputmask({"mask": "+7(999)999-99-99"});
});

