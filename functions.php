<?php
/**
* @Author: Adwoba Bota
* This contains the function queries that communicate with the database
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
function attendance($cid,$time,$code,$sid){
$strQuery ="insert into class_attendance set fk_student_id='$sid', fk_studentSession_id='$cid', student_time='$time', code='$code', attendance='p'";
return $this-> query($strQuery);
}
function viewTable(){
$strQuery=" select class_attendance.student_time, (student.fullname) from class_attendance,student where class_attendance.fk_student_id=student.student_code";
return $this-> query($strQuery);
}
// selects the courses and the times they occur
function courses($id){
$strQuery="select course.label, course_session.id, cast(course_session.time_start as time)
as times from course, course_session, Lecturer, course_lecturer
where Lecturer.id=$id=course_lecturer.fk_lect_id and course.id=course_session.fk_course_id
and course.id=course_lecturer.fk_course_id and course.id=course_session.fk_course_id";
return $this-> query($strQuery);
}
function sessions($id){
$strQuery="select id, time_start, fk_course_id from course_session where fk_course_id= $id";
return $this-> query($strQuery);
}
function courseNames($id){
$strQuery="select course_session.id, course.label, cast(course_session.time_start as time) as times from course, course_session where course_session.fk_course_id=course.id and course_session.id=$id";
return $this-> query($strQuery);
}
function classList($id){
	$strQuery="select student.fullname from student, course_session_student
where student.id=course_session_student.fk_student_id and fk_course_session=$id";
return $this->query($strQuery);
}
function search($keyword){
	$strQuery="select student.fullname, class_attendance.attendance
from class_attendance, student,course_session_student, course_session
where student.id=class_attendance.fk_student_id
and student.id=course_session_student.fk_student_id
and course_session.id=course_session_student.fk_course_session and student.fullname like '$keyword'";
return $this->query($strQuery);
}
function student($stu_id){
	$strQuery="select student.student_code from course_session_student, student where student.id=course_session_student.fk_student_id and student.student_code=$stu_id";
	return $this->query($strQuery);
}
}