<?php
// this page contains commands for MyScript.js page
include_once("functions.php");

if(!isset($_REQUEST['cmd'])){
  echo "cmd not found";
  exit();
}
$lect_id;

$data="";
$cmd=$_REQUEST['cmd'];

switch ($cmd) {
  case 1:
  view();
  break;
  case 2:
  login();
  break;
  case 3:
  course();
  break;
  case 4:
  student();
  break;
  case 5:
  label();
  break; 
  case 6:
  search();
  break; 
  default:
  exit();
}

      // Login for lecturer
function login(){
 $obj=new functions();
 $username = $_REQUEST['username'];
 $password = $_REQUEST['password'];
 $loginDetails = $obj->login($username,$password);
 if (!$loginDetails){
  $data=array("result"=>"0");
  echo json_encode($data);
  return;
}else{
  $data = array("result"=>"1");
                  // fetch result and create a session
  $r=$obj->fetch();
  $lect_id=$r['id'];
  $username=$r['username'];
  session_start();
  $_SESSION['id']=$lect_id;
  $_SESSION['username']=$username;
  echo json_encode($data);
}
}

          // shows the list of courses
function course(){
  $obj=new functions();
  $lect_id = $_GET['id'];
  $r=$obj->courses($lect_id);

  if(!$r){
    $data= array('r' => "0");
    echo json_encode($data);
    return;
  }
  $result=$obj->fetch();
  echo '{"r":1,"course":[';
  while ($result) {
    echo json_encode($result);
    $result=$obj->fetch();

    if($result){echo ",";}
  }
  echo "]}";
}

    //show list of students
function view(){    
  $obj=new functions();
  $result=$obj->viewTable();
  if(!$result){
    $data=array("result"=>"0");
    echo json_encode($data);
    return;
  }
  
  $result=$obj->fetch();
  echo '{"result":1, "views":[';
  while($result){
    echo json_encode($result);
    $result=$obj->fetch();

    if($result){ echo ",";}
  }
  echo"]}";
}

// takes attendance of students
function student(){
  $obj=new functions();
  $course=$_REQUEST['courseId'];
  $time=date("h:i");
  $code=$_REQUEST['code'];
  $student=$_REQUEST['student'];
  $r=$obj->student($student);
  if (!$r) {
    $data=array("result"=>"0");
    echo json_encode($data);
    return;
  }
  else{
   $result=$obj->attendance($course,$time,$code,$student);
   if(!$result){
    $data=array("result"=>"0");
    echo json_encode($data);
    return;
  }
  else{
    $data = array("result"=>"1");
                  // fetch result and create a session
    $r=$obj->fetch();
    echo json_encode($data);
  } 
}

}

          // shows courses and their time
function label(){
  $obj=new functions();
  $id=$_REQUEST['id'];
  $r=$obj->courseNames($id);

  if(!$r){
    $data= array('result' =>"0");
    echo json_encode($data);
    return;
  }
  else{
    $r=$obj->fetch();

    $data=array("result"=>"1", "label"=>$r['label'], "times"=>$r['times']);

    echo json_encode($data);
  }
}

function search(){
  $search=$_GET["search"];
  if (strlen($search)>0){
    $obj=new functions();
    $obj->search($search);

    $row=$obj->fetch();
    while($row){
      echo" <table>
      <tr>
        <td{$row['id']}>{$row['fullname']}<td>
        <tr>
        </table>";
        $row=$obj->fetch();
      }
    }
  }
  ?>