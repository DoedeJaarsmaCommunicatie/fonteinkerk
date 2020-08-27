export default {
	init() {
	},
	finalize() {
		toggleImpressions();
	}
};

export const toggleImpressions = () => {
	const button = document.querySelector('.js-toggle-exterior-lots-360'),
		showExteriorText = button.querySelector('.js-show-other-lots'),
		showCurrentText = button.querySelector('.js-show-current-lot');

	button.addEventListener('click', () => {
		const exterior = document.querySelector('.js-exterior-lots-360'),
			currentLot = document.querySelector('.woning-exterior_impression');

		exterior.style.height = '';
		exterior.style.opacity = '';
		exterior.style.pointerEvents = '';
		button.parentNode.style.marginTop = '';

		if (!currentLot.classList.contains('hidden')) {
			exterior.classList.remove('hidden');
			currentLot.classList.add('hidden');
			showExteriorText.classList.add('hidden');
			showCurrentText.classList.remove('hidden');
		} else {
			showCurrentText.classList.add('hidden');
			showExteriorText.classList.remove('hidden');
			currentLot.classList.remove('hidden');
			exterior.classList.add('hidden');
		}
	});
};
