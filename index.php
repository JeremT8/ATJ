<?php
session_start();
session_regenerate_id(true);

// Configuration de l'application
define("DSN", "mysql:host=127.0.0.1;dbname=atj_database;charset=utf8");
define("DB_USER", "root");
define("DB_PASS", "");

// inclusion des bibliothèques
require "lib/framework.php";

