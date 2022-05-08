<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("./api.php");
try{
    if(!empty($_GET['demand'])){
        $url = explode("/", filter_var($_GET['demand'],FILTER_SANITIZE_URL));
        switch ($url[0]){
            case "produit":
            case "product" :
                if(!empty($url[1]))
                    getProductById($url[1]);
                else
                    throw new Exception ("no id");

                break;
            case "produits":
            case "products" :
                if(empty($url[1])){
                    getProducts();
                }else
                {
                    getProductByCategory($url[1]);
                }
                break;

            case "users":
            case "utilisateurs":
                if(empty($url[1]))
                    getUsers();
                else
                    throw new Exception ("Bad request, check url");
            break;

            case "user":
            case "utilisateur":
                if(!empty($url[1]))
                    getUserById($url[1]);
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "offers":
            case "offres":
                if(empty($url[1]))
                    getOffers();
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "offer":
            case "offre":
                if(!empty($url[1]))
                    getOfferByID($url[1]);
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "clientscompanies":
            case "entreprisesclientes":
                if(empty($url[1]))
                    getCompanies();
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "clientscompany":
            case "entreprisecliente":
                if(!empty($url[1]))
                    getCompanyByID($url[1]);
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "dellUser":
                if(!empty($url[1]))
                    dellUserByID($url[1]);
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "dellOffer":
                if(!empty($url[1]))
                    dellOfferByID($url[1]);
                else
                    throw new Exception ("Bad request, check url");
                break;

            case "test":
                test();
                break;


            default :   throw new Exception ("Bad request, check url");
        }
    }else{
        throw new Exception ("Probleme de récuperation de données");
    }

}catch (Exception $e){
    $error =[
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($error);
}
