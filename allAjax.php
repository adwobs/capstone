<?php
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
        case 3:
            student();
            break;    
        default:
            exit();
    }

    // logs the lecturer into the class
    function login(){
         $obj=new functions();
         $username = $_REQUEST['username'];
         $password = $_REQUEST['password'];
         $loginDetails = $obj->login($username,$password);
         //echo $loginDetails;
         if (!$loginDetails){
            $data=array("result"=>"0");
            echo json_encode($data);
            return;
         }else{
            $data = array("result"=>"1");
                // fetch result and create a session
            $r=$obj->fetch();
            $lect_id=$r['id'];
            //echo "lect_id".$r['id'];
            $username=$r['username'];
            session_start();
            $_SESSION['id']=$lect_id;
            //print_r($_SESSION);
            $_SESSION['username']=$username;
            echo json_encode($data);
            //return;
         }

    }
        // list of courses
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

	//ajax function draws information from the database
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

    function student(){
        $obj=new functions();
        $course=$_REQUEST['course'];
        $time=date("h:i");
        $code=$_REQUEST['code'];
        $student=$_REQUEST['student'];
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
?>