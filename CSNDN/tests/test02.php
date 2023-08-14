<?php
/*
 * This is example of interator usage of CSstats class
 */

// include class
require_once("../class/csstats.class.php");

// create CSstats object
$stats = new CSstats('csstats0x0b.dat');

echo "<table border='1'>\n<tr><th>Position</th><th>Nick</th><th>kills</th><th>deaths</th></tr>\n";

foreach ($stats as $position => $player)
	echo "<tr><td>{$position}</td>".
		"<td>".htmlentities($player['nick'])."</td>".
		"<td>{$player['kills']}</td>".
		"<td>{$player['deaths']}</td></tr>";

echo "</table>";

