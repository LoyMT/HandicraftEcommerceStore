<?php 

session_start();
include("db.php");
include("functions.php");

switch($_REQUEST['sAction']){

    default :

    getProducts();

    break;

    case'getPaginator';

    getPaginator();

    break;

}

?> 