function sendForm(){

    //on récupere les valeurs des inputs.
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('message').value;

    //on fait une requete ajax au fichier php
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            data = req.response;
            if (data === "MESSAGE ENVOYÉ") {
                document.getElementById('formRes').innerHTML = data;
                document.getElementById('name').value = '';
                document.getElementById('email').value = '';
                document.getElementById('message').value = '';
            }else{
                document.getElementById('formRes').innerHTML = data;
            }

        }
    };
    // on défini la method GET, et le fichier php qu'on veut appeller
    req.open('GET', '../php/contactForm.php?name='+name+'&email='+email+'&message='+message);
    req.send();


}
