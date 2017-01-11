<?php

class Matriks {

	private $matriks = array();
	private $dimensi_matriks;

	public function __construct($dimensi_matriks){
		$this->dimensi_matriks = $dimensi_matriks;

		for ($i=0; $i < $this->dimensi_matriks; $i++) { 
			for ($j=0; $j < $this->dimensi_matriks; $j++) { 
				$this->matriks[$i][$j] = rand(0,2);
			}
		}
	}

	public function getMatriks(){
		for ($i=0; $i < $this->dimensi_matriks; $i++) { 
			for ($j=0; $j < $this->dimensi_matriks; $j++) { 
				echo $this->matriks[$i][$j].' ';
			}

			echo "<br />";
		}
	}

	public function getDimensiMatriks(){
		echo $this->dimensi_matriks;
	}

	public function checkMatriks(){
		//checking baris
		$tempBarisGanjil= [];
		$tempCountBaris = [];
		for ($i=0; $i < $this->dimensi_matriks; $i++) { 
			$countBaris = 0;
			for ($j=0; $j < $this->dimensi_matriks; $j++) { 
				$countBaris += $this->matriks[$i][$j];
			}

			if($countBaris % 2 !=0){
				array_push($tempBarisGanjil,$countBaris);
			}

			array_push($tempCountBaris,$countBaris);
		}

		//checking kolom
		$tempKolomGanjil = [];
		$tempCountKolom = [];
		for ($i=0; $i < $this->dimensi_matriks; $i++) { 
			$countKolom = 0;
			for ($j=0; $j < $this->dimensi_matriks; $j++) { 
				$countKolom += $this->matriks[$j][$i];
			}

			if($countKolom % 2 !=0){
				array_push($tempKolomGanjil,$countKolom);
			}

			array_push($tempCountKolom, $countKolom);
		}

		//check ubah
		if(count($tempBarisGanjil) == 0 && count($tempKolomGanjil) ==0){
			echo "Ya";
		}elseif(count($tempBarisGanjil) == 1 && count($tempKolomGanjil) == 1){
			$indexBarisGanjil = array_search($tempBarisGanjil[0],$tempCountBaris);
			$found = false;
			for ($i=0; $i < $this->dimensi_matriks; $i++) { 
				$jumlahKolom = $tempCountKolom[$i];
				if(($jumlahKolom+1) % 2 ==0){
					$found = true;
					echo "Ubah ($indexBarisGanjil,$i)";
				}
			}
		}else{
			echo "Tidak";
		}
	}
}

$m = new Matriks(4);
$m->getDimensiMatriks();
echo "<br><br>";
$m->getMatriks();
echo "<br><br>";
$m->checkMatriks();