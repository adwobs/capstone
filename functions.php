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
		$strQuery="select id, username, password from Lecturer where username= '$name' and password ='$pword'";
		
		return $this-> query($strQuery);
	}

	function signUp($name,$pword,$course,$time){
		$strQuery="insert into Lecturer set username='$name', password='$pword', fk_course='$course', fk_session_id='$time' ";
		return $this-> query($strQuery);
	}

	function startSession(){

	}

	function attendance($cid,$time,$code,$sid){
		$strQuery ="insert into class_attendance set fk_student_id='$sid', fk_course_id='$cid', student_time='$time', code='$code', attendance='p'";
		return $this-> query($strQuery);
	}

	function viewTable(){
		$strQuery=" select class_attendance.student_time, (student.fullname) from class_attendance,student where class_attendance.fk_student_id=student.student_code";
		return $this-> query($strQuery);
	}

	function courses($id){
		$strQuery="select course.label, course.id, cast(course_session.time_start as time) as times from course, course_session, Lecturer, course_lecturer
where $id=course_lecturer.fk_lect_id and course.id=course_session.fk_course_id
and course.id=course_lecturer.fk_course_id";

//echo $strQuery;
		return $this-> query($strQuery);
	}

	function sessions($id){
		$strQuery="select id, time_start, fk_course_id from course_session where fk_course_id= $id";
		return $this-> query($strQuery);
	}
}

