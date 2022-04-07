function validateEmail(id) {
    let mail = document.getElementById('email').value;
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            data = req.response
            if (data == 'ok') {
                document.getElementById('mailRes2').innerHTML = data
            } else {
                document.getElementById('mailRes').innerHTML = data
            }
        }
    };
    req.open('GET', '../php/changeMail.php?mail=' + mail + "&id=" + id);
    req.send();
}

function validatePassword(id) {
    const pass = document.getElementById('password').value;
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            data = req.response
            if (data == 'ok') {
                document.getElementById('passRes2').innerHTML = data
            } else {
                document.getElementById('passRes').innerHTML = data
            }
        }
    };
    req.open('GET', '../php/changePass.php?password=' + pass + "&id=" + id);
    req.send();
}
