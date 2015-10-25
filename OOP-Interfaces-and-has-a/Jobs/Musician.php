<?php
	require_once('Job.php');
	require_once('iMusician.php');
	require_once('iShowDetails.php');

	class Musician extends Job implements iMusician, iShowDetails {
		private $manager;
		private $music_genre;
		private $popularity;

		public function __construct () {
			parent::__construct($name, $age, $title, $salary, $description, $man, $genre, $pop = 0);
			$this->manager = $man;
			$this->music_genre = $genre;
			$this->popularity = $pop;
		}

		public function show_details() {
			
		}
		
		public function sing($song) {
			echo "Singing $song. Nanananana. Lalalalalalala. <br/>";
		}
		public function play_instrument($instrument, $hours) {
			echo "$this->name is playing the $instrument. He/She is practicing for $hours hours. <br/>";
		}

		public function have_concert($place, $date, $start_time, $ticket_price, $viewrs) {
			echo "$this->name is having a concert. <br/>";
			echo "Place: $place <br/>";
			echo "Date of concert: $date <br/>";
			echo "Start time: $start_time <br/>";
			echo "Ticket price: $ticket_price <br/>";

			if ($viewrs >= 100000) {
				$this->popularity = $this->popularity + 100;
			} elseif ($viewrs > 50000 && $viewrs <= 99000) {
				$this->popularity = $this->popularity + 50;
			} elseif ($viewrs > 10000 && $viewrs <= 50000) {
				$this->popularity = $this->popularity + 10;
			} else {
				$this->popularity = $this->popularity + 5;
			}
		}
	}
?>