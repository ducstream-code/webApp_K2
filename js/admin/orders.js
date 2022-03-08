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


function orderDetails(id){
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState ===  4 ){
            const data = req.response;

        }
    };
    req.open('GET', '../php/admin/getOrderDetails.php?id_order='+id);
    req.send();

}