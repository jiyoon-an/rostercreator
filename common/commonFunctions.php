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

	function convertDateToString($date, $target) {
		$time = strtotime($date);
		if($target == 'freeBoard') {
			$dateView = date("d/m/20y", $time);
		} else if($target == 'tradingRecord' || $target == 'home') {
			$dateView = date("d/m/y", $time);
		}
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

	function setLockinTitle($secret, $title, $name, $Name) {
		if($secret == 1) {
			if($Name != $name && $Name != 'Lim') {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/> Only Admin and Writer can Access';
			} else {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/>'.$title;
			}			
		} else {
			echo $title;
		}
	}

	function setLockinName($secret, $name, $Name) {
		if($secret == 1) {
			if($Name != $name && $Name != 'Lim') {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/> Secret User';
			} else {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/>'.$name;
			}
		} else {
			echo $name;
		}
	}
?>