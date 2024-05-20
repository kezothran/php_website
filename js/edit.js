function validateForm() {
    var name = document.forms["staffForm"]["name"].value;
    var email = document.forms["staffForm"]["email"].value;
    var phone = document.forms["staffForm"]["phone"].value;
    var address = document.forms["staffForm"]["address"].value;
    var errorMessage = "";

    if (name.trim() === "") {
        errorMessage += "Name is required.\n";
    }
    if (email.trim() === "") {
        errorMessage += "Email is required.\n";
    } else if (!isValidEmail(email)) {
        errorMessage += "Invalid email format.\n";
    }
    if (phone.trim() === "") {
        errorMessage += "Phone is required.\n";
    } else if (!isValidPhone(phone)) {
        errorMessage += "Phone must be a valid integer.\n";
    }
    if (address.trim() === "") {
        errorMessage += "Address is required.\n";
    }

    if (errorMessage !== "") {
        alert(errorMessage);
        return false;
    }

    return true;
}

// Function to validate email format
function isValidEmail(email) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}

// Function to validate phone as integer
function isValidPhone(phone) {
    var phonePattern = /^\d+$/; // Use \d to match digits
    return phonePattern.test(phone);
}
