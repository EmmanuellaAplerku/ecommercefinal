const button = document.getElementById('registerBtn');
const uname = document.getElementById('name');
const phone = document.getElementById('pnum');
const email = document.getElementById('email');
const pass = document.getElementById('pwd');

button.addEventListener('click', (e)=> {	
	register(e);
});

const register = (e) =>{
    // e.preventDefault();
    const unameValue = uname.value.trim();
	const phoneValue = phone.value.trim();
	const emailValue = email.value.trim();
	const passValue = pass.value.trim();

    if(unameValue === '') {
		setEmptyFor(uname, 'First Name cannot be blank');
		e.preventDefault();
	} else if(!isuname(unameValue)){
		setEmptyFor(uname, 'Format not valid: Eg. Codex')
		e.preventDefault();
	} else{
		setNotEmptyFor(uname);
	}


	if(phoneValue === ''){
		setEmptyFor(phone, 'Phone cannot be blank');
		e.preventDefault();
	} else if(!isPhone(phoneValue)){
		setEmptyFor(phone, 'Must be valid: Eg. 0123456789');
		e.preventDefault();
	} else{
		setNotEmptyFor(phone);
	}

	if(emailValue === '') {
		setEmptyFor(email, 'Email cannot be blank');
		e.preventDefault();
	} else if (!isEmail(emailValue)) {
		setEmptyFor(email, 'Must be Valid: Eg. codex@gmail.com');
		e.preventDefault();
	} else {
		setNotEmptyFor(email);
	}
	
	if(passValue === '') {
		setEmptyFor(pass, 'Password cannot be blank');
		e.preventDefault();
	} else if(!isPassword(passValue)){
		setEmptyFor(pass, '8 or more include:0-9 | A-Z | a-z | #?!@$%^&*-');
		e.preventDefault();
	}else {
		setNotEmptyFor(pass);
	}	


	if(unameValue !== ''&& isuname(unameValue)  && phoneValue !== '' && isPhone(phoneValue) && emailValue != '' && isEmail(emailValue) && passValue !== '' && isPassword(passValue) ){
		Loader();
		Loader.show();
	}
}




function setEmptyFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setNotEmptyFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}

function isuname(uname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(uname);
}

function isLname(lname){
	return /^[A-Za-z][A-Za-z\'\-]+([\ A-Za-z][A-Za-z\'\-]+)*$/.test(lname);
}

function isPhone(phone){
	return /^\+?([0-9]{1,3})\)?([\d ]{9,15})$/.test(phone);
}

function isEmail(email) {
	return /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com$/.test(email);
}

function isPassword(password) {
	return  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(password);
}