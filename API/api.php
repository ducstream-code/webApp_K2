<?php

function getProducts(){
    echo "all product list";
    $pdo = getConnexion();
}

function getProductByCategory($category){
    echo "product list by category";
}

function getProductById($id){
    echo "product by id";
}

function getConnexion(){
    return new PDO("mysql:host=localhost;dbname=zouzou;charset=utf8","root","");
}