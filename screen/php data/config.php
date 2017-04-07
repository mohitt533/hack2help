<?php
    // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'u141855940_h2h');
 
 $db = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

 if ( !$db ) {
  die("Database Connection failed : " . mysql_error());
 }
    header('Content-Type: text/html; charset=utf-8'); 
    session_start(); 
?>