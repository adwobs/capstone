<!-- Login for lecturers -->
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="http://fonts.googleapis.com/icon?family=Dynalight" rel="stylesheet">
    <!--      use materialised-->
    <link type="text/css" rel="stylesheet" href="css/materialize/css/materialize.css"  media="screen,projection"/>
    <!--      font awesome-->
    <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
      body {
      background: url("images/login2.jpg");
      background-size: 100% 100%;
      background-repeat:   no-repeat;
      top: 0;
      }
      body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
      }
      main {
      flex: 1 0 auto;
      }
    </style>
  </head>
  <body>
    <header>
      <script>
        function look(){
          alert("Working");
          var username=$("#username").val();
          alert(username);
        }
      </script>
    </header>
    <div class="section"></div>
    <main>
      <center>
        <h5 style="font-family: 'Dynalight';font-size: 35px;color:#26a69a">Sign In</h5>
        <div class="section"></div>
        <form class="col s8 offset-s2" method="Get" action="Lect.php" style="background: rgba(128,128,128,0.3); width:200px; border-radius:20px; padding-bottom:20px;">
          <div class='row'>
            <div class='col s12'>
            </div>
          </div>
          <div class='row'>
            <div class='input-field col s12'>
              <input type="text" id="username" placeholder="Enter your Username" />
            </div>
          </div>
          <div class='row'>
            <div class='input-field col s12'>
              <input type="password" id="password" placeholder="Enter password"/>
            </div>
            <label>
            <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
            </label>
          </div>
          <br />
          <center>
            <div class='row'>
              <a class="waves-effect waves-light btn" type="submit" onclick="login()" name="send" value="submit">Login</a>
            </div>
          </center>
        </form>
        </div>
        </div>
        <a href="#!">Create account</a>
      </center>
    </main>
    <footer class="page-footer" style="padding:25px;">
      <div class="divider"></div>
      <div class="footer-copyright">
        <div class="container">
          © 2017 RollCall
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="MyScript.js"></script>
  </body>
</html>