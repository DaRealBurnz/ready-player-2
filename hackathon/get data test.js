const xhttp = new XMLHttpRequest();
xhttp.onload = function() {
    document.getElementById('users').innerHTML = this.responseText;
}
xhttp.open("GET", "fetchUsrs.php");
xhttp.send();

function getUsrData(id = "") {
    const usrData = new XMLHttpRequest();
    usrData.onload = function() {
        document.getElementById('table').innerHTML = this.responseText;
    }
    if (id === "") {
        usrData.open("GET", "fetchUsrData.php");
    } else {
        usrData.open("GET", "fetchUsrData.php?q="+id);
    }
    usrData.send();
}