function attendance() {
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
 // alert(xmlDoc);
  for (i in xmlDoc.views) { 
    table += "<tr><td>" +
    xmlDoc.views[i]['fk_student_id']
    +"</td><td>"+
    xmlDoc.views[i]['student_time']+"</tr></table>" ;
  }

  document.getElementById("table").innerHTML = table;
}
