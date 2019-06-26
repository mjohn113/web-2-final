<?php
    require_once("php/dbconnection.function.php");

    session_start();
    if (!isset($_SESSION["usertype"])) {
		header('location: login.php');
    }
    if ($_SESSION["usertype"] != 2) {
        header("location: index.php");
    }

    $dbstring = "spUpdateUser(\"{$_GET["id"]}\", \"{$_GET["firstname"]}\", \"{$_GET["lastname"]}\", \"{$_GET["address"]}\", \"{$_GET["city"]}\", \"{$_GET["region"]}\", \"{$_GET["country"]}\", \"{$_GET["postal"]}\", \"{$_GET["phone"]}\", \"{$_GET["email"]}\", \"{$_GET["isadmin"]}\")";
    dbconnection($dbstring);
    header("location: adminEditUser.php?id={$_GET["id"]}");
?>