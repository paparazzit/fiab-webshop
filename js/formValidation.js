function FormaValidator(options) {
	this.form = document.querySelector(`#${options.form_id}`);
	this.button = this.form.querySelector("button");
	this.errors = {};
	this.createInputVar = function () {
		this.inputs = options.inputs;
		for (prop in this.inputs) {
			this[prop] = document.querySelector(`#${this.inputs[prop]}`);
		}
	};
	this.data = {};
	this.createInputVar();

	this.checkForm = function (e) {
		if (this.name) {
			this.checkInput(this.name);
		}
		if (this.email) {
			this.checkInput(this.email);
		}
		if (this.userId) {
			this.checkInput(this.userId);
		}
		if (this.oldPass) {
			this.checkInput(this.oldPass);
		}
		if (this.pass) {
			this.checkInput(this.pass);
		}
		if (this.pass_con) {
			this.checkInput(this.pass_con);
			this.checkPasswordMatch();
		}
		if (this.t_c) {
			this.checkTC(this.t_c);
		}
		if (this.remember_me) {
			if (this.remember_me.checked) {
				this.data[remember.name] = true;
			} else {
				this.data[remember.name] = false;
			}
		}

		this.ErrorLength = Object.keys(this.errors).length;

		if (this.ErrorLength < 1) {
			return this.processForm();
		} else {
			return false;
		}
	};
	this.processForm = function () {
		// Spakuj podatke i posalji

		let fd = new FormData();

		for (let prop in this.data) {
			fd.append(`${prop}`, this.data[prop]);
		}
		return fd;
	};

	this.checkInput = function (input) {
		if (input.value === "") {
			this.errors[input.name] = `${input.name} Error`;
			input.classList.add("input-error");
			input.nextElementSibling.innerText = this.errors[input.name];
		} else {
			delete this.errors[input.name];
			this.data[input.name] = input.value;
			input.classList.remove("input-error");
			input.nextElementSibling.innerText = "";
		}
	};

	this.checkPasswordMatch = function () {
		if (this.pass.value && this.pass_con.value) {
			if (this.pass.value === this.pass_con.value) {
				delete this.errors["pass_match"];
				this.pass_con.classList.remove("input-error");
				this.pass_con.nextElementSibling.innerText = "";
			} else {
				this.errors["pass_match"] = "Passwords do not Match";
				this.pass_con.classList.add("input-error");
				this.pass_con.nextElementSibling.innerText = this.errors["pass_match"];
			}
		}
	};
	this.checkTC = function (t_c) {
		if (!t_c.checked) {
			this.errors[t_c.name] = `${t_c.name} Error`;
			t_c.nextElementSibling.innerText = this.errors[t_c.name];
			t_c.classList.add("input-error");
		} else {
			delete this.errors[t_c.name];
			t_c.nextElementSibling.innerText = "";
			t_c.classList.remove("input-error");
		}
	};

	this.init = function () {
		// this.form.addEventListener("submit", this.checkForm.bind(this));
	};
}
