<?php
	class CoffeeShop {
		private $shop_name;
		private $address;
		private $capacity;
		private $music_style;
		private $bartenders;
		private $clients;
		public static $list_number = 0;
		private $num_bartenders = 0;
		private $num_clients = 0;

		public function __construct ($name, $addr, $cpc, $music){
			$this->shop_name = $name;
			$this->address = $addr;
			$this->capacity = $cpc;
			$this->music_style = $music;
			$this->bartenders = array();
			$this->clients = array();
		}

		public function show_shop () {
			echo "<h2> Coffee Shop Information </h2>";
			echo "<b> Name: </b> $this->shop_name <br/>";
			echo "<b> Address: </b> $this->address <br/>";
			echo "<b> Capacity: </b> $this->capacity <br/>";
			echo "<b> Music Style: </b> $this->music_style <br/>";
			if(!empty($this->bartenders)) {
				$list_number = 1;
				$total_b = $this->num_bartenders;
				echo "<h2> List of $total_b bartenders </h2>";
				foreach ($this->bartenders as $bartenders) {
					echo "<h4> Bartender №$list_number </h4>";
					$bartenders->show_bartender();
					$list_number++;
				}
			} else {
				echo "No bartenders in this coffee shop. <br/>";
			}
			if(!empty($this->clients)) {
				$list_number = 1;
				$total_c = $this->num_clients;
				echo "<h2> List of $total_c of clients </h2>";
				foreach ($this->clients as $clients) {
					echo "<h4> Client №$list_number</h4>";
					$clients->show_client();
					$list_number++;
				}
			} else {
				echo "No clients in this coffee shop. <br/>";
			}
			echo "<br/>";
		}

		public function add_bartender($newBartender) {
			array_push($this->bartenders, $newBartender);
			echo "You've successfully added a new bartender to the $this->shop_name coffee shop. <br/>";
			$this->num_bartenders++;
		}

		public function add_client($newClient) {
			array_push($this->clients, $newClient);
			echo "You've successfully added a new client to the $this->shop_name coffee shop. <br/>";
			$this->num_clients++;
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
			$today = date("F j, Y");  
			$day1 = $this->isWeekend();
			if($day1 == "weekend") {
				echo "Working Schedule of <b> $this->shop_name </b> <br/> for $today: <br/> 10h. - 16h. <br/>";
			} elseif($day1 == "weekday") {
				echo "<br/> Working Hours of $this->shop_name: <br/> 9h. - 19h. <br/>";
			}
		}

		public function show_menu() {
			echo "<table>";
				echo "<tr rowspan='4'> <h3> $this->shop_name Menu </h3> </tr>";
				echo "<tr>";
					echo "<td> <b> Drink </b> </td>";
					echo "<td> <b> Type </b> </td>";
					echo "<td> <b> Description </b> </td>";
					echo "<td> <b> Price </b> </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Herbal </td>";
					echo "<td> Tea </td>";
					echo "<td> /Chamomile, thyme, mint/ </td>";
					echo "<td> $2.99 </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Chamomile </td>";
					echo "<td> Tea </td>";
					echo "<td> /Chamomile, honey, vanilla/ </td>";
					echo "<td> $3.00 </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Ginger Latte </td>";
					echo "<td> Coffee </td>";
					echo "<td> /Whole milk, heavy cream, espresso, ginger, vanilla, spices/ </td>";
					echo "<td> $4.99 </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Cappuccino </td>";
					echo "<td> Coffee </td>";
					echo "<td> /Vanilla Ground Coffee, sugar, coconut milk, spices/ </td>";
					echo "<td> $4.59 </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Manhattan </td>";
					echo "<td> Cocktail </td>";
					echo "<td> /Rye whiskey, sweet vermouth, angostura, maraschino cherries/ </td>";
					echo "<td> $5.79 </td>";
				echo "</tr>";
				echo "<tr>";
					echo "<td> Margarita </td>";
					echo "<td> Cocktail </td>";
					echo "<td> /Tequila, cointreau, lime juice, ice/ </td>";
					echo "<td> $6.19 </td>";
				echo "</tr>";
			echo "</table>";
		}

	}
?>