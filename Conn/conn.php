<?php
function getConn(){
$host = "host=127.0.0.1";
$port = "port=5432";
$dbname = "dbname=postgres";
$credentials = "user=postgres password=1318";

$db = pg_connect( "$host $port $dbname $credentials" );

return $db;
}

?>