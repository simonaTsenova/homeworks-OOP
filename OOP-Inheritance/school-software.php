<?php
	class Classes {
		private $class_name;
		private $students;
		private $teachers;
		public static $maxStudents = 30;

		public function __construct ($class_name) {
			$this->class_name = $class_name;
			$this->students = array();
			$this->teachers = array();
		}

		public function show_class() {
			echo "<br/>";
			echo"<b> Class Information: </b> <br/>";
			echo "Class Name: $this->class_name <br/>";
			echo "<b> Students in class: </b> <br/>";
			foreach ($this->students as $students) {
			    $students->show_dets();
			}
			echo "<br/>";

			echo "<b> Teachers of class </b> <br/>";
			foreach ($this->teachers as $teachers) {
			    $teachers->show_dets();
			}
			echo "<br/>";
		}

		public function add_students($new_student) {
			$count_students = count($this->students);
			if($count_students <= self::$maxStudents) {
				array_push($this->students, $new_student);
				echo "You've added a new student. <br/>";
			} else {
				echo "Can't add more students to this class. It's already filled. <br/>";
			}
		}

		public function add_teachers($new_teacher) {
			array_push($this->teachers, $new_teacher);
			echo "You've added a new teacher. <br/>";
		}

		public function __set($name, $value) {
			if(property_exists($this, $name)) {
				$this->name = $value;
			} else {
				echo "Property '$name' not found. <br/>";
			}
		}

		public function __get($name) {
			return $this->$name;
		}
	}

	class People {
		protected $ppl_name;
		protected $phone_num;

		public function __construct ($ppl_name, $phone_num) {
			$this->ppl_name = $ppl_name;
			$this->phone_num = $phone_num;
		}

		public function __set($name, $value) {
			if(property_exists($this, $name)) {
				$this->name = $value;
			} else {
				echo "Property '$name' not found. <br/>";
			}
		}

		public function __get($name) {
			return $this->$name;
		}

		public function show_dets() {
			echo "<br/>";
			echo "Name: $this->ppl_name <br/>";
			echo "Phone Number: $this->phone_num <br/>";
		}

		public function homework() {
			echo "<br/> Dealing with homework. <br/>";
		}

		public function have_break($minutes) {
			echo "$this->ppl_name is having a break for $minutes. He/She is eating lunch and drinking coffee. <br/>";
		}

	}

	class Student extends People {
		private $number;
		private $gpa;

		public function __construct ($stud_name, $stud_phone, $num, $gpa) {
			parent::__construct($stud_name, $stud_phone);
			$this->number = $num;
			$this->gpa = $gpa;
		}

		public function show_dets() {
			echo "<br/>";
			echo "<b> Student Personal Information: </b>";
			parent::show_dets();
			echo "Class number: $this->number <br/>";
			echo "Grade Point Average (GPA): $this->gpa <br/>";
		}

		public function homework() {
			echo "<br/> Student $this->ppl_name is doing their homework. <br/>";
		}

		public function study() {
			if($this->gpa == 6) {
				echo "<br/> $this->ppl_name is an excellent student. He/She is studying very hard to succeed. <br/>";
			} elseif ($this->gpa >=5 && $this->gpa < 6) {
				$this->gpa = 6;
				echo "<br/> $this->ppl_name is doing great work. He/She improved their GPA. New GPA is $this->gpa. <br/>";
			} else {
				$this->gpa = $this->gpa + 1;
				echo "<br/> $this->ppl_name is doing great work. He/She improved their GPA. New GPA is $this->gpa. <br/>";
			}
		}


	}

	class Teacher extends People {
		private $specialty;
		private $subjects;

		public function __construct ($teach_name, $teach_phone, $spec) {
			parent::__construct($teach_name, $teach_phone);
			$this->specialty = $spec;
			$this->subjects = array();
		}

		public function show_dets() {
			echo "<br/>";
			echo "<b> Teacher Personal Information: </b>";
			parent::show_dets();
			echo "Specialty: $this->specialty <br/>";
			foreach ($this->subjects as $subjects) {
			    $subjects->show_subj();
			}
			echo "<br/>";
		}

		public function add_subj($new_subj) {
			array_push($this->subjects, $new_subj);
			echo "You've added a new subject. <br/>";
		}

		public function homework() {
			echo "<br/> Teacher $this->ppl_name is checking homework. <br/>";
		}

		public function examine() {
			echo "<br/> Teacher $this->ppl_name is examining a student. <br/>";
		}
	}

	class Subject {
		private $subj_title;
		private $hours_count;
		private $term_grades_count;

		public function __construct($title, $hours, $grades) {
			$this->subj_title = $title;
			$this->hours_count = $hours;
			$this->term_grades_count = $grades;
		}

		public function show_subj() {
			echo "<br/>";
			echo "<b> Subject details: </b> <br/>";
			echo "Title: $this->subj_title <br/>";
			echo "Hours: $this->hours_count <br/>";
			echo "Grades required: $this->term_grades_count <br/>";
			echo "<br/>";
		}

		public function __set($name, $value) {
			if(property_exists($this, $name)) {
				$this->name = $value;
			} else {
				echo "Property '$name' not found. <br/>";
			}
		}

		public function __get($name) {
			return $this->$name;
		}
	}


	$class1 = new Classes('First Class');
	$class2 = new Classes('Second Class');

	$subj1 = new Subject('Maths', 160, 8);
	$subj2 = new Subject('Informatics', 100, 6);
	$subj3 = new Subject('English', 200, 10);
	$subj4 = new Subject('Literature', 120, 5);

	$teacher1 = new Teacher('Victory Fox', '465-254-421', 'Algebra');
	$teacher2 = new Teacher('George Nickelson', '223-548-212', 'English Literature and freestyle writing');
	$teacher3 = new Teacher('Peter Williams', '223-548-897', 'Software Engineering');

	$student1 = new Student('Anna Rosewood', '558-788-458', 1, 6.00);
	$student2 = new Student('Carrie Clark', '589-788-454', 4, 4.5);
	$student3 = new Student('Michael Fllinstone', '689-725-231', 15, 5.45);
	$student4 = new Student('Ron Pillsbury', '254-255-210', 22, 5.75);


	$class1->add_teachers($teacher1);
	$class1->add_students($student1);
	$class1->add_students($student2);
	$class1->add_students($student3);
	$class1->add_students($student4);
	$class2->add_teachers($teacher2);
	$class2->add_teachers($teacher3);
	$class1->show_class();
	$class2->show_class();
	
	$teacher1->add_subj($subj1);
	$teacher2->add_subj($subj2);
	$teacher2->add_subj($subj3);
	$teacher1->show_dets();
	$teacher2->show_dets();
	
	$student1->show_dets();
	$student1->homework();
	$student2->study();
?>