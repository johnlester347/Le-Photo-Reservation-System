<?php
// Always start this first
session_start();

session_destroy();

header("location:index.php");
?>