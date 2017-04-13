// script page contains functions to make operations on the dashboard faster
function list() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xmlhttp.open("GET", "allAjax.php?cmd=1", true);
  xmlhttp.send();
}

function myFunction(xml) {
  var i;
  var xmlDoc = $.parseJSON(xml.responseText);
  var table = "<table><tr><th>Student</th><th>Entry Time</th></tr>";
  for (i in xmlDoc.views) {
    table += "<tr><td>" +
      xmlDoc.views[i]["fullname"] +
      "</td><td>" +
      xmlDoc.views[i]['student_time'] + "</tr></table>";
  }

  document.getElementById("table").innerHTML = table;
}

// retrieves the list of courses 
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function course() {
  // console.log('inside course');
  document.getElementById("myDropdown").classList.toggle("classshow");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {

      var dropdowns = document.getElementsByClassName("classdropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('classshow')) {
          openDropdown.classList.remove('classshow');
        }
      }
    }
  }
  // lecture login
function login() {
  var username = $("#username").val();
  var password = $("#password").val();

  var theUrl = "allAjax.php?cmd=2&username=" + username + "&password=" + password;
  $.ajax(theUrl, {
    async: true,
    complete: loginComplete
  });
}

function loginComplete(xhr, status) {
  if (status != "success") {
    alert("error");
    document.location.href = "signIn.php";
    return;
  }
  console.log(xhr.responseText);
  var block = $.parseJSON(xhr.responseText);
  if (block.result == 0) {
    alert("Username or Password is wrong");
  }
  else if (block.result == 1) {
    document.location.href = "dashboard.php";
  }
}

function label($id) {
   //console.log('inside label');
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      labelComplete(this);
    }
  };
  xmlhttp.open("GET", "allAjax.php?cmd=5&id=" + $id, true);
  xmlhttp.send();
  sessionStorage.courseId = $id;
}

function labelComplete(xml) {
  var xmlDoc = $.parseJSON(xml.responseText);
  // console.log(xmlDoc);
  if (xmlDoc.result == 0) {
    alert("no course is chosen");
  }
  else if (xmlDoc.result == 1) {
    document.getElementById("course").innerHTML = xmlDoc.label;
    document.getElementById("time").innerHTML = xmlDoc.times;
  }
}

//search function 
function showResult(str) {
        if (str.length==0) { 
          document.getElementById("livesearch").innerHTML="";
          document.getElementById("livesearch").style.border="0px";
          return;
        }
        if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {  // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.getElementById("livesearch").innerHTML=this.responseText;
            document.getElementById("livesearch").style.border="1px solid #A5ACB2";
          }
        }
        xmlhttp.open("GET","allAjax.php?cmd=6&search="+str,true);
        xmlhttp.send();
      }