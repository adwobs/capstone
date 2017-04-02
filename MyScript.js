function list() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xmlhttp.open("GET", "allAjax.php?cmd=1", true);
  xmlhttp.send();
}

function myFunction(xml) {
  var i;
  var xmlDoc =$.parseJSON(xml.responseText);
  var table="<table><tr><th>Student</th><th>Entry Time</th></tr>";
  for (i in xmlDoc.views) { 
    table += "<tr><td>" +
    xmlDoc.views[i]["fullname"]
    +"</td><td>"+
    xmlDoc.views[i]['student_time']+"</tr></table>" ;
  }

  document.getElementById("table").innerHTML = table;
}

// retrieves the list of courses 
function course(){
  var xmlhttp= new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if(this.readyState==4 && this.status==200){
      courseNames(this);
    }
  };
  var id = document.getElementById('id').value;
  xmlhttp.open("GET", "allAjax.php?cmd=3&id="+id, true);
  xmlhttp.send();
}

function courseNames(xml){
  console.log(xml.responseText);
  var table="";
  var i;
  var xmlDoc=$.parseJSON(xml.responseText);

  table='<center><table class="bordered"><tbody>';
  for (i in xmlDoc.course){

      table+='<tr><td>'+xmlDoc.course[i]["label"]+'</td>';
      table+='<td>'+xmlDoc.course[i]["times"]+'</td></tr>';
  }
  table+='</tbody></table></center>';
  document.getElementById("list").innerHTML=table;
}

  // lecture login
function login(){
  var username = $("#username").val();
  var password = $("#password").val();

  var theUrl="allAjax.php?cmd=2&username="+username+"&password="+password;
  $.ajax(theUrl,
          {
            async:true,
            complete:loginComplete
          });
}

function loginComplete(xhr,status){
   if (status!="success"){
    alert("error");
    document.location.href = "Lect.php";
    return;
   }
   console.log(xhr.responseText);
   var block = $.parseJSON(xhr.responseText);
   if (block.result==0){
    alert("Username or Password is wrong");
   }else if(block.result == 1) {
    document.location.href = "dashboard.php";
   }
}
//timer
/*
function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;
    function timer() {
        // get the number of seconds that have elapsed since 
        // startTimer() was called
        diff = duration - (((Date.now() - start) / 1000) | 0);

        // does the same job as parseInt truncates the float
        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds; 

        if (diff == 0) {
			clearInterval(x);
			
        }
    };
    // we don't want to wait a full second before the timer starts
    timer();
    var x= setInterval(timer, 1000);
}

 function clock() {
    var fiveMinutes = 60 * 1,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
}
*/
