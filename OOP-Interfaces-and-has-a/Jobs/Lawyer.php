<?php
	require_once('Job.php');
	require_once('iLawyer.php');
	require_once('iShowDetails.php');


	class Lawyer extends Job implements iLawyer, iShowDetails {
		private $company;
		private $current_number_cases = 0;
		private $cases_won = 0;
		private $cases_lost = 0;

		public function __construct($name, $age, $title, $salary, $description, $cmp) {
			parent::__construct($name, $age, $title, $salary, $description);
			$this->company = $cmp;
		}

		private function start_new_case($start_date) {
			echo "Starting a new case on $start_date. <br/>";
			$this->current_number_cases++;
		}

		private function finish_case($finish_date) {
			echo "Case finished on $finish_date. <br/>";
		}
		private function give_pleading($pleading) {
			echo "Give a pleading into court. <br/>";
			echo "$pleading";
		}

		//$result is 0 or 1, 0 for a loss and 1 for a win
		public function work_on_case($client_name, $result) {
			$this->start_new_case($start_date);
			echo "Meeting client $client_name. Going deep into the case. <br/>":
			$this->give_pleading($pleading);
			if($result == 1) {
				echo "Won the case. <br/>";
				$this->cases_won++;
			} else {
				echo "Lost the case. <br/>";
				$this->cases_lost++;
			}
			$this->finish_case($finish_date);
		}
	}	
?>