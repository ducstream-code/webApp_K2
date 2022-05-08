<?php
// DISPLAY ERRORS

function getProducts(){
    header('Content-type: application/json');
    include "db.php";
    $arrayProduct = [];
    $req = $db ->prepare("SELECT * from products");
    $req->execute();
    $products = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($products as $key => $product){
        $arrayProduct = getArr($product, $arrayProduct);
    }
    echo json_encode($arrayProduct);

}

function test(){
    echo json_encode("test");
}

function getProductByCategory($category){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    header('Content-type: application/json');
    include "db.php";
    $arrayProduct = [];
    $req = $db ->prepare("SELECT * FROM products WHERE categorie1 = :category");
    $req->bindParam(":category",$category);
    $req->execute();
    $products = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($products as $key => $product){
        $arrayProduct = getArr($product, $arrayProduct);
    }

    echo json_encode($arrayProduct);
}

function getProductById($id){
        header('Content-type: application/json');
        include "db.php";
        $arrayProduct = [];
        $req = $db ->prepare("SELECT * FROM products WHERE id = :id");
        $req->bindParam(":id",$id);
        $req->execute();
        $product = $req->fetch(PDO::FETCH_ASSOC);

    $arrayProduct = getArr($product, $arrayProduct);

    echo json_encode($arrayProduct);
    }

function getUsers(){
    header('Content-type: application/json');
    include "db.php";
    $arrayUsers = [];
    $req = $db ->prepare("SELECT * from users");
    $req->execute();
    $users = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($users as $key => $user){
        $arrayUsers = getArrUser($user, $arrayUsers);
    }
    echo json_encode($arrayUsers);
}

function getUserById($id){
    header('Content-type: application/json');
    include "db.php";
    $arrayUsers = [];
    $req = $db ->prepare("SELECT * FROM users WHERE id = :id");
    $req->bindParam(":id",$id);
    $req->execute();
    $user = $req->fetch(PDO::FETCH_ASSOC);

    $arrayUsers = getArrUser($user, $arrayUsers);
    foreach ($arrayUsers as $value){
        echo json_encode($value);
    }


}

function getOffers(){
    header('Content-type: application/json');
    include "db.php";
    $arrayOffers = [];
    $req = $db ->prepare("SELECT * from offers");
    $req->execute();
    $offers = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($offers as $key => $offer){
        $arrayOffers = getArrOffers($offer, $arrayOffers);
    }
    echo json_encode($arrayOffers);
}

function getOfferById($id){
    header('Content-type: application/json');
    include "db.php";
    $arrayOffers = [];
    $req = $db ->prepare("SELECT * FROM offers WHERE id = :id");
    $req->bindParam(":id",$id);
    $req->execute();
    $offer = $req->fetch(PDO::FETCH_ASSOC);

    $arrayOffers = getArrOffers($offer, $arrayOffers);

    echo json_encode($arrayOffers);
}

function getCompanyById($id){
    header('Content-type: application/json');
    include "db.php";
    $arrayCompanies = [];
    $req = $db ->prepare("SELECT * FROM clientscompanies WHERE id = :id");
    $req->bindParam(":id",$id);
    $req->execute();
    $company = $req->fetch(PDO::FETCH_ASSOC);
    $arrayCompanies = getArrCompany($company, $arrayCompanies);
    echo json_encode($arrayCompanies);
}
function getCompanies(){
    header('Content-type: application/json');
    include "db.php";
    $arrayCompanies= [];
    $req = $db ->prepare("SELECT * from clientscompanies");
    $req->execute();
    $companies = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach($companies as $key => $company){
        $arrayCompanies = getArrCompany($company, $arrayCompanies);
    }
    echo json_encode($arrayCompanies);
}


function getArrOffers($offer, array $arrayOffers)
{
    $arrayOffers[] = [
        "id" => $offer['id'],
        "price" => $offer['price'],
        "title" => $offer['title'],
        "description" => $offer['description'],
        "date" => $offer['date'],
        "expiration" => $offer['expiration'],
        "warehouse" => $offer['warehouse'],
        "type" => $offer['type'],
        "stock" => $offer['stock'],
        "image" => $offer['image'],
        "idReferer" => $offer['idReferer'],
    ];
    return $arrayOffers;

}

function getArrCompany($company, array $arrayCompanies)
{
    $arrayCompanies[] = [
        "id" => $company['id'],
        "name" => $company['name'],
        "earnings" => $company['earnings'],
        "email" => $company['email'],
        "password" => $company['password'],
        "verified" => $company['verified'],
        "role" => $company['role'],
        "mailsent" => $company['mailsent'],
        "mailreceived" => $company['mailreceived'],
        "clientregister" => $company['clientregistered'],

    ];
    return $arrayCompanies;

}

function dellUserById($uid){
    include "db.php";
    $stmt = $db->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id',$uid);
    $stmt->execute();
}

function dellOfferById($uid){
    include "db.php";
    $stmt = $db->prepare("DELETE FROM offers WHERE id = :id");
    $stmt->bindParam(':id',$uid);
    $stmt->execute();
}


function getArrUser($user, array $arrayUsers)
{
    $arrayUsers[] = [
        "id" => $user['id'],
        "username" => $user['username'],
        "firstname" => $user['firstname'],
        "nbOrders" => $user['nbOrders'],
        "email" => $user['email'],
        "phone" => $user['phone'],
        "adress" => $user['adress'],
        "password" => $user['password'],
        "status" => $user['status'],
        "registrationDate" => $user['registrationDate'],
        "idReferer" => $user['idReferer'],
        "role" => $user['role'],
        "solde" => $user['solde'],
    ];
    return $arrayUsers;

}
/**
 * @param $product
 * @param array $arrayProduct
 * @return array
 */
function getArr($product, array $arrayProduct)
{
    $arrayProduct[] = [
        "id" => $product['id'],
        "name" => $product['name'],
        "ugs" => $product['ugs'],
        "stock" => $product['stock'],
        "price" => $product['price'],
        "image" => $product['image'],
        "categorie1" => $product['categorie1'],
        "date" => $product['date'],
        "description" => $product['description'],
        "shortDesc" => $product['shortDesc'],
        "id_warehouse" => $product['id_warehouse'],
    ];
    return $arrayProduct;

}
