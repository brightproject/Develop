<?php
//File written by Ryan Campbell
//June 2005 - Particletree


//include the class
include "cDatabase.php";

//create an object for the class.  Constructor takes the database connection info
$cDB = new cDatabase(host, user, password, database);

//test insert user
$names = array("firstName", "lastName", "age");
$values = array("john", "campbell", "22");
$cDB->sqlInsert($names, $values, "tPersons");

//test update user
$names = array("firstName", "lastName");
$values = array("ryan", "smith", "22");
$cDB->sqlUpdate($names, $values, "tPersons", "WHERE lastName = 'campbell'");

//test select query
$rs = $cDB->ExecuteReader("SELECT * FROM tPersons");
while ($row = mysql_fetch_array($rs, MYSQL_ASSOC)) {
  echo $row['firstName'];
}

//kill our objects
settype($rs, "null");
settype($cDB, "null");

?>