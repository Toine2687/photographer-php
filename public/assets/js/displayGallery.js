// -----DEFINITIONS
const elApp = document.getElementById('go-masonry');
const elImages = Array.from(document.querySelectorAll(".go_gridItem"));
const elDetail = document.querySelector(".detail");

// FLIP TECHNIQUE  =  FIRST / LAST / INVERT / PLAY
// https://css-tricks.com/animating-layouts-with-the-flip-technique/



function flipImages(firstEl, lastEl, change) {
	//F.L.i.p. => record des positions et dimensions des elts
	const firstRect = firstEl.getBoundingClientRect();
	const lastRect = lastEl.getBoundingClientRect();

	// f.l.I.p. => Invert Math => definition des delta entre début et fin
	const deltaX = firstRect.left - lastRect.left;
	const deltaY = firstRect.top - lastRect.top;
	const deltaW = firstRect.width / lastRect.width;
	const deltaH = firstRect.height / lastRect.height;

	change();
	lastEl.parentElement.dataset.flipping = true;
	//f.l.i.P => Play 

	// Fonction animate(keyframes, option)
	// https://developer.mozilla.org/en-US/docs/Web/API/Element/animate
	const animation = lastEl.animate([
		{
			transform: `translateX(${deltaX}px) translateY(${deltaY}px) scaleX(${deltaW}) scaleY(${deltaH})`
		},
		{
			transform: 'none'
		}
	], {
		duration: 600, // milliseconds
		easing: 'cubic-bezier(.2, 0, .3, 1)'
	});

	animation.onfinish = () => {
		delete lastEl.parentElement.dataset.flipping;
	}

}

elImages.forEach(figure => {

	figure.addEventListener("click", () => {
		const elImage = figure.querySelector('img');

		elDetail.innerHTML = "";

		const elClone = figure.cloneNode(true);
		elDetail.appendChild(elClone);

		const elCloneImage = elClone.querySelector('img');

		flipImages(elImage, elCloneImage, () => {
			elApp.dataset.state = "detail";
		});

		function revert() {

			flipImages(elCloneImage, elImage, () => {
				elApp.dataset.state = "gallery";
				elDetail.removeEventListener('click', revert);
			});

		}

		elDetail.addEventListener('click', revert);

	});
});


