<?php


?>
<style>
    header{
        position: absolute;
        background-color: #ECECEC;
        width: 100%;
        height: 75px;
        display: flex;
        flex-direction: row;
        place-items: center;
        z-index: 30;
    }
    .header_logo{
        width: 15%;
        padding-left: 5%;

    }
    .header_logo img{
        height: 60px;
    }
    .header_logo img:hover{
        cursor: pointer;
    }

    .header_buttons{
        padding-right: 5%;
        padding-left: 5%;
        height: 50px;
        width: 75%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        place-items: center;

    }
    .header_buttons button{
        background-color: #100A57;
        font-size: 1rem;
        height: 40px;
        color: #B2DDAE;
        border-radius: 20px;
        padding-right: 50px;
        padding-left: 50px;
        border-style: none;
    }

    .header_buttons button:hover{
        background-color: #B2DDAE;
        color: #100A57;
    }

    .header_login{
        padding: 10px;
        height: 100%;
        width: 10%;
        border-left: solid 1px black;
        display: flex;
        flex-direction: column;

    }
    .header_login button{
        background-color: transparent;
        border-style: none;
        border-radius: 25px;

    }
    .header_login button:hover{
        color: #B2DDAE;
        background-color: #100A57;
    }
    .cart_container
    {

        display: none;
        top: 80px;
        z-index: 50;
        position: fixed;
        width: 100%;

        height: 150px;
        flex-direction: row-reverse;
    }
    .cart_result
    {
        padding: 10px;
        position: fixed;
        z-index: 100;
        width: 300px;
        height: 350px;
        background: rgba(128, 128, 128, 0.6);
        margin-right: 15px;

    }
    .cart_result h1
    {
        font-size: 32px;
        margin-top: 18px;
        height: 50px;
        text-align: center;
    }
    .cart_result hr
    {
        margin-bottom: 15px;
    }
    .cart_result table
    {
        width: 100%;
    }
    .cart_result table tr td img
    {
        height: 35px;
    }
    .cart_result table tr
    {
        margin-bottom: 25px;
    }
</style>
<header>
    <div class="header_logo">
        <img onclick="window.location='../index.php'" src="../assets/images/logos/logo-500px.png" class="logo">
    </div>
    <div class="header_buttons">
        <button onclick="window.location='../index.php'" >Accueil</button>
        <button onclick="window.location='../pages/my_card.php'">Ma carte</button>
        <button onclick="window.location='../pages/offers.php'">Nos offres</button>
        <button onclick="window.location='../pages/about.php'">A propos</button>
        <button onclick="window.location='../pages/contact.php'">Contact</button>
    </div>
    <div class="header_login">
        <?= checkLoggedUser() ? '<button onclick="window.location=\'/pages/profile.php\'">Mon compte</button><button onclick="window.location=\'/includes/logout.php\'">Déconnexion</button><button onclick="window.location=\'../pages/cart.php\'" onmouseout="hideCart()" onmouseover="displayCart()">Mon panier</button>'  : '<button onclick="window.location=\'../pages/login.php\'">Se connecter</button>
        <button onclick="window.location=\'../pages/register.php\'">S\'inscrire</button>' ?>
    </div>

</header>
<div id="cart_container" class="cart_container" >
    <div class="cart_result">
        <h1>Votre Panier</h1>
        <hr>
        <table>
            <?php

            $stmt = $db->prepare("SELECT * FROM cart WHERE id_user = :uid LIMIT 6");
            $stmt->bindParam(':uid',$uid);
            $stmt->execute();
            $carts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($carts as $key => $cart){
                $stmt = $db->prepare("SELECT name, image FROM products WHERE id = :pid");
                $stmt->bindParam(':pid',$cart['id_product']);
                $stmt->execute();
                $cartProduct = $stmt->fetch();
                ?>
                <tr>
                    <td><img src="<?=$cartProduct['image'] ?>" alt="image"></td>
                    <td><?=$cartProduct['name'] ?></td>
                    <td><?=$cart['quantity'] ?></td>
                </tr>
                <?php
            }
            ?>

        </table>
    </div>

</div>
<script>
    function displayCart(){
        document.getElementById('cart_container').style.display='flex'
    }
    function hideCart(){
        document.getElementById('cart_container').style.display='none'

    }
</script>
