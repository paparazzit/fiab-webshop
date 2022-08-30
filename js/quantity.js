function QuantityControl() {
	this.pluses = document.querySelectorAll("button.plus");
	this.minuses = document.querySelectorAll("button.minus");
	onStock = document.querySelector("span.onStock");
	this.input = document.querySelector("input.val");
	onStock.innerText = this.input.getAttribute("max") - this.input.value;

	this.pluses.forEach((plus) => {
		plus.addEventListener("click", increase);
	});

	this.minuses.forEach((minus) => {
		minus.addEventListener("click", decrease);
	});

	function increase() {
		let input = this.nextElementSibling;
		let maxVal = input.getAttribute("max");
		let val = parseInt(input.value);
		let newValue = val + 1;
		if (newValue > maxVal) {
			alert("Ne moze vise od" + maxVal);
			return;
		}
		onStock.innerText = maxVal - newValue;

		input.value = newValue;
		console.log(newValue);
	}
	function decrease() {
		let input = this.previousElementSibling;
		let val = parseInt(input.value);
		let newValue = val - 1;
		if (newValue < 0) {
			return;
		}
		onStock.innerText = parseInt(onStock.innerText) + 1;

		input.value = newValue;
	}
}
