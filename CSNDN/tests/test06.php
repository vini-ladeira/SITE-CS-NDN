<?php

/*
 * Example of MySQL Export
 */

// include class
require_once("../class/csstats.class.php");

// create CSstats object
$stats = new CSstats('./csstats0x0b.dat');

//create DB object
$dbh = new PDO('mysql:host=localhost;dbname=test', 'username', 'password');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//create table
$dbh->exec("CREATE TABLE IF NOT EXISTS `players` (
        `nick` VARCHAR( 32 ) NOT NULL ,
        `kills` INT NOT NULL ,
        `deaths` INT NOT NULL ) ");

//export nick, kills and deaths to table 'players' into samename fields
if ($stats->export($dbh, array(
        'table' => 'players',
        'fields' => array(
                'nick' => 'nick',
                'kills' => 'kills',
                'deaths' => 'deaths'
        ),
        'key' => 'nick'
))) echo "Export to DB success.\n\n";

// make a simple DB query
echo "Result of simple query:\n";
foreach($dbh->query("SELECT * FROM players WHERE nick LIKE '%kajoj%'") as $row)
        print_r($row);
?> 