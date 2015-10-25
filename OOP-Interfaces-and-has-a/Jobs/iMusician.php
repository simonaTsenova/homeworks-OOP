<?php
	interface iMusician {
		public function sing($song);
		public function play_instrument($instrument, $hours);
		public function go_to_concert($place, $date, $start_time, $ticket_price, $viewrs);
	}
?>