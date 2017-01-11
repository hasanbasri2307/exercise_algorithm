<?php

class TikTak {
	private $player1;
	private $player2;
	private $board = array();

	public function __construct($player1,$player2){
		$this->player1 = $player1;
		$this->player2 = $player2;
		for($i=0;$i<3;$i++){
			for($j=0;$j<3;$j++){
				$this->board[$i][$j] = -1;
			}
		}

		$this->showBoard();
		echo "<br>";
	}

	private function checkWinner($player){
		//check horizontal
		for($i=0;$i<3;$i++){
			$horizon = 0;
			for($j=0;$j<3;$j++){
				if($this->board[$i][$j] == $player){
					$horizon++;
				}
			}

			if($horizon == 3){
				return true;
			}
		}

		//vertikal check
		for($i=0;$i<3;$i++){
			$vertikal = 0;
			for($j=0;$j<3;$j++){
				if($this->board[$j][$i] == $player){
					$vertikal++;
				}
			}

			if($vertikal == 3){
				return true;
			}
		}

		//diagonal check major
		$diag1 = 0;
		for($i=0;$i<3;$i++){
			if($this->board[$i][$i] == $player){
				$diag1++;
			}
		}

		if($diag1 == 3){
			return true;
		}

		//diagonal check minor
		$x=0;
		$diag2 = 0;
		for($i=2;$i>=0;$i--){
			if($this->board[$i][$x] == $player){
				$diag2++;
			}

			$x++;
		}

		if($diag2 ==3){
			return true;
		}

		return false;
	}

	public function makeMove($player,$posX,$posY){
		if($posX > 2 or $posY > 2){
			echo "$player move to $posX,$posY";
			echo "<br>";
			echo "Index array outbound";
			echo "<br>";
			echo "please change your position";
			echo "<br><br>";
			
		}else if($player != $this->player1 AND $player != $this->player2){
			echo "Nama Player $player berbeda dengan yang anda daftarkan";
			die;
		}else{

			if($this->board[$posX][$posY] != -1){
				echo "The place already taken.";
				echo "<br>";
			}else{
				
				$this->board[$posX][$posY] = $player;
				echo "$player move to $posX,$posY";
				echo "<br>";

				if($this->checkWinner($player) === true){
					echo "the $player win.";
					echo "<br>";
				}
			}

			$this->showBoard();
			echo "<br>";
		}
	}

	public function showBoard(){
		for($i=0;$i<3;$i++){
			for($j=0;$j<3;$j++){
				echo $this->board[$i][$j].' ';

			}

			echo "<br>";
		}
	}
}

$game = new TikTak("5","3");
$game->makeMove("5",0,0);
$game->makeMove("3",1,0);
$game->makeMove("5",2,1);
$game->makeMove("3",0,3);
$game->makeMove("3",0,2);
$game->makeMove("5",2,2);
$game->makeMove("3",1,1);
$game->makeMove("5",0,1);
$game->makeMove("3",2,0);