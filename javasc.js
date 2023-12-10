function checkEligibility() {
    const firstName = document.getElementById('Fname').value;
    const lastName = document.getElementById('Lname').value;
    const enrollmentNumber = document.getElementsByName('enrol')[0].value;
    const mobileNumber = document.getElementsByName('phone')[0].value;
    const grade = parseFloat(document.getElementsByName('grade')[0].value);
    const annualIncome = parseFloat(document.getElementsByName('annualIncome')[0].value);
    
    // check eligibility
    let eligibilityResult = '';
    if (grade >= 90 && annualIncome < 250000) {
        eligibilityResult = `Congratulations ${firstName} ${lastName}! You are eligible for the scholarship.`;
    } else {
        eligibilityResult = `Sorry ${firstName} ${lastName}, you are not eligible for the scholarship.`;
    }

    // Display result
    document.getElementById('result').innerHTML = eligibilityResult;

    // Prevent the form from submitting
    return false;
}

function goToAdminLogin() {
    window.location.href = 'admin_login.html';
}