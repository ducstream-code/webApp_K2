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

    document.getElementById('order_detail_container').style.display="block"
    document.getElementById('grey_background').style.display="block"

    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState ===  4 ){
            const data = req.response;
            document.getElementById('order_detail_container').innerHTML=data;


        }
    };
    req.open('GET', '../php/admin/getOrderDetails.php?id_order='+id);
    req.send();

}

function closeOrderDetail(){
    document.getElementById('order_detail_container').style.display="none"
    document.getElementById('grey_background').style.display="none"
}

function deleteOrder(id_order){
    if (confirm('Voulez vous supprimer cette commande ? ')) {
        // Save it!
        const req = new XMLHttpRequest();
        req.onreadystatechange = function()  {
            if(req.readyState === 4 ){
                const data = req.response;
                if(data == "ok") {
                    document.getElementById('order_' + id_order).remove();
                }
            }
        };
        req.open('GET', '../php/admin/deleteOrder.php?id_order='+id_order);
        req.send();
    } else {
        // Do nothing!
    }
}
