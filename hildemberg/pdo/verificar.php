<?php 
require_once("../biblioteca.php"); 
session_start(); //inicia a seção 
if(!isset($_SESSION[$email])){ //!sset - se não esxistir {...}
    $reader('location:' .   $url_sistema); //manda para o index.php
    exit();
}