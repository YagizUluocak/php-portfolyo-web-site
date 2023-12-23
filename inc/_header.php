<?php
require_once ('./admin/classes/db.class.php');
include "./admin/classes/functions.class.php";
?>

<?php

$tablo = "ayar";
$tablo_id = "ayar_id";
$id = 1;

$ayar = new veriGetir();
$sayfa = "ayar";
$genelayar = $ayar->veriIdGetir($tablo, $tablo_id, $id);
?>

<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet"
    />

    <title><?php echo $genelayar->ayar_isim?></title>
<!--
Reflux Template
https://templatemo.com/tm-531-reflux
-->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"  />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-style.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
</head>