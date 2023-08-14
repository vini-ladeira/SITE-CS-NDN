<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=
	, initial-scale=1.0">
	<title>Rank NDN</title>
	<style type="text/css">
		table{
			border="1";
			align="center";
			width="300";
			height="100";
		}
		td{
		background-color: gray;
		}
		tr{
		color: black;
		background-color: yellow;
		}
		body{
			background-color: silver;
		}
		img{
			max-width:200px;
			max-height:150px;
			width: auto;
			height: auto;
		}
	</style>
</head>
<body>
	<img src="logo fat-01_SMALL.png">
	<?php
	/*
	* This is example of array access usage of CSstats class
	*/

	// include class
	require_once("../class/csstats.class.php");

	// create CSstats object
	//$stats = new CSstats('C:\Games\Counter-Strike 1.6 - v9 HD\v9\cstrike\addons\amxmodx\data\csstats.dat');
	$stats = new CSstats('csstats0x0b.dat');

	echo "<table border='1'>\n<tr><th>Posição</th><th>Nick</th><th>Frag</th><th>Mortes</th><th>Headshots</th></tr>\n";

	for ($i = 1; $i<= $stats->countPlayers(); $i++){
	if($stats[$i]['nick'] != "<Warrior> Player" && $stats[$i]['nick'] != "<CS Revo 2K18> Player"){
		echo "<tr><td>{$i}</td>".
			"<td>".htmlentities($stats[$i]['nick'])."</td>".
			"<td>{$stats[$i]['kills']}</td>".
			"<td>{$stats[$i]['deaths']}</td>
			<td>{$stats[$i]['headshots']}</td>
			</tr>";
		}
	}
	echo "</table>";
	?>

	<p><a href="https://www.instagram.com/ndn.play/">Nos siga no instagram @ndn.play</a></p>

	<?php
$max_headshots = 0;
$max_headshots_player = "";
for ($i = 1; $i<= $stats->countPlayers(); $i++) {
    if ($stats[$i]['headshots'] > $max_headshots) {
        $max_headshots = $stats[$i]['headshots'];
        $max_headshots_player = $stats[$i]['nick'];
    }
}
echo "<p>{$max_headshots_player} tem o maior número de Headshots, com {$max_headshots} acertos</p>";
?>

<?php
$max_kills = 0;
$max_kills_player = "";
for ($i = 1; $i<= $stats->countPlayers(); $i++) {
    if ($stats[$i]['kills'] > $max_kills) {
        $max_kills = $stats[$i]['kills'];
        $max_kills_player = $stats[$i]['nick'];
    }
}
echo "<p>{$max_kills_player} tem o maior Frag, com {$max_kills} acertos</p>";
?>

<?php
$max_deaths = 0;
$max_deaths_player = "";
for ($i = 1; $i<= $stats->countPlayers(); $i++) {
    if ($stats[$i]['deaths'] > $max_deaths) {
        $max_deaths = $stats[$i]['deaths'];
        $max_deaths_player = $stats[$i]['nick'];
    }
}
echo "<p>{$max_deaths_player} morreu mais vezes, com {$max_deaths} mortes</p>";
?>

</body>
</html>



