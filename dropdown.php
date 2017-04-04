<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/myCSS.css">
<script type="text/javascript" src="MyScript.js"></script>
</head>
<body>

<div class="dropdown">
<button onclick= 'course()' class="dropbtn">Pick a course</button>
  <div id="myDropdown" class="dropdown-content">
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
            echo"<a value='{$row['id']}'>{$row['label']}</a>";
            $row=$obj->fetch();
        }
    }
  ?>
</div>
</div>

    <div id="course"><h3>Course:</h3><h4></h4></div>
    <div id="time"><h3>Time:</h3><h4></h4></div>
</body>
</html>
