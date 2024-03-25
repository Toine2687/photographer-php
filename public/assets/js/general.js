// Menu Burger
const burger = document.getElementById('burger')
const navLinks = document.getElementById('navLinks')
burger.addEventListener('click', () => {
	navLinks.classList.toggle('mobileMenu')
	burger.classList.toggle('fa-bars')
	burger.classList.toggle('fa-xmark')
})

// Afficheur de champs d'update sur le dash
const modifyPic = document.getElementById('modifyPic')
const updateSection = document.getElementById('update')

if (typeof (modifyPic) != 'undefined' && modifyPic != null) {
	modifyPic.addEventListener('click', () => {
		updateSection.classList.toggle('hidden')
	})
}




