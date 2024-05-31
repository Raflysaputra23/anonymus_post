// BOOTSTRAP POPOVER
const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

const toogleAside = document.getElementById('toogle-aside');
const aside = document.getElementById('aside');
const section = document.getElementById('section');
const navbar = document.getElementById('navbar');

let menu = document.querySelectorAll('.menu a');

window.addEventListener('resize', function() {
	resize();
});
window.addEventListener('load', function() {
	resize();
})
toogleAside.addEventListener('click', function() {
	aside.style.transition = 'all .3s ease';
	section.style.transition = 'all .3s ease';
	this.style.transition = 'all .3s ease';

	if (this.classList.contains('bx-chevron-right')) {
		aside.classList.replace('col-2','col-5');
		section.classList.replace('col-10','col-7');
		this.classList.replace('bx-chevron-right','bx-chevron-left');
		menu.forEach((el) => {
			el.classList.replace('justify-content-center','justify-content-start');
			el.querySelector('i').style.display = 'inline';
			el.querySelector('small').style.display = 'inline';
			el.querySelector('small').style.fontSize = '12px';
		})
	} else if (this.classList.contains('bx-chevron-left')) {
		aside.classList.replace('col-5','col-2');
		section.classList.replace('col-7','col-10');
		this.classList.replace('bx-chevron-left','bx-chevron-right');
		menu.forEach((el) => {
			el.classList.replace('justify-content-start','justify-content-center');
			el.querySelector('i').style.display = 'inline';
			el.querySelector('small').style.display = 'none';
		})
	}
});

navbar.addEventListener('click', (e) => {
	if (e.target.classList.contains('bx-message-dots')) {
		e.target.nextElementSibling.classList.toggle('d-none');
	}
});

window.addEventListener('click', (e) => {
	let boxMessage = navbar.querySelector('.bg-blur');
	if (e.target.classList.contains('bx-message-dots') || e.target.classList.contains('bg-blur')) {
		// e.target.nextElementSibling.classList.toggle('d-none');
	} else {
		boxMessage.classList.add('d-none');
	}
		
})







function resize() {
	if (this.innerWidth >= 990) {
		menu.forEach((el) => {
			el.classList.replace('justify-content-center','justify-content-start');
			el.querySelector('i').style.display = 'inline';
			el.querySelector('small').style.display = 'inline';
			toogleAside.style.display = 'none';
		});
	} else if (this.innerWidth > 768) {
		menu.forEach((el) => {
			el.classList.replace('justify-content-start','justify-content-center');
			el.querySelector('i').style.display = 'none';
			el.querySelector('small').style.display = 'inline';
			toogleAside.style.display = 'none';
		});
	} else if(this.innerWidth < 768) {
		menu.forEach((el) => {
			el.classList.replace('justify-content-start','justify-content-center');
			el.querySelector('i').style.display = 'inline';
			el.querySelector('small').style.display = 'none';
			toogleAside.style.display = 'inline';
		});
	}
}
