<?php
// Настройка Базы Данных
$sql_server = "localhost";
$sql_user = "root";
$sql_password = "";
$sql_database = "t3rkecorejz";

$sql_connection = new mysqli($sql_server, $sql_user, $sql_password, $sql_database);
$sql_connection->set_charset("utf8");

// Steam API Key
// https://steamcommunity.com/dev/apikey
$steam_api_key = "ya gei";
?>