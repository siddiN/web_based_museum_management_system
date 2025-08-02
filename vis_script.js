document.getElementById('visitorForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission until validation is complete

    let name = document.getElementById("name").value.trim();
    let contact = document.getElementById("contact").value.trim();
    let password = document.getElementById("password").value.trim();
    let confirmPassword = document.getElementById("confirmPassword").value.trim();

    // Name validation (Only alphabets, no numbers or special characters)
    let nameRegex = /^[A-Za-z\s]+$/;
    if (name === "") {
        alert("Name field cannot be empty.");
        return;
    } else if (!nameRegex.test(name)) {
        alert("Name can only contain alphabets and spaces.");
        return;
    }

    // Contact number validation (Must be 10 digits, numeric only)
    let contactRegex = /^[0-9]{10}$/;
    if (contact === "") {
        alert("Contact number cannot be empty.");
        return;
    } else if (!contactRegex.test(contact)) {
        alert("Contact number must be exactly 10 digits and contain only numbers.");
        return;
    }

    // Password validation (At least 6 characters)
    if (password === "") {
        alert("Password field cannot be empty.");
        return;
    } else if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return;
    }

    // Confirm Password validation (Must match the previous password)
    if (confirmPassword === "") {
        alert("Confirm Password field cannot be empty.");
        return;
    } else if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }

    // If all validations pass
    alert("Form submitted successfully!");
    this.submit(); // Proceed with form submission
    this.reset(); // Clear the form after successful submission
});
