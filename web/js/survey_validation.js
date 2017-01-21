function isValid() {
    if (document.forms["cart"]['fname'].value == ""
        || document.forms["cart"]['lname'].value == ""
        || document.forms["cart"]['streetaddress'].value == ""
        || document.forms["cart"]['city'].value == ""
        || document.forms["cart"]['state'].value == ""
        || document.forms["cart"]['zip'].value == ""
        || document.forms["cart"]['phonenum'].value == ""
        || document.forms["cart"]['ccnum'].value == ""
        || document.forms["cart"]['expiredate'].value == ""
        || document.forms["cart"]['ccvnum'].value == ""
    ) {
        alert('Error: All Customer and Payment info form fields must be filled out.');
        return false;
    }
    return true;
}