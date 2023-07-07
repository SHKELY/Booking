function DisplayMessage(message, id, color) {
    document.getElementById(id).innerHTML = message;
    document.getElementById(id).style.color = color;
}
// login

function ValidateForm() {
    var name = document.form.email.value.trim();
    var password = document.form.pass.value.trim();

    if (name == '' && password == '') {
        DisplayMessage('Pleas enter your Email!', 'eEmail', 'red')
        DisplayMessage('Pleas enter your Password!', 'ePasi', 'red')
        return false;
    } else if (name == '') {
        DisplayMessage('Pleas enter your Email!', 'eEmail', 'red')
        DisplayMessage('', 'Pasi', 'red')
        return false;
    } else if (password == '') {
        DisplayMessage('Pleas enter your Password!', 'ePasi', 'red')
        DisplayMessage('', 'eEmail', 'red')
        return false;
    }
}

// register

function ValidationForm() {
    var name = document.form.name.value.trim();
    var email = document.form.email.value.trim();
    var number = document.form.tell.value.trim();
    var password = document.form.pass.value.trim();
    var passwordC = document.form.re_pass.value.trim();
    var ma = /^\S+@\S+\.\S+$/;

    if (name === '' && email === '' && number === '' && password === '' && passwordC === '') {
        DisplayMessage('Pleas Enter Full Name!', 'eName', 'red')
        DisplayMessage('Pleas Enter Email!', 'eEmail', 'red')
        DisplayMessage('Pleas Enter Phone Number!', 'ePhone', 'red')
        DisplayMessage('Pleas Enter Password!', 'ePass', 'red')
        DisplayMessage('Pleas Enter Password!', 'ePPass', 'red')
        return false;
    }

    if (name == '') {
        DisplayMessage("Pleas Enter Full Name!", "eName", "red")
        return false;
    }
    ValidateName();

    if (number == '') {
        DisplayMessage('Pleas Enter Phone Number here!', 'ePhone', 'red')
        return false;
    }
    ValidatePhone();

    if (email == '') {
        DisplayMessage('Pleas Enter Email!', 'eEmail', 'red')
        return false;
    }
    ValidateEmail();

    if (password == '') {
        DisplayMessage('Pleas Enter Password!', 'ePass', 'red')
        return false;
    }
    ValidatePassword();

    if (passwordC == '') {
        DisplayMessage('Confirm Password!', 'ePPass', 'red')
        return false;
    } else if (password != passwordC) {
        DisplayMessage('Password not match!', 'ePPass', 'red')
        return false;
    }
    ValidatePasswordC();

    //final
    if (name.length <= 8 || name.length >= 35) {
        DisplayMessage('Name is not Complete!', 'eName', 'red');
        return false;
    }
    if (pp.test(number) === false) {
        DisplayMessage('Incorate Phone Number!', 'ePhone', 'red');
        return false;
    }
    if (ma.test(email) === false) {
        DisplayMessage('Incorate Email!', 'eEmail', 'red');
        return false;
    }
    if (password.length < 8) {
        DisplayMessage('Password is Short!', 'ePass', 'red')
        if (password.length > 15) {
            DisplayMessage('Password is very Long!', 'ePass', 'red')
        }
        return false;
    }
    if (password != passwordC) {
        DisplayMessage('Password not match!', 'ePPass', 'red')
        return false;
    }
}

function ValidateName() {
    var name = document.form.name.value.trim();
    if (name.length <= 8 || name.length >= 35) {
        DisplayMessage('Full Name!', 'eName', 'red');
        return false;
    } else {
        DisplayMessage('Correct', 'eName', 'green')
    }
}

function ValidatePhone() {
    var number = document.form.tell.value.trim();
    if (number.length < 10) {
        DisplayMessage('Wrong phone number!', 'ePhone', 'red');
        return false;
    } else {
        DisplayMessage('Correct', 'ePhone', 'green')
    }
}

function ValidateEmail() {
    var email = document.form.email.value.trim();
    var ma = /^\S+@\S+\.\S+$/;
    if (ma.test(email) === false) {
        DisplayMessage('Email is not Correct!', 'eEmail', 'red');
        return false;
    } else {
        DisplayMessage('Correct', 'eEmail', 'green')
    }
}


function ValidatePassword() {
    var password = document.form.pass.value.trim();
    if (password.length < 8) {
        DisplayMessage('Password is Short!', 'ePass', 'red')
        if (password.length > 15) {
            DisplayMessage('Password is very Long!', 'ePass', 'red')
        }
        return false;
    } else {
        DisplayMessage('Correct', 'ePass', 'green')
    }
}

function ValidatePasswordC() {
    var password = document.form.pass.value.trim();
    var passwordC = document.form.rep_pass.value.trim();
    if (password != passwordC) {
        DisplayMessage('Password not match!', 'ePPass', 'red')
        return false;
    } else {
        DisplayMessage('Perfect', 'ePPass', 'green')
    }
}