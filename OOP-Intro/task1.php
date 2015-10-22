<?php
	class Student {
		private $name;
		private $grade;
		private $gpa;
		private $motivation;
		public function __construct ($n = 'Unknown Student', $g = 'First', $avg = 6.00, $m = 0) {
			echo "__construct for $n <br/>";
			$this->name = $n;
			$this->grade = $g;
			$this->gpa = $avg;
			$this->motivation = $m;
		}  
		public function show_info () {
			echo "<br/>";
			echo "Personl information: <br/>";
			echo "Name: $this->name <br/>";
			echo "Grade: $this->grade <br/>";
			echo "GPA: $this->gpa <br/>";
			echo "Motivation Coefficient: $this->motivation <br/>";
			echo "<br/>";
		}
		public function go_to_school () {
			echo "$this->name is going to school at 7.30 a.m. School finishes at 1.30 p.m. <br/>";
			$this->motivation = 1;
		}
		private function study ($hours) {
			$tiredness = 10 - $hours;
			echo "$this->name is studying for $hours hours. He's trying hard to get better grades. <br/>";
			if($tiredness < 5) {
				echo "$this->name needs to take a rest immediately. <br/>";
			} else {
				echo "$this->name can study a little bit more. <br/>";
			}
			$this->motivation = 0;
			return $hours;
		}
		private function do_homework () {
			if ($this->motivation == 1) {
				echo "$this->name is doing homework. <br/>";
			} else {
				echo "$this->name can't do any homework now. Too tired. <br/>";
			}
		}
		public function atHome($h) {
			echo "$this->name is at home. <br/>";
			$this->do_homework();
			$study_hours = $this->study($h);
			
		}
		public function do_test ($subject, $grade) {			
			echo "$this->name is having a test on $subject and got $grade grade. <br/>";
		}


}
		$kate = new Student('Kate');
		$kate->show_info();
		$kate->go_to_school();
		$kate->do_test('maths', 5.9);
		$kate->atHome(1);
		$kate->show_info();
		$john = new Student('John', 'third', 5.55);
		$john->show_info();
		$john->go_to_school();
		$john->show_info();
		$john->atHome(10);
?>
