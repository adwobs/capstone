<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/myCSS.css">
<script type="text/javascript" src="MyScript.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>

<div class="classdropdown">
<button onclick= 'course()' class="dropbtn">Pick a course</button>
  <div id="myDropdown" class="classdropdown-content">
  <?php
    include_once("functions.php");
    $obj=new functions();
    $r=$obj->courses(1);

    if($r==false){
        echo "<a>there are no courses registered for this lecturer</a>";
    }
    else{
        $row=$obj->fetch();
        while ($row) {
            echo"<a onclick='label({$row['id']})'>{$row['label']}</a>";
            $row=$obj->fetch();
        }
    }
  ?>
</div>
</div>

    <div><strong>Course:</strong><span id="course"></span></div>
    <div><strong>Time:</strong><span id="time"></span></div>
</body>
</html>
