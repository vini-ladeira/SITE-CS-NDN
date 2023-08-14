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
            width: 10%;
            max-height: 500px;
            float: right;
            background-color: green;
        }
        
        #medalha1 {
            background: lightblue;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }
        
        #medalha2 {
            background: red;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }

        #medalha3 {
            background: lightgreen;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }

        #contato {
            clear: both;
            height: 40px;
            background-color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="logoeinfos">
            <img src="logo fat-01_SMALL.png"style="float: left; margin-right: 10px; width: 120px;">
                <!-- <?php
                $server_ip = "190.115.196.12";
                $server_port = "27018"; // Default port for CS 1.6

                $socket = @fsockopen("udp://" . $server_ip, $server_port , $errno, $errstr, 1);


                if (!$socket) {
                    echo "Server offline";
                } else {
                    $data = "\xFF\xFF\xFF\xFFTSource Engine Query\x00";
                    fwrite($socket, $data);
                    $response = fread($socket, 4096);
                    fclose($socket);

                    if (substr($response, 0, 4) == "\xFF\xFF\xFF\xFF") {
                        $response = substr($response, 6);
                        $parts = explode("\x00", $response);
                        $server_name = $parts[1];
                        $map_name = $parts[2];	
                        $current_players = ord($parts[5]);
                        $max_players = 32;
                        $server_type = $parts[3];
                        $player_count = $current_players . "/" . $max_players;

                        echo "Server online";
                        echo "<p>Server Name: " . $server_name . "</p>";
                        echo "<p>IP Address: " . $server_ip . ":" . $server_port . "</p>";
                        echo "<p>Player count: " . $player_count . "</p>";
                        echo "<p>Map info: " . $map_name . "</p>";
                        //echo "<p>Server type: " . $server_type . "</p>";

                    } else {
                        echo "Server não está respondendo";
                    }
                }
                ?> -->
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
            <div id="medalha1"></div> 
            <div id="medalha2"></div>
            <div id="medalha3"></div>
        </div>
        <div id="contato"> <p><a href="https://www.instagram.com/ndn.play/">Nos siga no instagram @ndn.play</a></p> </div>
    </div>
</body>
</html>

