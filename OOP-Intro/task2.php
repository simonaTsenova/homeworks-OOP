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
			echo "__construct for $br $mod <br/> <br/>";
			$this->brand = $br;
			$this->model = $mod;
			$this->type = $t;
			$this->price = $pr;
			$this->quantity = $qnt;
			$this->year = $y;
		}

		public function show_info () {
			echo "Product Details: <br/>";
			echo "Brand: $this->brand <br/>";
			echo "Model: $this->model <br/>";
			echo "Type: $this->type <br/>";
			echo "Price: $this->price$ <br/>";
			echo "Quantity available: $this->quantity <br/>";
			echo "Release Year: $this->year <br/>";
		}

		public function soldItems ($number_sold) {
			if($this->quantity >= $number_sold) {
				$this->quantity = $this->quantity - $number_sold;
				echo "You've just bought $number_sold new $this->brand $this->model for $this->price$. 
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

	class Shop {
		private $name;
		private $location;
		private $general_revenue;
		private $items_sold;
		private $employees;

		public function __construct($n = 'Unknown', $loc = 'Undefined', $own = "None", $gr = 0, $sold = 0, $empl = 0) {
			echo "__construct for $br $mod <br/> <br/>";
			$this->name = $n;
			$this->location = $loc;
			$this->owner = $own;
			$this->general_revenue = $gr;
			$this->items_sold = $sold;
			$this->employees = $empl;
		}

		public function show_info () {
			echo "Shop Information: <br/>";
			echo "Name: $this->name <br/>";
			echo "Location: $this->location <br/>";
			echo "Owner: $this->owner <br/>";
			echo "General Revenue: $this->general_revenue <br/>";
			echo "Items sold annually: $this->items_sold <br/>";
			echo "Employees: $this->employees <br/>";
		}
	}

	$pearPhone = new Product('PearPhone', 'TX300', 'Phone', 750, 17, 2014);
	$pearPhone->show_info();
	$pearPhone->soldItems(15);
	$pearPhone->show_info();
	$pearPhone->isAvailable();
	$pearPhone->year = 2015;
	echo "Release year corrected. New year: $pearPhone->year. <br/>";
	$pearPhone->review;

	$pearBook = new Product('PearBook', 'L350', 'Notebook', 1250, 21, 2015);
	$pearBook->show_info();
	$pearBook->newItems(16);
?>