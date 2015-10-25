<?php
	interface iLawyer {
		private function start_new_case($start_date);
		private function finish_case($finish_date);
		private function give_pleading($pleading);
		public function work_on_case($client_name, $result);
	}
?>