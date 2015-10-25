<?php
	require_once('Person.php');

	class Bartender extends Person {
		private $phone_number;
		private $salary;
		private $clients;
		public static $clients_num = 0;

		public function __construct($parent_name, $parent_gender, $parent_music, $num, $sal) {
			parent::__construct($parent_name, $parent_gender, $parent_music);
			$this->phone_number = $num;
			$this->salary = $sal;
			$this->clients = array();
		}

		public function show_bartender() {
			echo "<h4> Bartender Personal Information </h4>";
			parent::show_person();
			echo "<b> Phone Number: </b> $this->phone_number <br/>";
			echo "<b> Salary: </b> $this->salary <br/>";
			if(!empty($this->clients)) {
				$n = self::$clients_num;
				echo "Total number of $n clients. <br/>";
				foreach ($this->clients as $clients) {
					$clients->show_client();
				}
			echo "<br/>";
			} else {
				echo "Bartender $this->name has no clients. <br/>";
			}
		}

		public function deal_client($new_client) {
			array_push($this->clients, $new_client);
			self::$clients_num++;
		}

		public function make_drink($type, $option) {
			echo "Got your order. Mixing ingredients. It will take just a few minutes. <br/>";
			echo "Your $option $type is ready. Here you go! Thank you for visiting us! <br/>";
		}
	}
?>