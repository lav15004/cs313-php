function isValid() {
    alert('it ran');
    if (document.getElementById("bed").value == ""
        || document.getElementById("clown").value == ""
        || document.getElementById("catdog").value == ""
        || document.getElementById("sing").value == ""
        || document.getElementById("nightlight").value == ""
    ) {
        alert('Error: All survey questions must be answered.');
        return false;
    }
    alert('it ran');
    return true;
}