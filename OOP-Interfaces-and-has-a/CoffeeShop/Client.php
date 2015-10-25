<?php
	require_once('Person.php');

	class Client extends Person {
		private $bill;
		private $club_card = 0;
		private $discount = 0;

		public function __construct($parent_name, $parent_gender, $parent_music, $client_bill) {
			parent::__construct($parent_name, $parent_gender, $parent_music);
			$this->bill = $client_bill;
		}

		public function show_client() {
			echo "<h4> Client Information </h4>";
			parent::show_person();
			echo "<b> Bill: </b> $$this->bill <br/>";
			echo "<br/>";
		}

		//$club_card is 1 when the client has a club card, it is 0 otherwise
		public function get_club_card($discount_percent) {
			echo "Client $this->name has a club card for coffee shops. The card provides $discount_percent% discount off of consumption. <br/>";
			$this->club_card = 1;
			$this->discount = $discount_percent/100;
		}

		public function pay_bill($payment_method) {
			if($this->club_card == 1) {
				$this->bill = $this->bill - $this->bill*$this->discount;
				echo "$this->name pays a bill of $this->bill with $payment_method. <br/>";
				$this->bill = 0;
			} else {
				echo "$this->name pays a bill of $this->bill with a $payment_method. <br/>";
				$this->bill = 0;
			}
		}
	}
?>