<?php
	function convertStatus($status) {
		if($status==0) { // not returned
			return "X";
		} else if($status==1) { //partially retunred
			return "&#9651";
		} else if($status==2) { // returned
			return "O";
		}
	}

	function convertDateToString($date) {
		$time = strtotime($date);
		$dateView = date("d/m/y", $time);
		return $dateView;
	}

	function bringDate($date) {
		$time = strtotime($date);
		$date = date("d", $time);
		return $date;
	}

	function bringMonth($date) {
		$time = strtotime($date);
		$month = date("m", $time);
		return $month;
	}

	function bringYear($date) {
		$time = strtotime($date);
		$year = date("y", $time);
		return "20".$year;
	}
?>