<?php

/**
* 
*/
include_once("wrapper.php");

class functions extends wrapper
{
	
	function functions()
	{
		# code...
	}

	function login($name,$pword){
		$strQuery="select username, password from Lecturer where username= '$name' and password ='$pword'";
		return $this-> query($strQuery);
	}

	function signUp($name,$pword,$course,$time){
		$strQuery="insert into Lecturer set username='$name', password='$pword', fk_course='$course', fk_session_id='$time' ";
		return $this-> query($strQuery);
	}

	function startSession(){

	}

	function attendance($sid,$csid,$cid,$time){
		$strQuery ="insert into class_attendance set fk_student_id='$sid', fk_course_session_id='$csid', fk_course_id='$cid', student_time='$time', attendance='p'";
		return $this-> query($strQuery);
	}

	function viewTable(){
		$strQuery=" select * from class_attendance";
		return $this-> query($strQuery);
	}

	/* GET ABSENT STUDENT FROM CLASS LIST 
	function absentism(){
		$$strQuery= "select * from "
	} **/

	function courses($name){
		$strQuery="select id from course where label='$name'";
		return $this-> query($strQuery);
	}

	function sessions($id){
		$strQuery="select id, time_start, fk_course_id from course_session where fk_course_id= $id";
		return $this-> query($strQuery);
	}
}