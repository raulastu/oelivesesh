<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html ng-app> 
  <head>
    <title>OE Live Scheduler</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>


  </head>
  <body ng-controller="SchedulesCtrl">
      <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">OE Live Session Scheduler</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li ><a href="logout.php">Logout</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
      <p><?php echo "Hello ".$_SESSION['user']."!";?>
        <lu>
          <li>This schedule is only for Live Sessions. You can check the Units anytime you want.</li>
          <li>It's helpful check grammar related to today's topic before entering a Live Session.</li>
        </lu>
      <!-- <input type="text" ng-model="yourName">Hello {{yourName}} -->
      <table class="table table-condensed table-striped table-hover">
        <thead>
          <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
          </tr>
        </thead>
        <tbody>
<?php
        for ($i=0; $i < 24; $i++) { 
?>
          <tr>
            <td><?php echo $i;?></td>
<?php
              for ($j=0; $j < 7; $j++) {
?>
            <td>
              <button class='btn btn-small' ng-model="schedules"
                ng-bind-template="<?php echo "{{schedules['_".$j."_".$i."']}}";?>"
                ng-click = "setSchedule(<?php echo "'_".$j."_".$i."'";?>)">
                  
              </button>
            </td>
<?PHP
            }
?>
          </tr>
<?php
        }
?>
        </tbody>
      </table>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/angular1.0.2.min.js"></script>
    <script src="js/controller.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>