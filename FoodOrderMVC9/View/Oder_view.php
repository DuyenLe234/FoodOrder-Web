<?php
session_start();
require_once '../Controller/TaiKhoanController.php';
require_once '../Model/TaiKhoanModel.php';

require_once '../Model/ProfileModel.php';
$model = new TaiKhoanModel(); // Initialize $model here
$controller = new TaiKhoanController($model);
// Ensure the user is logged in
$profilemodel = new ProfileModel();


?>