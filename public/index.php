<?php
/*
 * @Author : Gourav Tiwari
 * @Purpose : To start session, to add app config, db config and router file  
 * @Date : 14/04/2023
 */
session_start();
include 'C:\xampp\htdocs\LMS_app\app\config\app_config.php'; // including app configaration file 
include ROOT_DIR . '\helper.php'; //including helper file
include ROOT_DIR_CONTROLLER . '\user_controller.php'; // including user controller file
include ROOT_DIR_CONTROLLER . '\admin_controller.php'; //including admin controller file
include ROOT_DIR_CONTROLLER . '\logout_controller.php'; //including logout controller file
include ROOT_DIR_CONTROLLER . '\signup_controller.php'; //including signup controller file
include ROOT_DIR_CONTROLLER . '\login_controller.php'; //including login controller file
include ROOT_DIR_MODEL . '\admin_dashboard_query.php'; //including admin dashboard query file
include ROOT_DIR_MODEL . '\book_query.php'; //including book query file
include ROOT_DIR_MODEL . '\login_query.php'; //including login query file
include ROOT_DIR_MODEL . '\signup_query.php'; //including signup query file
include ROOT_DIR . '\router\router.php'; //including router file
include ROOT_DIR . '\config\db_config.php'; //including db config file
new Router(); // calling constructor of Router class
?>