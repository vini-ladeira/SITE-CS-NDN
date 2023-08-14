<?php

/*
 * This is a very simple example of usage CSstats class
 */

// include class
require_once("../class/csstats.class.php");

// create CSstats object
$stats = new CSstats('csstats0x0b.dat');

$q = 'kajoj';
if (isset($_GET['q']))
	$q = $_GET['q'];

echo '<form method="get">Search player '.
		'<input type="text" name="q" value="'.htmlentities($q).'"/> '.
		'<input type="submit" value="Search" /></form>';

echo '<b>Search result by strict match:</b><br />';
foreach ($stats->searchByNick($q) as $player) 
	echo htmlentities($player['nick'])." position {$player['rank']}<br />\n";
		
echo '<hr /><b>Search result by regexp match:</b><br />';
foreach ($stats->searchByNick('/'.preg_replace('/[^\d\w]/', '', $q).'/', true) as $player) 
	echo htmlentities($player['nick'])." position {$player['rank']}<br />\n";
