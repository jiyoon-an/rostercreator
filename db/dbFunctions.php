<?php

	/******************************************************************************************
	Select Free Board Data with flag
	flag 0 : select all free board data
	flag 1 : select only one free board data with postId selected by user from free board list
	*******************************************************************************************/
	function fnSelectFreeBoardData() {
		global $connect, $flag;
		$sql = "select * from tblFreeBoard";
		if($flag == 0) {
			$sql = $sql." order by postId desc";
		} else if($flag == 1) {
			global $number;
			$sql = $sql." where postId=$number";
		}
		
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));

		return $resultSet;
	}

	/******************************************************
	Select the category from category table for free board
	******************************************************/
	function fnSelectFreeBoardCategory() {
		global $connect;
		$sql = "select CodeName from tblCode where Category='005' and CategoryName='FreeBoard'";

		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	/*******************************
	Insert new Post to tblFreeBoard
	********************************/
	function fnInsertPost() {
		global $connect;
		global $title, $category, $name, $date, $month, $year, $detail, $secret;
		$sql = "INSERT INTO tblFreeBoard (category, title, message, name, date, secret) VALUES ('$category', '$title', '$detail', '$name', '" .$year."-".$month."-".$date."', $secret)";
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	/*************************************
	Update selected Post to tblFreeBoard
	**************************************/
	function fnUpdatePost() {
		global $connect;
		global $title, $category, $detail, $secret, $number;
		$sql = 'Update tblFreeBoard set title="'.$title.'", category="'.$category.'", message="'.$detail.'", secret="'.$secret.'" where postId='.$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	/*******************************
	Update views of post
	********************************/
	function fnUpdateViews($number, $views) {
		global $connect;
		$sql = 'Update tblFreeBoard set views="'.($views + 1).'" where postId='.$number;
		$resultSet = mysqli_query($connect, $sql) or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	/*******************************
	De;ete the selected post
	********************************/
	function fnDeletePost($number) {
		global $connect;
		$sql = 'Delete from tblFreeBoard where postId='.$number;
		$resultSet = mysqli_query($connect, $sql) or die("Error ".mysqli_error($connect));
		return $resultSet;
	}

	/************************************************
	Insert new Category about free board to tblCode
	*************************************************/
	function fnAddCategory($category, $count) {
		global $connect;
		$count += $count;
		$sql = "INSERT INTO tblCode (Category, CategoryName, Code, CodeName) VALUES ('005', 'FreeBoard', '$count', '$category')";
		$resultSet = mysqli_query($connect, $sql) or die("Error ".mysqli_error($connect));
		return $resultSet;
	}

	//tradingRecord
	/*****************************************************************************
	Selct loan data from tblLoan with flag
	flag 0 : initial flag. select not and partially returned data
	flag 1 : select one loan data selected by user from loan list
	flag 2 : select a number of loan data selected by 'select box' from loan list
	******************************************************************************/
	function fnSelectLoanData() {
		global $connect, $flag, $loanstatus;
		$sql = "select * from tblLoan";
		if($flag==0) {
			$sql = $sql." where status=0 or status=1";
		} else if($flag==2) {
			global $number;
			$sql = $sql." where loanId=".$number;
		} else if($flag==1) {
			if($loanstatus=='all'){
				$sql = $sql."";
			} else if($loanstatus=='nprt') {
				$sql = $sql." where status=0 or status =1";
			} else if($loanstatus=='rt') {
				$sql = $sql." where status=2";
			} else if($loanstatus=='nrt') {
				$sql = $sql." where status=0";
			} else if($loanstatus=='prt') {
				$sql = $sql." where status=1";
			}
		}
		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	/********************************************************************************
	Selct borrow data from tblBorrow with flag
	flag 0 : initial flag. select not and partially returned data
	flag 1 : select one borros data selected by user from borrow list
	flag 2 : select a number of borrow data selected by 'select box' from borrow list
	*********************************************************************************/
	function fnSelectBorrowData() {
		global $connect, $flag, $borrowstatus;
		$sql = "select * from tblBorrow";
		if($flag==0) {
			$sql = $sql." where status=0 or status=1";
		} else if($flag==2) {
			global $number;
			$sql = $sql." where borrowId=".$number;
		} else if($flag==1) {
			if($borrowstatus=='all'){
				$sql = $sql."";
			} else if($borrowstatus=='nprt') {
				$sql = $sql." where status=0 or status =1";
			} else if($borrowstatus=='rt') {
				$sql = $sql." where status=2";
			} else if($borrowstatus=='nrt') {
				$sql = $sql." where status=0";
			} else if($borrowstatus=='prt') {
				$sql = $sql." where status=1";
			}
		}
		$resultSet = mysqli_query($connect, $sql);

		return $resultSet;
	}

	/********************************************************************************
	Insert new loan Record data
	*********************************************************************************/
	function fnInsertLoanData() {
		global $connect;
		global $category, $amount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail;
		$sql = "INSERT INTO tblLoan (category, ".$amountType.", representative, branch, date, description) VALUES ('$category', '$amount', '$representative', '$branch', '" .$year."-".$month."-".$date."', '$detail')";
		$resultSet = mysqli_query($connect, $sql);
		return $resultSet;
	}

	/********************************************************************************
	Insert new borrow Record data
	*********************************************************************************/
	function fnInsertBorrowData() {
		global $connect;
		global $category, $amount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail;
		$sql = "INSERT INTO tblBorrow (category, ".$amountType.", representative, branch, date, description) VALUES ('$category', '$amount', '$representative', '$branch', '" .$year."-".$month."-".$date."', '$detail')";
		$resultSet = mysqli_query($connect, $sql);
		return $resultSet;
	}

	/********************************************************************************
	update selected loan Record data
	*********************************************************************************/
	function fnUpdateLoanData() {
		global $connect;
		global $category, $amount, $rtamount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail, $number;
		$sql = 'update tblLoan set category="'.$category.'", r_amount="'.$rtamount.'", representative="'.$representative.'", branch="'.$branch.'", rtDate="'.$year.'-'.$month.'-'.$date.'", status='.$status.', description="'.$detail.'" where loanId='.$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));
		return $resultSet;
	}

	/********************************************************************************
	update selected borrow Record data
	*********************************************************************************/
	function fnUpdateBorrowData() {
		global $connect;
		global $category, $amount, $rtamount, $amountType, $branch, $representative, $date, $month, $year, $status, $detail, $number;
		$sql = "update tblBorrow set category='".$category."', r_amount='".$rtamount."', representative='".$representative."', branch='".$branch."', rtDate='".$year."-".$month."-".$date."', status=".$status.", description='".$detail."' where borrowId=".$number;
		$resultSet = mysqli_query($connect, $sql)or die("Error: ".mysqli_error($connect));;
		return $resultSet;
	}
?>