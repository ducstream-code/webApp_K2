function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


function editCartProduct(id,uid,pid,fun){
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            data = req.response;
            if(data === 'deleted'){
                document.getElementById('cartLine_'+id).remove()
            }
            else if (data==='added'){
                //increase quantity
                 let  inValue = parseInt(document.getElementById('quantity_'+id).innerText)
                document.getElementById('quantity_'+id).innerText = inValue + 1

                //increase price
                let inPrice = parseFloat(document.getElementById('price_'+id).innerText)
                inValue+= 1
                console.log(inPrice*inValue)
                document.getElementById('total_'+id).innerText= inPrice*inValue


            }
            else if(data === 'reduced'){
                let  inValue = parseInt(document.getElementById('quantity_'+id).innerText)
                document.getElementById('quantity_'+id).innerText = inValue - 1

                //reduce price
                let inPrice = parseFloat(document.getElementById('price_'+id).innerText)
                inValue-= 1
                console.log(inPrice*inValue)
                document.getElementById('total_'+id).innerText= inPrice*inValue
            }

        }
    };
    req.open('GET', '../php/cartFunctions.php?uid='+uid+'&pid='+pid+'&fun='+fun);
    req.send();
}


function translateElement(){
    document.getElementById('sliderMain').style.transform="translateX(0px)"
}

function translateElement100(){
    document.getElementById('sliderMain').style.transform="translateX(100%)"
}

function showSlideOver(uid){
    document.getElementById('slidershowcontainer').style.display='block'
    setTimeout(translateElement,100);
    document.getElementById('body').style.overflow='hidden';

    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            data = req.response
            document.getElementById('order_total').innerText = data+'€'

        }
    };
    req.open('GET', '../php/getTotal.php?uid='+uid);
    req.send();
}
function hideSlideOver(){
    setTimeout(translateElement100,0);
    sleep(500).then(() => {
        document.getElementById('slidershowcontainer').style.display='none'

    });
    document.getElementById('body').style.overflow='auto';
}

function goCheckout(uid){

    let address = document.getElementById('orderAddress').value;
    let city = document.getElementById('orderCity').value;
    let name = document.getElementById('orderName').value;
    let firstname = document.getElementById('orderFirstname').value;
    let mail = document.getElementById('orderEmail').value;
    let postCode = document.getElementById('orderPC').value;
    //let phone = document.getElementById('orderPhone').value;

    let resLocation = document.getElementById('goToCheckoutRes')
    const req = new XMLHttpRequest();
    req.onreadystatechange = function()  {
        if(req.readyState === 4 ){
            data = req.response
            if(data === 'ok'){
                window.location='../stripe/checkout.php'
            }else{
                resLocation.innerHTML= data;
            }

        }
    };
    req.open('GET', '../php/createOrder.php?uid='+uid+'&address='+address +'&city='+city +'&name='+name +'&firstname='+firstname +'&mail='+mail +'&PC='+postCode+'&phone=01');
    req.send();
}