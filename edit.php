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
          <?php
          if (isset($_GET['task'])) {
          if ($_GET['task'] == "edit") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit a server</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
          <?php elseif ($_GET['task'] == "delete") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Delete a server</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
          <?php elseif ($_GET['task'] == "new") : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create a new server</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                New server
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" id="newserver" action="javascript:submitCreateForm()">
                                          <div class="form-group">
                                              <label>Server Name</label>
                                              <input class="form-control" id="servername">
                                              <p class="help-block">Enter the friendly name of your server.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>IP Address</label>
                                              <input class="form-control" id="serverip">
                                              <p class="help-block">Enter your server's IP address.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>DTQuery port</label>
                                              <input class="form-control" placeholder="43105" id="dtqueryport">
                                              <p class="help-block">Enter a custom DTQuery port. If you don't know what this does, just leave it as the default.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>DTQuery secret</label>
                                              <input class="form-control" id="dtquerysecret">
                                              <p class="help-block">Enter the secret key you recieved from the DTQuery setup wizard.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>RCon port</label>
                                              <input class="form-control" placeholder="27015" id="rconport">
                                              <p class="help-block">Enter a custom RCon port. If you don't know what this does, just leave it as the default.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>RCon password</label>
                                              <input class="form-control" id="rconpassword">
                                              <p class="help-block">Enter your server's Remote Console password.</p>
                                          </div>
                                        </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Server game</label>
                                            <select class="form-control" id="servergame" disabled>
                                                <option>Garry's Mod</option>
                                                <option>Team Fortress 2</option>
                                                <option>Counter Strike: Global Offensive</option>
                                                <option>Half Life 2: Deathmatch</option>
                                                <option>Minecraft</option>
                                                <option>Synergy</option>
                                            </select>
                                            <p class="help-block">Select your server's game, as set in the DTQuery wizard.</p>
                                        </div>
                                        <div class="form-group" id="servergamemode">
                                            <label>Server gamemode</label>
                                            <select class="form-control">
                                                <option>Sandbox</option>
                                                <option>DarkRP</option>
                                                <option>Nutscript HL2RP</option>
                                                <option>TTT</option>
                                                <option>Deathrun</option>
                                                <option>Jailbreak</option>
                                                <option>Cinema</option>
                                            </select>
                                            <p class="help-block">If your server has a gamemode, select it from this list.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Administration system</label>
                                            <select class="form-control" id="serveradminsystem" disabled>
                                                <option>ULX</option>
                                                <option>FAdmin</option>
                                                <option>No system or Other</option>
                                            </select>
                                            <p class="help-block">Select your server's administrative toolkit.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Your SteamID</label>
                                            <input class="form-control" id="steamid">
                                            <p class="help-block">May be in SteamID, SteamID64, SteamID3 or CustomURL format.</p>
                                        </div>
                                        <button type="submit" class="btn btn-default">Create server</button>
                                        <button type="reset" class="btn btn-default" onclick="resetCreateForm()">Reset form</button>
                                      </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
            </div>
        <?php elseif ($_GET['task'] == "edituser" && isset($_GET['userid']) && checkUserHasPermission($mysqli, $_SESSION['user_id'], 'canmodifyusers') == true && getUserFromUserID($mysqli, $_GET['userid']) != false) : ?>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">Edit user account</h1>
                  </div>
                  <!-- /.col-lg-12 -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <div class="col-lg-12">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              Modify a user account
                          </div>
                          <div class="panel-body">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" id="adminedit" data-toggle="validator" action="javascript:confirmAdminEditForm(<?php echo $_GET['userid']; ?>)">
                                          <div class="form-group">
                                              <label>User ID</label>
                                              <p class="form-control-static"><?php echo $_GET['userid']; ?></p>
                                              <p class="help-block">The account's User ID.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>Username</label>
                                              <input class="form-control" id="username" data-minlength="1" pattern="^[_A-z0-9]{1,}$" maxlength="25" placeholder="<?php echo getUserFromUserID($mysqli, $_GET['userid'])['userid']; ?>">
                                              <p class="help-block">The user's username.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>Permission Level</label>
                                              <select class="form-control" id="profileeditpermission">
                                                <option selected disabled><?php echo ucfirst(getUserFromUserID($mysqli, $_GET['userid'])['permissionlevel']); ?></option>
                                                <?php if (ucfirst(getUserFromUserID($mysqli, $_GET['userid'])['permissionlevel']) != "User") { ?><option value="user" <?php if (canUserModifyGroup($mysqli, $_SESSION['user_id'], "user") == false) { echo "disabled"; } ?>>User</option><?php } ?>
                                                <?php if (ucfirst(getUserFromUserID($mysqli, $_GET['userid'])['permissionlevel']) != "Developer") { ?><option value="developer" <?php if (canUserModifyGroup($mysqli, $_SESSION['user_id'], "developer") == false) { echo "disabled"; } ?>>Developer</option><?php } ?>
                                                <?php if (ucfirst(getUserFromUserID($mysqli, $_GET['userid'])['permissionlevel']) != "Employee") { ?><option value="employee" <?php if (canUserModifyGroup($mysqli, $_SESSION['user_id'], "employee") == false) { echo "disabled"; } ?>>Employee</option><?php } ?>
                                                <?php if (ucfirst(getUserFromUserID($mysqli, $_GET['userid'])['permissionlevel']) != "Root") { ?><option value="root" <?php if (canUserModifyGroup($mysqli, $_SESSION['user_id'], "root") == false) { echo "disabled"; } ?> >Root</option><?php } ?>
                                              </select>
                                          </div>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Update user account</button>
                                          <p id="adminediterrorblock"></p>
                                        </div>
                                        <div class="col-lg-6">
                                          <div class="form-group">
                                              <label>First Name</label>
                                              <input class="form-control" id="firstname" data-minlength="1" pattern="^[_A-z0-9]{1,}$" maxlength="25" placeholder="<?php echo getUserFromUserID($mysqli, $_GET['userid'])['firstname']; ?>">
                                              <p class="help-block">The user's first name.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>Last Name</label>
                                              <input class="form-control" id="lastname" data-minlength="1" pattern="^[_A-z0-9]{1,}$" maxlength="25" placeholder="<?php echo getUserFromUserID($mysqli, $_GET['userid'])['lastname']; ?>">
                                              <p class="help-block">The user's last name.</p>
                                          </div>
                                          <div class="form-group">
                                              <label>Email Address</label>
                                              <input class="form-control" id="email" data-minlength="7" pattern="^[_A-z0-9]{1,}$@" maxlength="30" placeholder="<?php echo getUserFromUserID($mysqli, $_GET['userid'])['email']; ?>">
                                              <p class="help-block">For sending alerts. Only @towerdevs.xyz addresses are allowed.</p>
                                          </div>
                                      </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <div class="col-lg-12">
                                    <h2 class="page-header">DTQuery Keys</h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                          <br>
                                          <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline">
                                            <thead>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Actions: activate to sort column descending" style="width: 90px;">Actions</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Secret Key: activate to sort column descending" style="width: 50px;">Secret Key</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Note: activate to sort column descending" style="width: 150px;">Note</th>
                                              <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Time Created: activate to sort column descending" style="width: 150px;">Time Created</th>
                                            </thead>
                                            <?php if ($stmt = $mysqli->prepare("SELECT secretid, userid, secretkey, note, timecreated
                                                FROM usersecrets WHERE userid=? LIMIT 20")) {
                                                  $stmt->bind_param('i', $_GET['userid']);
                                                  $stmt->execute();
                                                  $stmt->bind_result($secretid, $userid, $secretkey, $note, $timecreated);
                                                  while($row = $stmt->fetch())
                                                  { ?>
                                                   <tr>
                                                    <td><a href="#" onclick="deleteSecretKeyConfirm()"><button type="button" class="btn btn-danger"><i class="fa fa-trash fa-fw"></i>Revoke</button></a></td>
                                                    <td><?php echo $secretkey; ?></td>
                                                    <td><?php echo $note; ?></td>
                                                    <td><?php echo $timecreated; ?></td>
                                                  </tr>
                                                 <?php } $stmt->close(); } ?>
                                               </table>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.col-lg-12 -->
                        </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
         <?php else : ?>
           <script type="text/javascript">
            window.location.href = "panel.php";
           </script>
         <?php endif; } ?>
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

    <script src="js/edit_php.js"></script>

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
