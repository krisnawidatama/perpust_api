<?php
require_once("config/config.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $siteinfo['_site_name_'] ?></title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">
    </head>
    <body style="background:#F7F7F7;">
        <div id="wrapper">
            <section class="login_content">
                <h1>Insert Username & Password</h1>
                <form action="proses_login.php" method="post" accept-charset="utf-8">
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Username" required autofocus="true" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>
                    <div>
                        <select name="status" class="form-control" required>
                            <option value="admin">Administrator</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <div style="margin-top: 10px;">
                        <button type="submit" class="btn pull-right btn-lg btn-primary" style="margin-right: 0px;">Login</button>
                    </div>
                </form>
            </section>
        </div>
    </body>
</html>