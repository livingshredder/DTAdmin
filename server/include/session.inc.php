<?php

function sec_session_start() {
    $session_name = 'dtadmin_session';
    session_name($session_name);

    $secure = true;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?code=500X");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        $secure,
        $httponly);

    session_start();            // Start the PHP session
    session_regenerate_id(true);    // regenerated the session, delete the old one.
}

function login($userid, $password, $mysqli) {
    $clientip = $_SERVER['REMOTE_ADDR'];
    if ($stmt = $mysqli->prepare("SELECT id, userid, password
        FROM members
       WHERE userid = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $userid);
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result($user_id, $username, $db_password);
        $stmt->fetch();

        if ($stmt->num_rows == 1) {

            if (checkbrute($user_id, $mysqli) == true) {
                $errorreason = "lockedout";
                return "lockedout"; // custom ajax action here
            } else {
                if (password_verify($password, $db_password)) {
                     //correct pass
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/",
                                                                "",
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512',
                              $db_password . $user_browser);
                    $errorreason = "correctuser";
                    $now = time();
                    $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                                    VALUES ('$user_id', '$username', '$now', 'Administrator logged in', '$clientip')");
                    return "correctuser";
                } else {
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time, clientip)
                                    VALUES ('$user_id', '$now', '$clientip')");
                    $errorreason = "incorrectpass";
                    $now = time();
                    $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                                    VALUES ('$user_id', '$username', '$now', 'Incorrect password attempt', '$clientip')");
                    return "incorrectpass";
                }
            }
        } else {
            // No user exists.
            $errorreason = "usernotexist";
            $now = time();
            $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                            VALUES ('NONE', '$userid', '$now', 'Incorrect username attempt', '$clientip')");
            return "usernotexist";
        }
    }
}

function checkbrute($user_id, $mysqli) {
  $clientip = $_SERVER['REMOTE_ADDR'];
    $now = time();
    $valid_attempts = $now - (2 * 60 * 60);

    if ($stmt = $mysqli->prepare("SELECT time
                             FROM login_attempts
                             WHERE user_id = ?
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
  $clientip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SESSION['user_id'],
              $_SESSION['username'],
              $_SESSION['login_string'])) {

        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];

        if ($stmt = $mysqli->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
                if (hash_equals($login_check, $login_string) ){
                    //loggedin
                    return true;
                } else {
                    //notloggedin
                    $now = time();
                    $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                                    VALUES ('$user_id', 'NONE', '$now', 'Password hash match error', '$clientip')");
                    return false;
                }
            } else {
                //notloggedin
                $now = time();
                $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                                VALUES ('$user_id', 'NONE', '$now', 'Password hash match error', '$clientip')");
                return false;
            }
        } else {
            //notloggedin
            $now = time();
            $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                            VALUES ('$user_id', 'NONE', '$now', 'User match error', '$clientip')");
            return false;
        }
    } else {
        //notloggedin
        $now = time();
        $mysqli->query("INSERT INTO syslog(user_id, username, time, reason, clientip)
                        VALUES ('NOUSER', 'NONE', '$now', 'Session variables not set', '$clientip')");
        return false;
    }
}

function remote_login_check($mysqli, $uid, $uname, $lstring, $ubrowser) {
  $clientip = $_SERVER['REMOTE_ADDR'];
    if (isset($uid, $uname, $lstring, $ubrowser)) {
        if ($stmt = $mysqli->prepare("SELECT password
                                      FROM members
                                      WHERE id = ? LIMIT 1")) {
            $stmt->bind_param('i', $uid);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $ubrowser);
                if (hash_equals($login_check, $lstring) ){
                    //loggedin
                    return true;
                } else {
                    //notloggedin
                    $now = time();
                    $mysqli->query("INSERT INTO syslog(user_id, time, reason, clientip)
                                    VALUES ('$uid', '$now', 'Password hash match error', '$clientip')");
                    return false;
                }
            } else {
                //notloggedin
                $now = time();
                $mysqli->query("INSERT INTO syslog(user_id, time, reason, clientip)
                                VALUES ('$uid', '$now', 'Password hash match error', '$clientip')");
                return false;
            }
        } else {
            //notloggedin
            $now = time();
            $mysqli->query("INSERT INTO syslog(user_id, time, reason, clientip)
                            VALUES ('$uid', '$now', 'User match error', '$clientip')");
            return false;
        }
    } else {
        //notloggedin
        $now = time();
        $mysqli->query("INSERT INTO syslog(user_id, time, reason, clientip)
                        VALUES ('NOUSER', '$now', 'Session variables not set', '$clientip')");
        return false;
    }
}

?>