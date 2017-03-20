<?php
include_once("functions.php");

if(!isset($_REQUEST['cmd'])){
    echo "cmd not found";
    exit();
}

$data="";
$cmd=$_REQUEST['cmd'];

    switch ($cmd) {
        case 1:
            view();
            break;
        default:
            exit();
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

    function attendance(){
        $obj=new functions();
        $studentid=$_REQUEST['fk_student_id'];
        $courseid=$_REQUEST['fk_course_id'];
        $date=date("h:i");
        $result=$obj->attendance($studentid,$courseid,$date);
        if(!$result){
            $data=array("result"=>"0");
            echo json_encode($data);
            return;
        }
    }
?>