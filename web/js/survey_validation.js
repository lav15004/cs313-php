function isValid() {
    alert('it ran');
    if (document.forms['bed'].value == ""
        || document.forms['clown'].value == ""
        || document.forms['catdog'].value == ""
        || document.forms['sing'].value == ""
        || document.forms['nightlight'].value == ""
    ) {
        alert('Error: All survey questions must be answered.');
        return false;
    }
    alert('it ran');
    return true;
}