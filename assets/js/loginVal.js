const button = document.getElementById('loginBtn');
const email = document.getElementById('email');
const pass = document.getElementById('pwd');

button.addEventListener('click', (e)=> {	
	login(e);
});

const login = (e) =>{
	const emailValue = email.value.trim();
	const passValue = pass.value.trim();

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
	

	if(emailValue != '' && isEmail(emailValue) && passValue !== '' && isPassword(passValue)){
		Loader();
		Loader.show();
		setTimeout(Loader.hide(),2000);
		
		
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

function isEmail(email) {
	return /([a-zA-Z0-9]+)([\.{1}])?([a-zA-Z0-9]+)\@gmail([\.])com$/.test(email);
}

function isPassword(password) {
	return  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(password);
}