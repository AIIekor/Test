let userBox = document.querySelector('.header .header-2 .user-box');

document.querySelector('#user-btn').onclick = () =>{
    userBox.classList.toggle('active');
	navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
	userBox.classList.remove('active');
}

window.onscroll = () =>{
	navbar.classList.remove('active');
	userBox.classList.remove('active');
	
	if(window.scrollY > 60){
		document.querySelector('.header .header-2').classList.add('active');
	}else{
		document.querySelector('.header .header-2').classList.remove('active');
	}
}
document.addEventListener("DOMContentLoaded", function(event) { 
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};

let slideIndex = 1;
showSlides(slideIndex);
function nextSlide() {
    showSlides(slideIndex += 1);
}
function previousSlide() {
    showSlides(slideIndex -= 1);
}
function currentSlide(n) {
    showSlides(slideIndex = n);
}
function showSlides(n) {
    let slides = document.getElementsByClassName("box-slider");
    if (n > slides.length) {
      slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (let slide of slides) {
        slide.style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}