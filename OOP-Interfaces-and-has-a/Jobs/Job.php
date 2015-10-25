<?php
	class Job implements iShowDetails {
		private $person_name;
		private $person_age;
		private $job_title;
		private $person_salary;
		private $job_description;

		public function __construct ($name, $age, $title, $salary, $description) {
			$this->person_name = $name;
			$this->person_age = $age;
			$this->job_title = $title;
			$this->person_salary = $salary;
			$this->job_description = $description;
		}

		public function __set($property, $value) {
			if(property_exists($this, $property)) {
				$this->property = $value;
			} else {
				echo "No such property as '$name'. <br/>";
			}
		}

		public function __get($property) {
			return $this->property;
		}

	}	
?>