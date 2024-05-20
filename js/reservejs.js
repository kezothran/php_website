document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('.form'); // Select the form by its class

    form.addEventListener('submit', e => {
        // Reset any previous error messages
        clearErrors();

        // Validate inputs and check if any errors are found
        if (!validateInputs()) {
            e.preventDefault(); // Prevent form submission if validation fails
        }
    });

    function clearErrors() {
        const errorElements = document.querySelectorAll('.error');
        errorElements.forEach(errorElement => {
            errorElement.innerText = '';
            const inputControl = errorElement.parentElement;
            inputControl.classList.remove('error');
            inputControl.classList.remove('success');
        });
    }

    const setError = (element, message) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = message;
        inputControl.classList.add('error');
    };

    const setSuccess = (element) => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');
        errorDisplay.innerText = '';
        inputControl.classList.add('success');
    };

    const isValidEmail = (email) => {
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    };

    const validateInputs = () => {
        const name = form.querySelector('#name');
        const email = form.querySelector('#email');
        const preferred_date = form.querySelector('#preferred_date');
        const preferred_locations = form.querySelector('#preferred_location');
        const phone = form.querySelector('#phone');
        const package_types = form.querySelector('#package_type');
        const event_types = form.querySelector('#event_type');

        let hasErrors = false; // Flag to track validation errors

        if (name.value.trim() === '') {
            setError(name, 'Name is required');
            hasErrors = true;
        } else {
            setSuccess(name);
        }

        if (email.value.trim() === '') {
            setError(email, 'Email is required');
            hasErrors = true;
        } else if (!isValidEmail(email.value.trim())) {
            setError(email, 'Provide a valid email address');
            hasErrors = true;
        } else {
            setSuccess(email);
        }

        if (preferred_date.value.trim() === '') {
            setError(preferred_date, 'Date is required');
            hasErrors = true;
        } else if (preferred_date.value.length !== 10) {
            setError(preferred_date, 'Set date as YYYY-MM-DD');
            hasErrors = true;
        } else {
            setSuccess(preferred_date);
        }

        if (preferred_locations.value.trim() === '') {
            setError(preferred_locations, 'location is required');
            hasErrors = true;
        } else {
            setSuccess(preferred_locations);
        }

        if (phone.value.trim() === '') {
            setError(phone, 'phone is required');
            hasErrors = true;
        } else if (phone.value.length !== 10) {
            setError(phone, 'should contain 10 digits');
            hasErrors = true;
        } else {
            setSuccess(phone);
        }

        if (package_types.value.trim() === '') {
            setError(package_types, 'location is required');
            hasErrors = true;
        } else {
            setSuccess(package_types);
        }

        if (event_types.value.trim() === '') {
            setError(event_types, 'location is required');
            hasErrors = true;
        } else {
            setSuccess(event_types);
        }


        return !hasErrors; // Return true if there are no validation errors
    };
});
