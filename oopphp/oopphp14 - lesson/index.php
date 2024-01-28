<?php
include_once "abstract/paymenttypes.abstract.php";
include_once "classes/BuyProduct.class.php";

$buy_product = new BuyProduct();
echo $buy_product->get_payment();