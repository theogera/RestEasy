function validateForm() {
    const employeeCode = document.getElementById('userPropertiesEmployeeCode').value;
    // Create Array with Digits on employeeCode
    const digitsArray = employeeCode.split('').filter(char => !isNaN(char) && char !== ' ');
    // Check If Number Has 7 Or Less Digits
    if (employeeCode.trim() === "" || digitsArray.length === 0 || digitsArray.length > 7 || employeeCode.length !== digitsArray.length) {
        alert("Please enter a valid Employee Code (numbers only and up to 7 digits).");
        return false;
    }
    return true;
}