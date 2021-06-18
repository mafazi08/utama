<?php 
session_start();
if(! isset($_SESSION['none']))
{
  header('location:view/index.html');
}
?>