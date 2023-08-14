<?php

/*
 * This is a very simple example of usage CSstats class
 */

// include class
require_once("../class/csstats.class.php");

// create CSstats object
$stats = new CSstats('csstats0x0b.dat',15);

echo "TOP15<br/>\n";

// loop first 15 players
for ($i=1; $i<=15; ++$i) {
	//get information about $i player
	$player = $stats->getPlayer($i);
	//print nickname
	echo $i.". ".htmlentities($player['nick'])."<br />\n";
}
