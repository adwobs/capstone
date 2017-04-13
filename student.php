<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style type="text/css" media="screen">
      body { text-align:center; }
    </style>
  </head>

  <body onload="myFunction()">
    <p id="demo"></p>
   <script>
function studentId() {
    var stu_id = prompt("Please enter your id");
    student(stu_id);
}

function student(stu_id){
  var courseId=sessionStorage.courseId;
  var code=sessionStorage.random;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      studentComplete(this);
    }
  };
  xmlhttp.open("GET", "allAjax.php?cmd=4&student="+stu_id+"&courseId="+courseId+"&code="+code, true);
  xmlhttp.send();
}

function studentComplete(xml){
  var xmlDoc=$.parseJSON(xml.responseText);
  if(xmlDoc.result==0){
    document.getElementById(studentId)="Your attendance could not be completed";
  }
  else if(xmlDoc.result==1){
    document.getElementById(studentId)="Attendance is completed";
  }
}

</script>

  </body>
</html>
