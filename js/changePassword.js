function changePass(hash){
    let pass = document.getElementById('password').value;
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            const data = req.response;
            if(data == "ok"){
                window.location="../index.php?message=Mot de passe change&type=success";
            }else{
                document.getElementById('passRes').innerText=data;
            }
        }
    };
    req.open('GET', '../php/changePassword.php?hash='+hash+'&password='+pass);
    req.send();
}
