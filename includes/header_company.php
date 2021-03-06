<?php
?>
<style>
    header{
        position: fixed;
        background-color: #ECECEC;
        top: 0;
        left: 0;
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
        height: 75px;
        width: 10%;
        border-left: solid 1px black;
        display: flex;
        flex-direction: column;
        justify-content: center;

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

</style>
<header>
    <div class="header_logo">
        <img onclick="window.location='../../index.php'" src="../assets/images/logos/logo.png"class="logo">
    </div>
    <div class="header_buttons">

        <button onclick="window.location='../../index.php'">Partie clients</button>

        <button onclick="document.getElementById('send_mail').style.display='block'">Ajouter des clients</button>
        <a href="../../assets/dl/LoyalityCard.apk">Application android</a>
        <a href="../../assets/dl/K2_Java.jar">Application java</a>
        <button onclick="window.location='../../pages/contact.php'">Contact</button>
    </div>
    <div class="header_login">
        <button onclick="window.location='/includes/logout.php'">Deconnexion</button>

    </div>
</header>
