function addToCart(uid,pid){

        const req = new XMLHttpRequest();
        req.onreadystatechange = function()  {
            if(req.readyState === 4 ){
                data = req.response
                document.getElementById('addToCartButton').innerHTML="Ajouté au panier"
                document.getElementById('addToCartButton').setAttribute("onclick", "");
                window.location='./cart.php'
            }
        };
        req.open('GET', '../php/addToCart.php?uid='+uid+'&pid='+pid);
        req.send();


}
