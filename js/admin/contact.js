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


