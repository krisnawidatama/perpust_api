<?php
session_start();
require_once("../config/config.php");
if (!isset($_SESSION['wxINFO'])) {
    header("Location: http://" . $siteinfo['_site_url_'] . "/");
    exit;
}
include("header.php");
include("menu.php")
?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >
                    <div class="x_title">
                        <h2>You're Logged in As Administrator</h2>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<?php include ("footer.php") ?>