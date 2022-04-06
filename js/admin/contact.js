//let limit = 5
let offset = 0

function nextPage(){
   // limit+=5;
    offset+=5;
    console.log(offset);
    loadContact()
}

function prevPage(){
   // limit-=5;
    offset-=5;
    if(offset < 0){
        offset = 0
    }
    console.log(offset);
    loadContact()
}

function loadContact() {

    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            const data = req.response;
            document.getElementById('tab_body').innerHTML = data;

        }
    };
    req.open('GET', '../php/admin/getContact.php?off='+offset);
    req.send();
}

function contactDetails(id){
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            const data = req.response;
            document.getElementById('contactDetail').style.display='block'
            document.getElementById('grey_background').style.display='block'
            document.getElementById('body').style.overflowX='hidden'
            document.getElementById('body').style.overflowY='hidden'

            document.getElementById('contactDetail').innerHTML = data;

        }
    };
    req.open('GET', '../php/admin/contactDetails.php?id='+id);
    req.send();
}

function closeDetails(){
    document.getElementById('contactDetail').style.display='none'
    document.getElementById('grey_background').style.display='none'
    document.getElementById('body').style.overflowX='visible'
    document.getElementById('body').style.overflowY='visible'
}

function noteRead(id){
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState === 4) {
            document.getElementById('status_'+id).innerHTML= '<p><span style="color: green">●</span>Answered</p>'


        }
    };
    req.open('GET', '../php/admin/contactRead.php?id='+id);
    req.send();
}
