

let offerOffset=0;

let productOffset=0;
function loadOffers(){
        const req = new XMLHttpRequest();
        req.onreadystatechange = function()  {
            if(req.readyState === 4 ){
                const data = req.response;
                const div = document.getElementById('offers_display');
                div.innerHTML = data;
            }
        };
        req.open('POST', '../php/offer_page/offer_load.php?offset='+offerOffset);
        req.send();

}

function moreOffers(){
    const div = document.getElementById('offers_display');
    div.innerHTML="";

    offerOffset+=8
    setTimeout(loadOffers,500)
}
function lessOffers(){
    const div = document.getElementById('offers_display');
    div.innerHTML="";

    offerOffset-=8
    setTimeout(loadOffers,500)
}

function loadProducts(){
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            const data = req.response;
            const div = document.getElementById('shop_display');
            div.innerHTML = data;
        }
    };
    req.open('POST', '../php/offer_page/load_products.php?offset='+productOffset);
    req.send();

}

function moreProducts(){
    const div = document.getElementById('shop_display');
    div.innerHTML="";
    productOffset+=8
    setTimeout(loadProducts,500)
}
function lessProducts(){
    const div = document.getElementById('shop_display');
    div.innerHTML="";

    productOffset-=8
    setTimeout(loadProducts,500)
}
