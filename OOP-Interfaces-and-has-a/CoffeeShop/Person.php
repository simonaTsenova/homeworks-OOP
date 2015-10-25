<?php
	class Person {
		private $name;
		private $gender;
		private $favourite_music;

		public function __construct($n, $gnd, $fav_music) {
			$this->name = $n;
			$this->gender = $gnd;
			$this->favourite_music = $fav_music;
		}

		public function show_person() {
			echo "<b> Name: </b> $this->name <br/>";
			echo "<b> Gender: </b> $this->gender <br/>";
			echo "<b> Favourite Music Style: </b> $this->favourite_music <br/>";
		}

		public function __set($name, $value) {
			if(property_exists($this, $name)) {
				$this->name = $value;
			} else {
				echo "No such property as '$name'. <br/>";
			}
		}

		public function __get($name) {
			return $this->name;
		}
	}
?>