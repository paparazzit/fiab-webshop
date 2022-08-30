function AdminFormValidation(options) {
	this.form = document.querySelector(`#${options.form_id}`);
	this.errors = {};
	this.processedData;
	this.allInputs = [];
	this.inputs = options.inputs;
	this.inputsData = {};
	this.createInputs = function () {
		for (prop in this.inputs) {
			this[prop] = document.querySelector(`#${this.inputs[prop]}`);
			this.allInputs.push(prop);
		}
	};

	this.createInputs();

	this.checkInputs = function () {
		this.allInputs.forEach((input) => {
			if (this[input]) {
				this.checkSingleInput(this[input]);
			}
		});

		this.errorLength = Object.keys(this.errors).length;
		if (this.errorLength < 1) {
			this.processedData = this.data(this.inputsData);
		} else {
			return false;
		}
	};

	this.errorAlerts = function (input) {
		input.previousElementSibling.classList.add("alerts");
		input.classList.add("alerts");
	};
	this.clearAlerts = function (input) {
		input.previousElementSibling.classList.remove("alerts");
		input.classList.remove("alerts");
		delete this.errors[input.id];
	};

	this.data = function (data) {
		// console.log(data);
		let fd = new FormData();
		for (prop in data) {
			if (data[prop].type === "file") {
				fd.append("file", data[prop].files[0]);
			} else {
				fd.append(`${prop}`, `${data[prop]}`);
			}
		}

		return fd;
	};
	this.checkSingleInput = function (input) {
		if (input.value === "") {
			this.errors[input.id] = `${input.id} Error`;
			this.errorAlerts(input);
		} else {
			this.clearAlerts(input);
			if (input.files) {
				// OVDE UBACI SLIKU
				this.inputsData["room_img"] = input;
			} else {
				this.inputsData[input.id] = input.value;
			}
		}
	};
}

// PROCESUIRANJE FORME
let newRoomForm = document.querySelector("#newRoomForm");
let newRoomBtn = document.querySelector("#newRoomBtn");
if (newRoomForm) {
	let options = {
		form_id: "newRoomForm",
		inputs: {
			room_name: "room_name",
			room_version: "room_version",
			room_desc: "room_desc",
			room_img: "room_img",
		},
	};
	let createNewRoomForm = new AdminFormValidation(options);
	newRoomBtn.addEventListener("click", (e) => {
		e.preventDefault();
		createNewRoomForm.checkInputs();
		// let img = document.querySelector("#room_img");
		let data = createNewRoomForm.processedData;
		// data.append("file", img.files[0]);
		newRoomBtn.innerHTML = "Creating New Room";
		newRoomBtn.classList.add("btn-warning");
		if (data) {
			// window.location = createNewRoomForm.form.submit();

			const config = {
				headers: {
					"Content-type": "multipart/form-data",
				},
				onUploadProgress: function (progress) {
					console.log(progress.loaded);
					console.log(progress.total);
				},
			};

			axios
				.post("users/createNewRoom.php", data, config)
				.then((res) => {
					if (res.data.trim() === "Ok") {
						console.log(res.data);
						window.location = "adminPanel/manageProducts.php";
						newRoomBtn.innerHTML = "Create Room";
						newRoomBtn.classList.remove("btn-warning");
					} else {
						throw res.data;
					}
				})
				.catch((err) => {
					console.log(err);
				});
		}
	});
}

// UPDATEROOM

// UPDATE ROOM IMAGE

let roomImgBtn = document.querySelector("input#update_room_img");
let currentRoomImg = document.querySelector("img#currentImg");
let imgForm = document.querySelector("form#changeRoomImg");
let imgPath = "";
if (roomImgBtn) {
	roomImgBtn.addEventListener("change", updateRoomImg);
}

function updateRoomImg() {
	let fd = new FormData();
	fd.append("room_img", this.files[0]);

	axios
		.post(imgForm.action, fd, config)
		.then((res) => {
			console.log(res.data);
			if (res.data === "false") {
				throw res.data;
			} else {
				window.location = `adminPanel/editRoom.php?room_id=${res.data}`;
			}
		})
		.catch((err) => {
			console.log(err);
		});
}

// ITEMS:
const config = {
	headers: {
		"Content-type": "multipart/form-data",
	},
};

let newPartForm = document.querySelector("form#newPartForm");

