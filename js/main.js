window.addEventListener("resize", resizeScreen);
window.addEventListener("load", resizeScreen);
function resizeScreen() {
	if (window.innerWidth < 992) {
		window.addEventListener("scroll", scrolling);
	} else {
		window.removeEventListener("scroll", scrolling);
	}
}

function scrolling() {
	if (roomNavigation) {
		if (window.scrollY > 107) {
			roomNavigation.classList.add("fixIt");
		} else {
			roomNavigation.classList.remove("fixIt");
		}
	}
}

$("#inStock").owlCarousel({
	loop: true,
	margin: 50,
	nav: true,

	// center: true,
	nav: false,
	responsive: {
		0: {
			items: 1,
		},
		773: {
			items: 2,
		},
		1000: {
			items: 3,
		},
	},
});

let quantDiv = document.querySelector(".quant");
if (quantDiv) {
	let quantity = new QuantityControl();
}

// ROOM NAV
let roomNavigation = document.querySelector(".roomNav");
let roomBtn = document.querySelector(".room-btn");
let roomDrop = document.querySelector(".room-items");
window.addEventListener("click", checkForClick);

function checkForClick(e) {
	if (roomNavigation) {
		if (e.target.classList.contains("room-btn")) {
			if (roomDrop.classList.contains("active")) {
				roomDrop.classList.remove("active");
			} else {
				roomDrop.classList.add("active");
			}
		} else {
			roomDrop.classList.remove("active");
		}
	}
}
function roomNav() {
	roomDrop.classList.toggle("active");
}

// REGISTER LOGIN
let registerNavBtn = document.querySelector("#register-btn");
let loginNavBtn = document.querySelector("#login-btn");
let registerModal = document.querySelector("#registerModal");
let registerInfo = document.querySelector("#register-form .form-info");
let loginInfo = document.querySelector("#login-form .form-info");
//register
if (registerNavBtn) {
	let registerOptions = {
		form_id: "register-form",
		inputs: {
			name: "register-name",
			email: "register-email",
			pass: "register-pass",
			pass_con: "pass-con",
			t_c: "t_c",
		},
	};

	const registerForm = new FormaValidator(registerOptions);

	registerForm.form.addEventListener("submit", (e) => {
		e.preventDefault();
		let data = registerForm.checkForm();
		if (data) {
			axios
				.post("./register.php", data)
				.then((res) => {
					if (res.data.trim() === "success") {
						registerInfo.classList.remove("hide");
						registerInfo.children[0].innerText = res.data.toUpperCase().trim();
						setTimeout(() => {
							registerInfo.classList.add("hide");
							clearFields(registerForm.form);
							loginNavBtn.click();
						}, 2000);
					} else {
						throw res.data.trim();
					}
				})
				.catch((err) => {
					registerInfo.classList.remove("hide");
					registerInfo.children[0].innerText = err;
				});
		}
	});
}

//login
if (loginNavBtn) {
	let loginOptions = {
		form_id: "login-form",
		inputs: {
			email: "login-email",
			pass: "login-pass",
			remember_me: "remember",
		},
	};

	let loginForm = new FormaValidator(loginOptions);

	loginForm.form.addEventListener("submit", (e) => {
		e.preventDefault();
		let data = loginForm.checkForm();
		if (data) {
			axios
				.post("./login.php", data)
				.then((res) => {
					console.log(res.data.loggedIn);
					if (res.data.loggedIn === "success") {
						if (res.data.remember === "true") {
							window.location = "./users/home.php?remember=true";
						} else {
							window.location = "./users/home.php";
						}
					} else {
						throw res.data.trim();
					}
				})
				.catch((err) => {
					console.log(err);

					loginInfo.classList.remove("hide");
					loginInfo.children[0].innerText = err;
				});
		}
	});
}

let resetPassForm = document.querySelector("#resetPass-form");

