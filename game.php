<?php 
require_once("players.php"); //описание персонажей
require_once("team.php"); //описание команды
    
    

  
    echo '<table border="1"><tr><th> Team 1 </th><th> Team 2 </th></tr>';
    // echo "<br><hr> team_1 <br>";
        echo '<tr>';
            echo '<td>';
                $team_1 = new Team('team_1');
                
            echo '</td>';
        // echo "<br><hr> team_2 <br>";
            echo '<td>';
                $team_2 = new Team('team_2');
                
            echo '</td>';
        echo '</tr>';
    echo '</table>'; 



    echo "<br><br>";



    //$team_1->life();



    //бей врага
    while($team_1->count_live_players > 0 && $team_2->count_live_players > 0) 
    {
        echo "<tr>";
        $team_1->hit($team_2);
        $team_2->hit($team_1);
        echo "</tr>";
    }

    echo "<hr>";
    if($team_1->count_live_players<0){
        echo "<br>" ."В первой команде Team1 закончились игроки" ."<br/>";
        echo "Вторая команда Team2 победила";
    } else{
        echo "<br> Во второй команде Team2 закончились игроки" ."<br/>";
        echo "Первая команда Team1 победила"; 
    }
    
    
?>