<html>
<head>
  <?php session_start();?>
  <meta charset="utf-8"> 
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="http://fonts.googleapis.com/icon?family=Dynalight" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.css" media="screen,projection" />
  <link rel="stylesheet" type="text/css" href="css/myCSS.css">
  <!--      font awesome-->
  <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">

  <!-- html5.html-->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <script type="text/javascript" src="qrcode.js"></script>
  <script type="text/javascript" src="html5-qrcode.js"></script>  
  <!-- my css page -->
  <link rel="stylesheet" type="text/css" href="css/myCSS.css">
  <!--Let's browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body {
      background: url("images/background.jpg") no-repeat center center fixed;
      /*background-size: 100% 100%;*/
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;

    }
    html, body {
      height: 100%;
    }
    main {
      min-height: 100%;
      /* equal to footer height */
      margin-bottom: -5%; 
    }
    main:after {
      content: "";
      display: block;
    }
    footer, main:after {
      height: 5%; 
    }
    table {
      counter-reset: rowNumber;
    }
    table td {
      counter-increment: rowNumber;
    }
    table td:first-child::before {
      content: counter(rowNumber);
      min-width: 1em;
      margin-right: 0.5em;
    }
  </style>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="css/materialize/js/materialize.js"></script>
  <script type="text/javascript" src="MyScript.js"></script>
  <!-- modal script -->
  <script>
   $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
</script>
<div class="container">
  <header>
    <div class="row">
      <div class="col s3"><h1 style="font-family: 'Dynalight';color:#26a69a">RollCall</h1></div>
      <div class="col s3">
        <div class="classdropdown" ><button class="dropbtn" onclick='course()'><h4>Pick a course</h4></button>
          <div id="myDropdown" class="classdropdown-content">
            <!-- uses the id of the course session to show the course and the time on the dashboard -->
            <?php
             include_once("functions.php"); 
            $obj=new functions(); 
            $id=$_SESSION['id'];
            $r=$obj->courses($id); 
            if($r==false){ 
              echo "<a>there are no courses registered for this lecturer</a>"; 
            } 
            else{ 
              $row=$obj->fetch(); 
              while ($row) { 
                echo" <a onclick='label({$row['id']})'>{$row['label']}</a>"; 
                $row=$obj->fetch(); 
              } } ?> 
            </div>
          </div>
        </div>
      
        <div class="col s4 startAt"><a onclick='updateQRCode("http://35.166.18.143/~adwoba.bota/cap1/student.php?")'><h4>Start attendance</h4></a></div>
        <div class="col s2"><a class="waves-effect waves-light modal-trigger" href="#modal1"><h4>Class List</h4></a></div>
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
          <div class="modal-content">
            <h4>class list</h4>
            <?php
            include_once("functions.php");
            $obj=new functions();
            $r=$obj->classList(7);
            while($r){
              echo"<table><th><td>{$r['fullname']}</td></th></table>";
              $r=$obj->fetch();
            }
            ?>
          </div>
          <div class="modal-footer">
            <a class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
          </div>
        </div>
      </div>
      <div class="divider"></div>
    </header>
    <main>
      <section>
        <div class="row"><div class="col s12 offset-s7" ><input class="search" type="text" name="search" onkeyup="showResult(this.value)" placeholder="Search.."><div id="livesearch"></div></div></div>
      </section>
      <section>
        <div><strong><h5>Lecturer: <?php print_r( $_SESSION['username']);?></h5></strong></div>
        <div><strong><h5>Course:</h5></strong><span id="course" style="display: inline"></span></div>
        <div><strong><h5>Time:</h5></strong><span id="time"></span></div>
      </section>
      <section>

        <center><div id="qrcode"></div></center>
        <center><div id="time"></div></center>
        <center><div id="table"></div></center>
        <script type="text/javascript">
          function updateQRCode(text) {
            sessionStorage.random = Math.floor((Math.random()*100)+1);
            var element = document.getElementById("qrcode");
            text=text+"code="+sessionStorage.random+"&courseId="+sessionStorage.courseId;
            console.log(text);
            var bodyElement = document.body;
            if(element.lastChild)
              element.replaceChild(showQRCode(text), element.lastChild);
            else
              element.appendChild(showQRCode(text));
            clock();
          }

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

          display.textContent ="Attendance ends in "+ minutes + ":" + seconds+ " minutes"; 

          if (diff == 0) {
            clearInterval(x);
            document.getElementById('qrcode').innerHTML="";
            display.textContent="";
            myFunction();

          }
        };
        // we don't want to wait a full second before the timer starts
        timer();
        var x= setInterval(timer, 1000);
      }

      function clock() {
        var fiveMinutes = 60 * 8,
        display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
      }

      jQuery(document).ready(function($){
        $(".startAt").click(function (event)
        {
          event.preventDefault();
  
        });
      });
    </script>
  </section>
</main>
<footer>
  <div class="divider"></div>
  <div class="footer-copyright">
    <div class="container"><p> © 2017 RollCall <a class="grey-text text-lighten-4 right" href="#!">More Links</a></p></div>
  </div>
</footer>
</div>
</body>

</html>