if (resetPassForm) {
	let resetInfo = resetPassForm.querySelector(".form-info");
	let resetOptions = {
		form_id: "resetPass-form",
		inputs: {
			email: "reset-email",
		},
	};

	let resetForm = new FormaValidator(resetOptions);

	resetForm.form.addEventListener("submit", (e) => {
		e.preventDefault();
		let data = resetForm.checkForm();
		if (data) {
			axios
				.post("./resetPassword.php", data)
				.then((res) => {
					if (res.data.trim() === "success") {
						resetInfo.classList.remove("hide");
						resetInfo.children[0].innerText =
							res.data.toUpperCase().trim() +
							"! Email with reset Token has been sent";
					} else {
						throw res.data.trim();
					}
				})
				.catch((err) => {
					console.log(err);
					resetInfo.classList.remove("hide");
					resetInfo.children[0].innerText = err;
				});
		}
	});
}

// reset User password form

let resetUserPassForm = document.querySelector("form#reset_user_form");
if (resetUserPassForm) {
	let changePassOptions = {
		form_id: "reset_user_form",
		inputs: {
			email: "reset-email",
			pass: "reset_user_pass",
			pass_con: "reset_user_pass_con",
		},
	};
	let changePassForm = new FormaValidator(changePassOptions);

	changePassForm.form.addEventListener("submit", (e) => {
		e.preventDefault();
		let data = changePassForm.checkForm();

		if (data) {
			axios
				.post("./resetPasswordForm.php", data)
				.then((res) => {
					console.log(res.data);
					if (res.data.trim() === "ok") {
						window.location = "index.php";
					}
				})
				.catch((err) => {
					console.log(err);
				});
		}
	});
}

function clearFields(form) {
	form.reset();
}

// CHANGE PASSWORD

let changePassForm = document.querySelector("#changePasswordForm");

if (changePassForm) {
	let formInfo = document.querySelector("#changePasswordForm #form-info");
	let changePassOptions = {
		form_id: "changePasswordForm",
		inputs: {
			oldPass: "oldPass",
			pass: "pass",
			pass_con: "pass_con",
			userId: "userId",
		},
	};

	let updatePass = new FormaValidator(changePassOptions);

	updatePass.form.addEventListener("submit", (e) => {
		e.preventDefault();
		let data = updatePass.checkForm();
		if (data) {
			axios
				.post("./users/updatePassword.php", data)
				.then((res) => {
					console.log(res.data);
					if (res.data.trim() === "admin") {
						window.location =
							"users/editUser.php?userId=" + updatePass.userId.value;
					} else if (res.data.trim() === "guest") {
						window.location = "users/userProfile.php";
					} else {
						throw res.data.trim();
					}
				})
				.catch((err) => {
					formInfo.innerText = err;
				});
		}
	});
}

// DELETE USER

let deleteUserBtn = document.querySelectorAll(".deleteUser");

if (deleteUserBtn) {
	deleteUserBtn.forEach((deleteBtn) => {
		console.log("IMAM");
		deleteBtn.addEventListener("click", (e) => {
			e.preventDefault();
			let user = deleteBtn.parentElement.parentElement.children[0].innerText;
			let link = deleteBtn.getAttribute("href");
			console.log(user);
			let conf = confirm(`Are you sure you want do delte user: ${user}`);
			if (conf) {
				window.location = link;
			}
		});
	});
}

function preventClick(e) {
	e.preventDefault();
}

// ADDITIONAL IMAGES SLIDER

// select additional images
let productImage = document.querySelector(".prod-img");
let additionalImages = document.querySelectorAll(".open_gallery");
let mainImage = document.querySelector(".main_img img");
let galleryModal = document.querySelector("#gallery_modal");
let closeModal = document.querySelector("#close_modal");
let imgThumbs = document.querySelectorAll(".img_thumbs");
if (mainImage) {
	if (additionalImages.length > 0) {
		additionalImages.forEach((image) => {
			image.addEventListener("click", openGallery);
		});
	}

	productImage.addEventListener("click", openGallery);
	imgThumbs.forEach((thumb) => {
		thumb.addEventListener("click", changeMainImage);
	});
	galleryModal.addEventListener("click", close_Modal);
}

function openGallery() {
	galleryModal.classList.add("show");
	let currentImg = this.children[0].src;
	mainImage.src = currentImg;
}

function close_Modal(e) {
	if (
		e.target.classList.contains("close_btn") ||
		e.target.classList.contains("gallery_modal")
	) {
		galleryModal.classList.remove("show");
	}
	// galleryModal.classList.remove("show");
}
function changeMainImage() {
	mainImage.src = this.children[0].src;
}
