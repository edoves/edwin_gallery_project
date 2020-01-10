<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gallery_db');

// try {
//     $db = new PDO("mysql:host=localhost;dbname=gallery_db", "root", "");
// $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "," . DB_PASS);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// var_dump($db);
// } catch (Exception $e) {
// 	echo "Could not connect to the database.";
// 	exit;
// }


// try {
// 	$results = $db->query("SELECT * FROM users");
// } catch (PDOException $e) {
// 	echo "Data could not retrieve from the database";
// 	exit;
// };


// $users = $results->fetchAll(PDO::FETCH_ASSOC);

// var_dump($users);