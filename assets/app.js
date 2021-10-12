// ThemeSwitch
let themeSwitch = document.querySelector('.themeSwitch');
		let body = document.querySelector('body');
		themeSwitch.onclick = function(){
			themeSwitch.classList.toggle('active');
			body.classList.toggle('dark');
		}
		let menutoggle = document.querySelector('.toggle');
		let menu = document.querySelector('.menu');
		menutoggle.onclick = function(){
			menutoggle.classList.toggle('active');
			menu.classList.toggle('menu');
		}

// Progress Bar
let progress = document.getElementById('progressbar');
let totalHeight = document.body.scrollHeight - window.innerHeight;
window.onscroll = function(){
    let progressHeight = (window.pageYOffset / totalHeight) * 100;
    progress.style.height = progressHeight + "%";
}

let more = document.querySelectorAll('.more');
			for (let i = 0; i<more.length; i++){
				more[i].addEventListener('click', function(){
					more[i].parentNode.classList.toggle('active');          
				})
			}

// 
