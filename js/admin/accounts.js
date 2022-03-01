function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function translateElement(){
    document.getElementById('sliderMain').style.transform="translateX(0px)"
}

function translateElement100(){
    document.getElementById('sliderMain').style.transform="translateX(100%)"
}

function showSlideOver(){
    document.getElementById('slidershowcontainer').style.display='block'
    setTimeout(translateElement,100);

    document.getElementById('body').style.overflow='hidden';
}
function hideSlideOver(){
    setTimeout(translateElement100,0);
    sleep(500).then(() => {
        document.getElementById('slidershowcontainer').style.display='none'

    });
    document.getElementById('body').style.overflow='auto';
}

function addAccount(){
        let name = document.getElementById('clientName').value;
        let firstname = document.getElementById('clientFirstname').value;
        let email = document.getElementById('clientEmail').value;
        let password = document.getElementById('clientPassword').value;

        var formData = new FormData();
        formData.append('email',email);
        formData.append('name',name);
        formData.append('firstname',firstname);
        formData.append('password',password);


        const req = new XMLHttpRequest();
        req.onreadystatechange = function()  {
            if(req.readyState === 4 ){
                const data = req.response;
                if(data == 'ok'){
                    location.reload()
                }else{
                    document.getElementById('addCompanyResponse').innerHTML = data;
                }
            }
        };
        req.open('POST', '../php/admin/addAccount.php');
        req.send(formData);

}
