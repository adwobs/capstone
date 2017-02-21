<?php
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
        include_once("functions.php");
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
?>