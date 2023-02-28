
<?php
session_start();
require_once("../system/fungsi.php");
require_once("../config/config.php");
require_once("../rest_api/api_staff.php");
$staff = new Api_staff();
$make = new Core();
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

                        <h2>Anggota Perpus</h2> ---
                        <!-- <button class="btn btn-info btn-xs" type="button" data-target="#modalAdd" data-toggle="modal">Tambah</button> -->
                        <button class="btn btn-info btn-xs" type=button id="openmodal">Tambah</button>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php
                    ?>
                    <table id="tabelkzu" class="table table-bordered table-striped dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Tgl daftar</th>
                                <th>Tgl berakhir</th>
                                <th>UID</th>
                                <th>Aktif / Tdk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data_z = $staff->get_all();
                            $datax = json_decode($data_z, true);
                            //echo $data;
                            //echo $datax['data'];
                            $data1['data1'] = $datax;
                            foreach ($datax['data'] as $dataz):
                            ?>
                            <tr>
                                <td><?= $dataz['nama'] ?></td>
                                <td><?= $dataz['ttl'] ?></td>
                                <td><?= $dataz['tgl_daftar'] ?></td>
                                <td><?= $dataz['tgl_berakhir'] ?></td>
                                <td><?= $dataz['uid'] ?></td>
                                <td><?= $dataz['status_aktif'] ?></td>
                                <td><?php echo "<button class='btn btn-xs btn-round btn-info' type='button' onClick=editModal(".$dataz['id_anggota'].")>Edit</button> "?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                    <!-- <div id="content"></div> -->
                    <!-- /isi -->

                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal add -->
<div class="modal fade modal-wide" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2"></h4>
            </div>
            <div class="modal-body">
                <form id="formAdd" class="form-horizontal form-label-left" accept-charset="utf-8">
                    <input type="hidden" name="type" id="type" value="">
                    <input type="hidden" name="id_ang" id="id_ang" value="">
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">TTL</label>
                        <input class="form-control" type="text" name="ttl" id="ttl" placeholder="TTL" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tgl daftar</label>
                        <input class="form-control" id="tgl_daftar" type="text" name="tgl_daftar" placeholder="Tgl daftar" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tgl Berakhir</label>
                        <input class="form-control" id="tgl_berakhir" type="text" name="tgl_berakhir" placeholder="Tgl berakhir" required="">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Status Aktif</label>
                        <select class="form-control" name="status_aktif" id="status_aktif">
                            <option value="1">Aktif</option>
                            <option value="0">Tdk Aktif</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger  btn-round btn-sm" data-dismiss="modal">Close</button>
                <button type="button" id="btnSubmit" class="btn btn-primary btn-round btn-sm"></button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- /modal add -->
<!-- /page content -->
<?php include 'footer.php' ?>


<script type="text/javascript">
    $(document).ready(function () {

        // tgl daftar
        $('#tgl_daftar').datepicker({
            format: 'yyyy-mm-dd',

        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });
        // tgl berakhir
        $('#tgl_berakhir').datepicker({
            format: 'yyyy-mm-dd',

        }).on('changeDate', function (e) {
            $(this).datepicker('hide');
        });

        // click modal
        $('#openmodal').click(function (event) {
            // console.log('aaa');
            // tambah type
            $('#formAdd')[0].reset();
            $('#type').val('new');
            $('#myModalLabel2').html('Tambah Anggota');
            $('#btnSubmit').html('Simpan');
            $('#modalAdd').modal('show');
        });
        // submit form
        $('#btnSubmit').click(function (event) {
            // event.preventDefault();
            // validasi input
            // $('#formAdd').valid();
            // kumpulkan data inputan
            dataInput = {
                type: $('#type').val(),
                id_ang: $('#id_ang').val(),
                nama: $('#nama').val(),
                ttl: $('#ttl').val(),
                tgl_daftar: $('#tgl_daftar').val(),
                tgl_berakhir: $('#tgl_berakhir').val(),
                status_aktif: $('#status_aktif').val()
            };

            console.log(dataInput);
            $.ajax({
                url: 'proses_anggota.php',
                type: 'POST',
                dataType: 'json',
                data: dataInput,
            })
                    .success(function (res) {
                        console.log(res);
                        $.notify(res.pesan, res.type);
                        $('#modalAdd').modal('hide');
                        $('#formAdd')[0].reset();
                        // $('#modalAdd').remove();
                        dt.ajax.reload();
                    });

        });

    });
   
    function cetakKartu(id_ang)
    {
        if (id_ang)
        {
            var left = (screen.width / 2) - (800 / 2);
            var right = (screen.height / 2) - (640 / 2);

            var url = 'getKartuAnggota.php?uid=' + id_ang;

            window.open(url, '', 'width=800, height=640, scrollbars=yes, left=' + left + ', top=' + top + '');
        } else {
            alert('UID tidak diketahui');
        }

    }
</script>