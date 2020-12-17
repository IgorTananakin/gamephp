<?php
require_once("players.php");//подключение рас
define('COUNT_PLAYERS', 10); //количество игроков в команде
$k=10;
class Team{
        public $name_team;
        
        public $races = array('Human_Warrior',
                'Human_Archer',
                'Human_Rider',
                'Big_Orc',
                'Litel_Orc',
                'Elf_Archer',
                'Elf_Warrior',
                'Fallen_ELf',
                'Free_Orc',
                'Gnome_Warior');
                
                 
                    
        public $team = []; // массив игроков команды
        public $count_live_players = 10;
        //
function __construct($name){
$this->name_team = $name;


            for($i = 0; $i <= COUNT_PLAYERS; $i++)
            {
                
                $race = mt_rand(0,9);     
                $this->team[$i] = new $this->races[$race]();
                
                echo '<hr>'.$this->races[$race];
               
                

            }
          
}
        

        
        
       function hit($enemy_team){

            //$k=10;

            $index_enemy = rand(0,9); //индекс противника в чужой команде
            $index_ally = mt_rand(0,9); //индекс соратника в массиве
            
            // наносим удар
            if( isset($this->team[$index_ally]) && isset($enemy_team->team[$index_enemy]) ){ 
                 //проверка на существование выбранных игроков в команде
                $this->team[$index_ally]->hit($enemy_team->team[$index_enemy]);
                if($enemy_team->team[$index_enemy]->is_sterben()) {
                    echo "<br>";
                    echo " погиб боец в команде ";
                    echo "[$enemy_team->name_team]";
                    
                    unset($enemy_team->team[$index_enemy]);
                    
                    sort($enemy_team->team);
                   // $k--;
                   // var_dump($enemy_team->team[$index_enemy]);
                    //$this->life();
                    
                    
                    echo "<br>";
                    echo "<br>";
                    echo " новый состав команды ";
                    
                //echo $enemy_team->team[$index_ally];
                    print_r($enemy_team->team);
                 
                     
                    echo " <br>";
                    $enemy_team->count_live_players--;
                }
                    
            }
            
        }



}

?>