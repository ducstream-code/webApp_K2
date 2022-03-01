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

function addCompany(){
    let name = document.getElementById('companyName').value;
    let earnings = document.getElementById('companyEarnings').value;
    let email = document.getElementById('companyEmail').value;
    let password = document.getElementById('companyPassword').value;

    var formData = new FormData();
    formData.append('email',email);
    formData.append('name',name);
    formData.append('earnings',earnings);
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
    req.open('POST', '../php/admin/addCompany.php');
    req.send(formData);
}