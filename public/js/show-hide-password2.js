const inputs2 = document.querySelectorAll("input");
const form2 = document.getElementById("form");
const password2 = document.getElementById("password2");
const confirmPassword2 = document.getElementById("confirm-password2");
const showPassword2 = document.getElementById("show-password2");
const matchPassword2 = document.getElementById("match2");
const submit2 = document.getElementById("submit");

inputs2.forEach((input) => {
input.addEventListener("blur", (event) => {
if (event.target.value) {
  input.classList.add("is-valid");
} else {
  input.classList.remove("is-valid");
}
});
});

showPassword2.addEventListener("click", () => {
if (password2.type == "password") {
password2.type = "text";
confirmPassword2.type = "text";
showPassword2.innerText = "hide";
showPassword2.setAttribute("aria-label", "hide password");
showPassword2.setAttribute("aria-checked", "true");
} else {
password2.type = "password";
confirmPassword2.type = "password";
showPassword2.innerText = "show";
showPassword2.setAttribute("aria-label", "show password");
showPassword2.setAttribute("aria-checked", "false");
}
});

function updateRequirement(id, valid) {
    const requirement = document.getElementById(id);

    if (valid) {
        requirement.classList.add("valid");
    } else {
        requirement.classList.remove("valid");
    }
}

password2.addEventListener("input", (event) => {
const value = event.target.value;

updateRequirement("length2", value.length >= 8);
updateRequirement("lowercase2", /[a-z]/.test(value));
updateRequirement("uppercase2", /[A-Z]/.test(value));
updateRequirement("number2", /\d/.test(value));
updateRequirement("characters2", /[#.?!@$%^&*-]/.test(value));
});

confirmPassword2.addEventListener("blur", (event) => {
const value = event.target.value;

if (value.length && value != password2.value) {
matchPassword2.classList.remove("hidden");
} else {
matchPassword2.classList.add("hidden");
}
});

confirmPassword2.addEventListener("focus", (event) => {
matchPassword2.classList.add("hidden");
});

function handleFormValidation() {
    const value = password2.value;
    const confirmValue = confirmPassword2.value;

    if (value.length >= 8 &&
        /[a-z]/.test(value) &&
        /[A-Z]/.test(value) &&
        /\d/.test(value) &&
        /[#.?!@$%^&*-]/.test(value) &&
        value == confirmValue) {
        submit2.removeAttribute("disabled");
        return true;
    }

    submit2.setAttribute("disabled", true);
    return false;
}

form2.addEventListener("change", () => {
handleFormValidation();
});

form2.addEventListener("submit", (event) => {
event.preventDefault();
const validForm = handleFormValidation();

if (!validForm) {
return false;
}

alert("Form submitted");
});
