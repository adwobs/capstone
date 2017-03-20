<!DOCTYPE html>
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
<!--      cordova library-->
      <link rel="stylesheet"  href="css/jquery.mobile.structure.css" />
  <link rel="stylesheet" href="css/jquery.mobile.theme.css" />
  <script src="scripts/jquery.js"></script>
  <script src="scripts/jquery.mobile.js"></script>
  <script type="text/javascript" src="cordova.js"></script>
  <script type="text/javascript" src="scripts/platformOverrides.js"></script>
  <script type="text/javascript" src="scripts/index.js"></script>
      
    <style>
        body {
            background: url("images/background.jpg");
        }
      body {
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
          <div class="col s4" style="font-family: 'Dynalight';font-size: 22px;color:#26a69a">RollCall
          </div>
          <div class="right">
            <div class="col s4"><a id="scanBarcode"><i class="fa fa-qrcode fa-2x" aria-hidden="true" style="color:#26a69a"></i></a>
            </div>
          </div>
          <div class="right">
            <div class="col s4"><a><i class="fa fa-camera fa-2x" aria-hidden="true" style="color:#26a69a"></i></a>
            </div>
          </div>
    </header>
    <!--this is the body-->
    <main>
        <div class="row">
            <div class="col s12 offset-s8">
                <input type="text" name="search" placeholder="Search..">
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s2">
                <a class='dropdown-button btn' href='#' data-activates='dropdown1'>Courses</a>
  <ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">Microeconomics</a></li>
      <li class="divider"></li>
    <li><a href="#!">Programming</a></li>
    <li class="divider"></li>
    <li><a href="#!">Operating Systems</a></li>
  </ul>
            </div>
            <div class="col s4 offset-s3"><br>
                <?php echo date("h:i");?>
            </div>
        </div>
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
    </main>
    <!--this is the footer-->
    <footer class="page-footer" style="padding:25px;">
        <div class="divider"></div>
<!--
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5>Footer Content</h5>
            <p>You can use rows and columns here to organize your footer content.</p>
          </div>
        </div>
      </div>
-->
      <div class="footer-copyright">
        <div class="container">
          © 2017 RollCall
          <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="css/materialize/js/materialize.min.js"></script>
        <script type="text/javascript" src="MyScript.js"></script>
  </body>
</html>