
<?php
session_start();
$api_categories_list = "http://localhost/perpus/rest_api/student/select.php";
$json_list = file_get_contents($api_categories_list);
if (!isset($_SESSION['wxINFO'])) {
    header("Location: http://" . $siteinfo['_site_url_'] . "/");
    exit;
}
include("header.php");
include("menu.php");
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel" >
                    <?php
                    $info = isset($_GET['info']) ? $_GET['info'] : '';
                    $msg = isset($_GET['msg']) ? $_GET['msg'] : '';
                    if (!empty($info)) {
                        echo '<h4>Status: ' . $msg . '</h4>';
                    }
                    ?>
                    <div class="x_title">
                        <h2>Students</h2>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                    ?>
                    <table id="tabelkzu" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $array = json_decode($json_list, true);
                            $result = isset($array['result']) ? $array['result'] : array();
                            foreach ($result as $dataz):
                                ?>
                                <tr>
                                    <td><?= $dataz['uid'] ?></td>
                                    <td><?= $dataz['nama'] ?></td>
                                    <td><?= $dataz['address'] ?></td>
                                    <td><?= $dataz['phone_number'] ?></td>
                                    <td><a href="edit_student.php?id=<?= $dataz['idstudent'] ?>">Edit</a> <br> <a href="student_delete_processing.php?id=<?= $dataz['idstaff'] ?>" onclick="return confirm('Are you sure?')">Delete</a> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel" >
                    <div class="x_title">
                        <h2>Insert New Data</h2>
                        <div class="clearfix"></div>
                    </div>
                    <form method="post" action="student_processing.php" class="form-horizontal form-label-left" accept-charset="utf-8">
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input class="form-control" type="text" id="user_name" name="user_name" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" id="pass_word" name="pass_word" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ID Number</label>
                            <input class="form-control" type="number" id="uid" name="uid" placeholder="ID Number" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input class="form-control" type="text" name="address" id="address" placeholder="Address" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" id="ph_number" type="text" name="ph_number" placeholder="Phone Number" required>
                        </div>
                        <button type="submit" id="btnSubmit" class="btn btn-primary pull-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#ttl').datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
        $('#tgl_daftar').datepicker({
            format: 'dd-mm-yyyy'
        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
    });
</script>