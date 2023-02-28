
<?php
session_start();
//require_once("../lib/link.php");
$id = filter_input(INPUT_GET, 'id');
$api_categories_list = "http://localhost/perpus/rest_api/staff/detail.php?id=" . $id;
$json_list = file_get_contents($api_categories_list);
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
            <div class="col-md-3 col-sm-12 col-xs-12">
                &nbsp;
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel" >
                    <div class="x_title">
                        <?php
                        $info = isset($_GET['info']) ? $_GET['info'] : '';
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                        if (!empty($info)) {
                            echo '<h4>Status: ' . $msg . '</h4>';
                        }
                        $array = json_decode($json_list, true);
                        $result = isset($array['result']) ? $array['result'] : array();
                        $result2 = isset($array['result2']) ? $array['result2'] : array();
                        ?>
                        <h2>Edit Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <form method="post" action="staff_edit_processing.php" class="form-horizontal form-label-left" accept-charset="utf-8">       
                        <input type="hidden" name="id_staff" value="<?= $result['idstaff'] ?>">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input class="form-control" type="text" id="user_name" name="user_name" placeholder="Username" value="<?= $result2['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" id="pass_word" name="pass_word" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Re-type Password</label>
                            <input class="form-control" type="password" id="pass_word2" name="pass_word2" placeholder="Re-type Password">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama" value="<?= $result['name'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?= $result['address'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control" id="e_mail" type="email" name="e_mail" placeholder="Email" value="<?= $result['email'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" id="ph_number" type="text" name="ph_number" placeholder="Phone Number" value="<?= $result['telp'] ?>" required>
                        </div>
                        <a href="staff.php"><button type="button" id="btnSubmit" class="btn btn-danger pull-left">Back</button></a>
                        <button type="submit" id="btnSubmit" class="btn btn-primary pull-right">Save</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                &nbsp;
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>