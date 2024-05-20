function validateEmail() 
{
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const emailElement = document.getElementById('email');

    if (!emailPattern.test(emailElement.value)) {
        document.getElementById('emailErr').innerHTML = 'Invalid email address.';
        emailElement.classList.add('error-border');
        emailElement.classList.remove('success-border');
        return false;
    } else {
        document.getElementById('emailErr').innerHTML = '';
        emailElement.classList.remove('error-border');
        emailElement.classList.add('success-border');
        return true;
    }
}

function validateMobileNumber() {
    const mobilePattern = /^(\+|)[0-9]{10}$/;
    const mobileElement = document.getElementById('mobile');

    if (!mobilePattern.test(mobileElement.value)) {
        document.getElementById('mobileErr').innerHTML = 'Invalid mobile number.';
        mobileElement.classList.add('error-border');
        mobileElement.classList.remove('success-border');
        return false;
    } else {
        document.getElementById('mobileErr').innerHTML = '';
        mobileElement.classList.remove('error-border');
        mobileElement.classList.add('success-border');
        return true;
    }
}

function validatePassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmpassword').value;
    const passElement = document.getElementById('password');
    const confPassElement = document.getElementById('confirmpassword');

    if (password !== confirmPassword) {
        document.getElementById('passErr').innerHTML = 'Passwords do not match.';
        passElement.classList.add('error-border');
        confPassElement.classList.add('error-border');
        return false;
    } else {
        document.getElementById('passErr').innerHTML = '';
        passElement.classList.remove('error-border');
        confPassElement.classList.remove('error-border');
        passElement.classList.add('success-border');
        confPassElement.classList.add('success-border');
        return true;
    }
}

function handleSubmit(event) {
    const passwordValid = validatePassword();
    const emailValidationResult = validateEmail();
    const mobileValidationResult = validateMobileNumber();

    if (passwordValid && emailValidationResult && mobileValidationResult) {
        alert('Form submitted successfully!');
    } else {
        event.preventDefault();
        alert('Error');
    }
}

document.getElementById('registrationForm').addEventListener('submit', handleSubmit);
