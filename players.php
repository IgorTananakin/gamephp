<?php
	abstract class Player{
		public $armor;//броня
	 	public $health = 100;
		public $damage; // урон
		public $speed; //скорость

		//а не труп ли я?
		function is_sterben(){
			if($this->health <= 0)
			{
				//$COUNT_PLAYERS--;
				return true;
			}	
			else return false;
		}


		// function life(){
		// 	if($this->)
		// }


	 	function hit($victim){
				//если броня есть
				if($victim->armor > 0){
					$victim->armor -= $this->damage*$this->speed/100;//вычесть из жизней
					//если осталось меньше 0
					if($victim->armor < 0){
							$victim->health += $victim->armor;//вычесть ее из жизней
					}
				}
				else {
					$victim->health -= $this->damage*$this->speed/100;
				}
	 	}

	 	//---------

	}

	//traits
		trait Archer {
		    public $arrows;//стрелы
		    public $accuracy; // меткость

		    function hit($victim){
		        parent::hit($victim);
		        $this->arrows-=1;
		    }

			function show_property(){
				parent::show_property();
				echo "<br> arrows == $this->arrows";
			}

		}



		class Human_Archer extends Player {
		    use Archer;

		    function __construct(){
		        $this->armor = 5; //броня
		        $this->accuracy = 10; // меткость
		        $this->arrows = 30; //стрелы
		        $this->damage = 5; 
		        $this->speed = 5; 
		    }

		}
//люди войны
		class Human_Warrior extends Player {

		    function __construct(){
		        $this->armor = 10; 
		        $this->damage = 5; 
		        $this->speed = 7; 
		    }


		}
//люди всадники
		class Human_Rider extends Player {
		    function __construct(){
		        $this->armor = 5; 
		        $this->damage = 12; 
		        $this->speed = 15; 
		    }
		}


	//Орки
		

		class Big_Orc extends Player{
		    function __construct(){
		        $this->armor = 0; 
		        $this->damage = 20; 
		        $this->speed = 5; 
		    }
		}
		class Litel_Orc extends Player{
		    function __construct(){
		        $this->armor = 5; 
		        $this->damage = 7; 
		        $this->speed = 8; 
		    }
		}

	//независимые
		class Free_Orc extends Player{
			function __construct()
		    {
		        $this->armor = 5; 
		        $this->damage = 15; 
		        $this->speed = 10; 
		    }
		}

	//эльфы
	

		class Elf_Archer extends Player {
		    use Archer;

		    function __construct(){
		        $this->armor = 0; 
		        $this->damage = 15; 
		        $this->speed = 12; 
		        $this->arrows=40;
		        $this->accuracy = 10; // меткость
		    }
		}

		class Elf_Warrior extends Player {
		    function __construct()
		    {
		        $this->armor = 0; 
		        $this->damage = 15; 
		        $this->speed = 10; 
		    }
		}

	//падшие
		class Fallen_ELf extends Player{
			function __construct()
		    {
		        $this->armor = 0; 
		        $this->damage = 15; 
		        $this->speed = 10; 
		    }
		}

	//гномы
		class Gnome_Warior extends Player{
			function __construct()
		    {
		        $this->armor = 15; 
		        $this->damage = 15; 
		        $this->speed = 3; 
		    }
		}



	//колдуны
		class Wizard extends Player{
			function __construct()
		    {
		        $this->armor = 0; 
		        $this->damage = 15;
		        $this->speed = 10; 
		    }
		}