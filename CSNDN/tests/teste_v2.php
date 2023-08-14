<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rank NDN</title>
    <style>
        .container {
            max-width: 766px;
            margin: 0 auto 0 0;
        }

        #logoeinfos {
            height: 120px;
            background-color: yellow;
            overflow: hidden; 
            text-align: right;
            line-height: 0.2;
        }

        #tabela {
            width: 90%;
            max-height: 500px;
            overflow-y: auto;
            float: left;
            background-color: blue;
        }

        #medalhas {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            width: 10%;
            max-height: 500px;
            float: right;
            background-color: green;
            line-height: 0.2;
        }
        
        #medalha1 {
            background-image: url(HEADSHOT.png);
            background-size: cover;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px;
            line-height: 0.2;
            }
        
        #medalha2 {
            background: red;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #medalha3 {
            background: lightgreen;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #medalha4 {
            background-image: url(HEADSHOT_MAX.png);
            background-size: cover;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        #contato {
            clear: both;
            height: 40px;
            background-color: red;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container #logoeinfos p {
        font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="logoeinfos">
            <img src="logo fat-01_SMALL.png"style="float: left; margin-right: 10px; width: 120px;">
                <?php
                        echo "<p>Server não está respondendo</p>";
                        echo "<p>Server não está respondendo</p>";
                        echo "<p>Server não está respondendo</p>";
                        echo "<p>Server não está respondendo</p>";
                        echo "<p>Server não está respondendo</p>";

                ?> 
 </div>
        <div id="tabela"> 
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
        </div>
        <div id="medalhas"> 
            <div id="medalha1">
            <?php
            $max_headshots = 0;
            $max_headshots_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['headshots'] > $max_headshots) {
                    $max_headshots = $stats[$i]['headshots'];
                    $max_headshots_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_headshots}</p>";
            ?>             
            </div>
            <?php
            $max_headshots = 0;
            $max_headshots_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['headshots'] > $max_headshots) {
                    $max_headshots = $stats[$i]['headshots'];
                    $max_headshots_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_headshots_player}</p>";
            ?> 
            <div id="medalha2">
                <?php
                $max_kills = 0;
                $max_kills_player = "";
                for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                    if ($stats[$i]['kills'] > $max_kills) {
                        $max_kills = $stats[$i]['kills'];
                        $max_kills_player = $stats[$i]['nick'];
                    }
                }
                echo "<p>{$max_kills}</p>";
                ?>

            </div>
            <?php
            $max_kills = 0;
            $max_kills_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['kills'] > $max_kills) {
                    $max_kills = $stats[$i]['kills'];
                    $max_kills_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_kills_player}</p>";
            ?>
            <div id="medalha3">
                <?php
                $max_deaths = 0;
                $max_deaths_player = "";
                for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                    if ($stats[$i]['deaths'] > $max_deaths) {
                        $max_deaths = $stats[$i]['deaths'];
                        $max_deaths_player = $stats[$i]['nick'];
                    }
                }
                echo "<p>{$max_deaths}</p>";
                ?>
            </div>
            <?php
            $max_deaths = 0;
            $max_deaths_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['deaths'] > $max_deaths) {
                    $max_deaths = $stats[$i]['deaths'];
                    $max_deaths_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_deaths_player}</p>";
            ?>
            <div id="medalha4">
            <?php
            $max_testinha = 0;
            $max_testinha_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['head'] > $max_testinha) {
                    $max_testinha = $stats[$i]['head'];
                    $max_testinha_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_testinha}</p>";
            ?>
            </div>
            <?php
            $max_testinha = 0;
            $max_testinha_player = "";
            for ($i = 1; $i<= $stats->countPlayers(); $i++) {
                if ($stats[$i]['head'] > $max_testinha) {
                    $max_testinha = $stats[$i]['head'];
                    $max_testinha_player = $stats[$i]['nick'];
                }
            }
            echo "<p>{$max_testinha_player}</p>";
            ?>
        </div>
        <div id="contato"> <p><a href="https://www.instagram.com/ndn.play/">Nos siga no instagram @ndn.play</a></p> </div>
    </div>
</body>
</html>