if (newPartForm) {
	let partFormButton = newPartForm.querySelector("button#newPartBtn");
	let formInfo = newPartForm.querySelector("div#form-result");
	newPartForm.addEventListener("submit", processPartForm);

	function processPartForm(e) {
		e.preventDefault();

		let formElements = newPartForm.elements;
		errors = {};

		for (let i = 0; i < formElements.length; i++) {
			checkFormElements(formElements[i]);
		}

		if (checkForErrors(errors)) {
			let data = new FormData(newPartForm);
			axios
				.post("adminPanel/newPart.php", data, config)
				.then((res) => {
					if (res.data.trim() === "ok") {
						partFormButton.classList.remove("btn-danger");
						partFormButton.classList.add("btn-success");

						formInfo.classList.remove("hide");
						newPartForm.reset();
						setTimeout(() => {
							formInfo.classList.add("hide");
							partFormButton.classList.remove("btn-success");
						}, 4000);
					} else {
						throw res.data;
					}
				})
				.catch((err) => {
					partFormButton.classList.remove("btn-success");
					partFormButton.classList.add("btn-danger");
					formInfo.classList.remove("hide");
					formInfo.children[0].innerText = "ERROR";
					setTimeout(() => {
						formInfo.classList.add("hide");
						formInfo.children[0].innerText = "SUCCESS";
					}, 4500);
					console.log(err);
				});
		}
	}
}

function checkFormElements(element) {
	if (element.type === "submit") {
		return;
	}

	if (element.value === "") {
		element.classList.add("alerts");
		errors[element.id] = "error";
	} else {
		element.classList.remove("alerts");
		delete errors[element.id];
	}
}

function checkForErrors(errors) {
	let errorsLength = Object.keys(errors).length;

	if (errorsLength < 1) {
		return true;
	} else {
		return false;
	}
}

// EDIT PARTS

let deletePartBtns = document.querySelectorAll("td a.delete_itm");

if (deletePartBtns.length > 1) {
	deletePartBtns.forEach((deletePartBtn) => {
		deletePartBtn.addEventListener("click", deleteAlert);
	});
}

function deleteAlert(e) {
	e.preventDefault();
	let partName = this.getAttribute("data-name");
	let conf = confirm(`Delete part ${partName} `);

	if (conf) {
		window.location = this.href;
	}
}

// UPDATE ITEM IMG

let updateImgBtn = document.querySelector("input#update_itm_img");
let updateImgForm = document.querySelector("form#changeItmImg");

if (updateImgBtn) {
	let link = "";
	if (location.hostname === "localhost" || location.hostname === "127.0.0.1") {
		link = "/fiab-webshop/adminPanel/editItem.php?part_id=";
	} else {
		link = "adminPanel/editItem.php?part_id=";
	}
	updateImgBtn.addEventListener(
		"change",
		updateItmImg.bind(this, link, updateImgBtn, updateImgForm)
	);
}

function updateItmImg(prop, btn, form) {
	let fd = new FormData();
	fd.append("itm_img", btn.files[0]);

	axios
		.post(form.action, fd, config)
		.then((res) => {
			if (res.data === "false") {
				throw res.data;
			} else {
				window.location = prop + res.data;
			}
		})
		.catch((err) => {
			console.log(err);
		});
}

// ADD MORE IMAGES TO ITEMS

let addMoreImgBtn = document.querySelector("input#add_imgs");
let addImgsForm = document.querySelector("form#add_imgs_form");
let submitMoreImgs = document.querySelector("#submit_imgs");
let imgDiv = document.querySelector("div.allImgs");
if (addMoreImgBtn) {
	addMoreImgBtn.addEventListener("change", uploadImgsClick);
}

function uploadImgsClick() {
	let file = this.files[0];
	if (file) {
		submitMoreImgs.parentElement.classList.remove("d-none");
		createImgDiv(file);
	}
}

function createImgDiv(file) {
	let imgUrl = URL.createObjectURL(file);
	let text = ``;
	text += `<div class="img-wrapper" id="uploadImgWrapper">
	<img src="${imgUrl}" alt="" />
	<div class="overlay">Remove</div>
	</div>`;

	imgDiv.innerHTML = text;
	let removeBtn = document.querySelector("#uploadImgWrapper");
	removeBtn.addEventListener("click", removeUploadedImage);
}

function removeUploadedImage() {
	console.log(this);
	addImgsForm.reset();
	this.remove();
}

// REMOVING ADDITIONAL IMAGES

let additionalImage = document.querySelectorAll("img.additional_img");

if (additionalImage.length > 0) {
	additionalImage.forEach((img) => {
		img.addEventListener("click", removeAdditionalImage);
	});
}

function removeAdditionalImage() {
	let id = this.getAttribute("data-id");
	let parent = this.parentElement.parentElement;
	let conf = confirm("Are you sure you want to delete this image");

	if (conf) {
		let fd = new FormData();
		fd.append("id", id);

		axios
			.post("adminPanel/item-control/removeAdditionalImg.php", fd)
			.then((res) => {
				if (res.data === "success") {
					parent.remove();
					console.log(res.data);
				}
			})
			.catch((err) => {
				console.log(err);
			});
	}
}
