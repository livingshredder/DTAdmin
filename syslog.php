<?php
include_once 'server/config.php';
include_once 'server/functions.php';

sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php if (login_check($mysqli) == true) : ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TOWER DTAdmin <?php echo $release; ?> <?php if ($devmode == true) { echo "Developer"; }?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TOWER DTAdmin <?php echo $release; ?> <?php if ($devmode == true) { echo "Developer"; }?></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        This feature is currently not available.
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="messages.php">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                      This feature is currently not available.
                        <li>
                            <a class="text-center" href="actions.php">
                                <strong>See All Actions</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                            This feature is currently not available.
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="alerts.php">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><b><?php echo htmlentities($_SESSION['username']); ?></b> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="signout.php"><i class="fa fa-sign-out fa-fw"></i> Signout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="panel.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="statistics.php#usercount">User Counts</a>
                                </li>
                                <li>
                                    <a href="statistics.php#adminaction">Disciplinary Actions</a>
                                </li>
                                <li>
                                    <a href="statistics.php#servereconomy">Server Economy</a>
                                </li>
                                <li>
                                    <a href="statistics.php#serveruptime">Server Uptime</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="bans.php"><i class="fa fa-ban fa-fw"></i> Ban Management</a>
                        </li>
                        <li>
                            <a href="users.php"><i class="fa fa-users fa-fw"></i> User Administration</a>
                        </li>
                        <li>
                            <a href="rcon.php"><i class="fa fa-window-maximize fa-fw"></i> Remote Console</a>
                        </li>
                        <li>
                            <a href="servers.php"><i class="fa fa-server fa-fw"></i> Server Management</a>
                        </li>
                        <li>
                            <a href="bugs.php"><i class="fa fa-bug fa-fw"></i> Server Stability</a>
                        </li>
                        <li>
                            <a href="syslog.php"><i class="fa fa-cogs fa-fw"></i> System Event Log</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">System Event Log</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
              <thead>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Event ID: activate to sort column descending" style="width: 90px;">Event ID</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 90px;">Username</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Event Time: activate to sort column descending" style="width: 100px;">Event Time</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Reason: activate to sort column descending" style="width: 200px;">Reason</th>
                <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="User IP: activate to sort column descending" style="width: 150px;">User IP</th>
              </thead>
              <?php if ($stmt = $mysqli->prepare("SELECT event, user_id, username, time, reason, clientip
                  FROM syslog
                  LIMIT 20")) {
                    $stmt->execute();
                    $stmt->bind_result($event, $user_id, $username, $time, $reason, $clientip);
                    while($row = $stmt->fetch()) { ?>
                     <tr>
                      <td><?php echo $event; ?></td>
                      <td><?php echo $username; ?></td>
                      <td><?php echo $time; ?></td>
                      <td><?php echo $reason; ?></td>
                      <td><?php echo $clientip; ?></td>
                    </tr>
                   <?php } $stmt->close(); } ?>
                 </table>


                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="navbar-fixed-bottom" style="text-align:center; font-size:80%;">
            TOWER DTAdmin © 2016 <a href="https://www.towerdevs.xyz">TOWER Devs</a>. All rights reserved. Unauthorized access to this web page may result in prosecution.
          </footer>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/raphael.min.js"></script>
    <script src="js/morris.min.js"></script>
    <!--<script src="data/morris-data.js"></script>-->

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>
<?php else : ?>
<head>
  <title>Redirecting...</title>
  <script src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function(){
       window.location.href = "login.php?signoutreason=Please+log+in.";
   });
</script>
</head>
<body>
  Please wait while you are redirected to the login page.
</body>
<?php endif; ?>
</html>
