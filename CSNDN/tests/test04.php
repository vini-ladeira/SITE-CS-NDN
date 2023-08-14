<?php
/*
 * This is example of Export usage of CSstats class
 */

// include class
require_once("../class/csstats.class.php");

// create CSstats object
$stats = new CSstats('csstats0x0b.dat');

//create DB object
$dbh = new PDO('sqlite:/tmp/test.db');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//create table
$dbh->exec("CREATE TABLE IF NOT EXISTS players (nick string, kills int, deaths int)");

//export nick, kills and deaths to table 'players' into samename fields
if ($stats->export($dbh, array(
	'table' => 'players',
	'fields' => array(
		'nick' => 'nick',
		'kills' => 'kills',
		'deaths' => 'deaths'
	),
	'key' => 'nick'
))) echo '<br /><b>Export to DB success</b><br />';

// make a simple DB query
echo '<div style="border:1px solid black;">Result of simple query:<br /><pre>';
foreach($dbh->query("SELECT * FROM players WHERE nick LIKE '%kajoj%'") as $row)
	print_r($row);
echo '</pre></div>';

unset($dbh);
unlink('/tmp/test.db');

//export to txt file
if ($stats->export('/tmp/csstats.txt', array(
	'filetype' => "txt",
	'delimiter' => "\t",
	'fields' => CSstats::$player_info_fields
))) echo '<br /><b>Export to TXT file success</b><br />';

//export to csv file
if ($stats->export('/tmp/csstats.csv', array(
	'filetype' => "csv",
	'delimiter' => ";",
	'enclosure' => '"',
	'fields' => array('nick', 'kills', 'deaths')
))) echo '<br /><b>Export to CSV file success</b><br />';

