<?php
session_start();
if(array_key_exists('add_tovar', $_GET))
$_SESSION['cart'][] = $_GET['add_tovar'];
