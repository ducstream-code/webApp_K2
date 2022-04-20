<?php
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
