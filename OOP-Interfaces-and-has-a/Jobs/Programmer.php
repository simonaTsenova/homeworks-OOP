<?php
	require_once('Job.php');
	require_once('iProgrammer.php');
	require_once('iShowDetails.php');

	class Programmer extends Job implements iProgrammer, iShowDetails {
		private $company;

		public function __construct($name, $age, $title, $salary, $description, $com) {
			parent::__construct($name, $age, $title, $salary, $description);
			$this->company = $com;
		}

		public function code() {
			echo "Starting to solve a new problem. Analyzing. Brainstorming ideas. Writing the actual code. Designing user's interface. <br/>";
		}

		private function bug_fixing($number) {
			echo "Fixing $number bugs. This may take a while. <br/>";
		}

		public function software_testing($number_bugs) {
			echo "Testing the written software.";
			echo "Executing the program or application with the intent of finding software bugs (errors). <br/>";
			if($number_bugs != 0) {
				$this->bug_fixing($number_bugs);
				echo "Bugs fixed. The software runs perfectly without any bugs. <br/>";
			} else {
				echo "No bugs found. The written software is perfect. <br/>";
			}
		}
	}	
?>