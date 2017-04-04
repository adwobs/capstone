<!DOCTYPE html>
<html>
  <head>
    <?php session_start();?>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Dynalight" rel="stylesheet">
    <!--      use materialised-->
    <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.css"  media="screen,projection"/>
    <!--      font awesome-->
    <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">
    
    <!-- html5.html-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <script type="text/javascript" src="qrcode.js"></script>
    <script type="text/javascript" src="html5-qrcode.js"></script>  
    <!-- my css page -->
    <link rel="stylesheet" type="text/css" href="css/myCSS.css">
    <script type="text/javasc















    ript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="MyScript.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      body {
      background: url("images/background.jpg");
      }
      body {
      /*display:-webkit-flex;*/ /* Safari 6.1+ */
      /*display:-ms-flex;*/ /* IE 10 */ 
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      }
      main {
      flex: 1 0 auto;
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
    <!--this is the header-->
    <header style="padding:20px;">
      <div class="row">
        <div class="col s4" style="font-family: 'Dynalight';font-size: 30px;color:#26a69a">RollCall
        </div>
        <div class="right">
          <div class="col s4"><a onclick='updateQRCode("http://35.166.18.143/~adwoba.bota/cap1/student.html")' ><i class="fa fa-qrcode fa-2x" aria-hidden="true" style="color:#26a69a"></i></a>
          </div>
        </div>
        <div class="right">
          <div class="col s4"><a><i class="fa fa-camera fa-2x" aria-hidden="true" style="color:#26a69a"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col s6" style="font-family: 'Dynalight';font-size: 30px;"><?php print_r("Lecturer: ".$_SESSION['username']); ?></div>
      <div class="col s2 offset-s2"><a class="waves-effect waves-light btn">Class List</a></div>
      </div>
    </header>
    <!--this is the body-->
    <main>
      <div class="row">
        <div class="col s12 offset-s8">
          <input class="search" type="text" name="search" placeholder="Search..">
        </div>
      </div>
      <!-- displays the courses for the current logged in lecturer -->
      <div class="classdropdown">
        <button onclick= 'course()' class="dropbtn">Pick a course</button>
        <div id="myDropdown" class="classdropdown-content">
          <!-- uses the id of the course session to show the course and the time on the dashboard -->
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
      <!--this is the class attendance-->
      <div class="row">
        <div class="col s8 offset-s2">
          <table>
            <thead>
              <tr>
                <th data-field="id">Class attendance</th>
                <th data-field="name"><?php echo date("d-m-Y");?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Alvin</td>
              </tr>
              <tr>
                <td>Alan</td>
              </tr>
              <tr>
                <td>Jonathan</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!--this is the qr code display-->
      <div id="qrcode"></div>
      <div id="time"></div>
      <script type="text/javascript">
        function updateQRCode(text) {
        
          var element = document.getElementById("qrcode");
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
        
          }
        };
        // we don't want to wait a full second before the timer starts
        timer();
        var x= setInterval(timer, 1000);
        }
        
        function clock() {
        var fiveMinutes = 60 * 0.5,
          display = document.querySelector('#time');
        startTimer(fiveMinutes, display);
        }
      </script>
    </main>
    <!--this is the footer-->
    <footer class="page-footer" style="padding:25px;">
      <div class="divider"></div>
      <div class="footer-copyright">
        <div class="container">
          © 2017 RollCall
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
    <!--Import jQuery before materialize.js-->

    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>     
  </body>
</html>