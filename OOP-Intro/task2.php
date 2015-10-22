<?php
	
	class Product {
		private $brand;
		private $model;
		private $year;
		private $type;
		private $price;
		private $quantity;
		public function __construct($br = 'Unknown brand', $mod = 'Undefined', 
			$t = 'other', $pr = 0, $qnt = 0, $y = 2000) {
			echo "<br/>__construct for $br $mod <br/>";
			$this->brand = $br;
			$this->model = $mod;
			$this->type = $t;
			$this->price = $pr;
			$this->quantity = $qnt;
			$this->year = $y;
		}
		public function show_info () {
			echo "<br/>";
			echo "Product Details: <br/>";
			echo "Brand: $this->brand <br/>";
			echo "Model: $this->model <br/>";
			echo "Type: $this->type <br/>";
			echo "Price: $this->price$ <br/>";
			echo "Quantity available: $this->quantity <br/>";
			echo "Release Year: $this->year <br/>";
			echo "<br/>";
		}
		public function buyItems ($number_bought) {
			if($this->quantity >= $number_bought) {
				$this->quantity = $this->quantity - $number_bought;
				$total_price = $this->price*$number_bought;
				echo "You've just bought $number_bought new $this->brand $this->model for $total_price$. 
				There's $this->quantity more items available to be bought in our shop. <br/>";
			} else {
				echo "Not enough items to be sold. Please choose another number to buy. <br/>";
			}
		}
		public function newItems ($number_new) {
			$this->quantity = $this->quantity + $number_new;
			echo "You've just added $number_new new items. Items available - $this->quantity. <br/>";
		}
		public function isAvailable () {
			if($this->quantity <= 0) {
				echo "This product is unavailable at the moment. 
				Expect new itmes soon or check other items in this category. <br/>";
			} else {
				echo "You're lucky. The product you're looking for is available in the shop. <br/>";
			}
		}
		public function __set($name, $value){
	        if (property_exists($this, $name)) {
				echo "Setting '$name' to '$value' <br/>"; 
	        	$this->$name = $value;
	    	}else{
	        	echo "Property '$name' does NOT exist for this class. <br/>";
	        }
	    }
	    public function __get($name)
	    {
	        if (property_exists($this, $name)) {
	        	return $this->$name;
	        }else{
	        	echo "Property '$name' does NOT exist for this class. <br/>";
	        }
		}
	}
	class Store {
		private $name;
		private $location;
		private $owner;
		private $general_revenue;
		private $items_sold;
		private $employees;
		public function __construct($n = 'Unknown', $loc = 'Undefined', $own = "None", $gr = 0, $sold = 0, $empl = 0) {
			echo "<br/>__construct for $n Store <br/>";
			$this->name = $n;
			$this->location = $loc;
			$this->owner = $own;
			$this->general_revenue = $gr;
			$this->items_sold = $sold;
			$this->employees = $empl;
		}
		public function show_store () {
			echo "Shop Information: <br/>";
			echo "Name: $this->name <br/>";
			echo "Location: $this->location <br/>";
			echo "Owner: $this->owner <br/>";
			echo "General Revenue: $this->general_revenue <br/>";
			echo "Items sold annually: $this->items_sold <br/>";
			echo "Employees: $this->employees <br/>";
		}
		public function __set($name, $value){
	        if (property_exists($this, $name)) {
				echo "Setting '$name' to '$value' <br/>"; 
	        	$this->$name = $value;
	    	}else{
	        	echo "Property '$name' does NOT exist for this class. <br/>";
	        }
	    }
	    public function __get($name)
	    {
	        if (property_exists($this, $name)) {
	        	return $this->$name;
	        }else{
	        	echo "Property '$name' does NOT exist for this class. <br/>";
	        }
		}
		public function hire_employee($emp_name, $position, $salary) {
			echo "<br/> Hiring a new employee $emp_name on the position: $position with monthly salary $salary. <br/>";
			$this->employees++;
		}
		private function isWeekend() {
			$dw = date('w');
			if($dw == 0 || $dw == 6) {
				$day = "weekend";
			} else {
				$day = "weekday";
			}
			return $day;
		}
		public function working_hours() {
			$day1 = $this->isWeekend();
			if($day1 == "weekend") {
				echo "<br/> Working Hours of $this->name: <br/> 10h. - 16h. <br/>";
			} elseif($day1 == "weekday") {
				echo "<br/> Working Hours of $this->name: <br/> 9h. - 19h. <br/>";
			}
		}
	}
	$pearPhone = new Product('PearPhone', 'TX300', 'Phone', 750, 17, 2014);
	$pearPhone->show_info();
	$pearPhone->buyItems(15);
	$pearPhone->show_info();
	$pearPhone->isAvailable();
	$pearPhone->year = 2015;
	echo "Release year corrected. New year: $pearPhone->year. <br/>";
	echo "Review of the product: $pearPhone->review <br/>";
	$pearBook = new Product('PearBook', 'L350', 'Notebook', 1250, 21, 2015);
	$pearBook->show_info();
	$pearBook->newItems(16);
	$main_store = new Store('p-Store', 'Pear Street 75', 'Michael Sheldon', 1200000, 800, 18);
	$main_store->show_store();
	$sec_store = new Store('NoteBook', 'Fearville Street 18', 'George Kennedy', 3500875, 958, 25);
	$sec_store->show_store();
	$sec_store->working_hours();
	
?>