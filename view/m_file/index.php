<?php
include '../../config.php';

/* Halaman ini tidak dapat diakses jika belum ada yang login(total) */
if(isset($_SESSION['email'])== 0) {
    header('Location: ../../../index.php');
}

if( $_SESSION['level_id'] == "1" ){
}else{
    echo "<script>alert('Maaf! anda tidak bisa mengakses halaman ini '); document.location.href='../admin/'</script>";
}

$master = "File";
$dba = "file";
$ket = "";
$ketnama = "Silahkan mengisi nama";
?>

<?php
include "../head.php";
?>

<body>

<!-- Wrapper Start -->
<div class="wrapper">
   <?php
   include "../header.php";
   include "../sidebar.php";
   ?>

    <!-- Main Container Start -->
    <main class="main--container">
        <!-- Page Header Start -->
        <section class="page--header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Page Title Start -->
                        <h2 class="page--title h5">Orders</h2>
                        <!-- Page Title End -->

                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="ecommerce.html">Ecommerce</a></li>
                            <li class="breadcrumb-item active"><span>Orders</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Page Header End -->

        <!-- Main Content Start -->
        <section class="main--content">
            <div class="panel">
                <!-- Records Header Start -->
                <div class="records--header">
                    <div class="title fa-shopping-bag">
                        <h3 class="h3"><?php echo $master; ?><a href="#tambah" class="btn btn-sm btn-outline-info" data-toggle="modal">Tambah Data</a></h3>
                    </div>

                    <div class="actions">
                        <form action="#" class="search">
                            <input type="text" class="form-control" placeholder="Order ID or Customer Name..." required>
                            <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Records Header End -->
            </div>

            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Master <?php echo $master; ?>">
                    <table id="dataTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Url</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th class="not-sortable">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;

                        $query = $conn->prepare("SELECT m_file.*, m_kat_file.nama as nama_kategori FROM `m_file` INNER JOIN m_kat_file ON m_file.id_kat = m_kat_file.id ORDER BY id DESC");
                        $query->execute();
                        while($data = $query->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['des'] ?></td>
                            <td><a href="<?php echo $data['url'] ?>">Lihat</a></td>
                            <td><?php echo $data['status'] ?></td>
                            <td><?php echo $data['created_at'] ?></td>
                            <td>
                                <button
                                        data-id="<?= $data['id'] ?>"
                                        data-nama="<?= $data['nama']?>"
                                        data-des="<?= $data['des']?>"
                                        data-url="<?= $data['url']?>"
                                        data-status="<?= $data['status']?>"
                                        data-created_at="<?= $data['created_at']?>"
                                        data-kategori_id="<?= $data['id_kat']?>"
                                        type="button" class="btn btn-success btn_update" href="#edit" data-toggle="modal"><i class="fa fa-edit"></i></button>
                                <a class="btn btn-danger" href="../../controller/<?php echo $dba;?>_controller.php?op=hapus&id=<?php echo $data['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">X</a>
                            </td>
                        </tr>
                        <?php $count++; } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Records List End -->
            </div>
        </section>
        <!-- Main Content End -->

        <?php
        include "../footer.php";
        ?>
    </main>
    <!-- Main Container End -->
</div>
<!-- Wrapper End -->

<!-- Modal Tambah -->
<div id="tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah <?php echo $master; ?></h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form action="../../controller/<?php echo $dba;?>_controller.php?op=tambah" method="post" id="form-tambah" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="label-text" >Kategori : </label>
                        <select name="id_kat" class="form-control">
                            <?php
                            $query = $conn->prepare("SELECT * FROM m_kat_file ORDER BY id DESC");
                            $query->execute();
                            while($data = $query->fetch()){
                            ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="label-text" >Nama : </label>
                        <input type="text" class="form-control" name="nama" placeholder="Silahkan Mengisi Nama" required/>
                    </div>

                    <div class="form-group">
                        <label class="label-text" >Deskripsi : </label>
                        <input type="text" class="form-control" name="des" placeholder="Silahkan Mengisi Deskripsi" required/>
                    </div>

                    <div class="form-group">
                        <label class="label-text" >URL : </label>
                        <input type="text" class="form-control" name="url" placeholder="Silahkan Mengisi URL" required/>
                    </div>

                    <div class="form-group">
                        <label class="label-text" >Status : </label>
                        <input type="text" class="form-control" name="status" placeholder="Silahkan Mengisi Deskripsi" required/>
                    </div>

                    <div class="form-group">
                        <label class="label-text" >Created At : </label>
                        <input type="datetime-local" class="form-control" name="created_at" placeholder="Silahkan Mengisi Created At" required/>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="tambah-btn" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah End -->

<!-- Modal Edit -->
<div id="edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit <?php echo $master; ?></h5>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="form-edit-transaksi-masuk">
                    <div class="form-group">
                        <input type="hidden" id="id_edit" name="id" />

                        <div class="form-group">
                            <label class="label-text" >Kategori : </label>
                            <select id="kategori_id_edit" name="id_kat" class="form-control">
                                <?php
                                $query = $conn->prepare("SELECT * FROM m_kat_file ORDER BY id DESC");
                                $query->execute();
                                while($data = $query->fetch()){
                                    ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nama']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="label-text" >Nama : </label>
                            <input type="text" class="form-control" id="nama_edit" name="nama" />
                        </div>

                        <div class="form-group">
                            <label class="label-text" >Deskrispi : </label>
                            <input type="text" class="form-control" id="des_edit" name="des" />
                        </div>

                        <div class="form-group">
                            <label class="label-text" >URL : </label>
                            <input type="text" class="form-control" id="url_edit" name="url" />
                        </div>

                        <div class="form-group">
                            <label class="label-text" >Status : </label>
                            <input type="text" class="form-control" id="status_edit" name="status" />
                        </div>

                        <div class="form-group">
                            <label class="label-text" >Created At : </label>
                            <input type="datetime-local" class="form-control" id="created_at_edit" name="created_at" />
                        </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btn-save-update" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit End -->

<!-- Scripts -->
<script src="../../assets/js/jquery.min.js"></script>
<script src="../../assets/js/jquery-ui.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/jquery.sparkline.min.js"></script>
<script src="../../assets/js/raphael.min.js"></script>
<script src="../../assets/js/morris.min.js"></script>
<script src="../../assets/js/select2.min.js"></script>
<script src="../../assets/js/jquery-jvectormap.min.js"></script>
<script src="../../assets/js/jquery-jvectormap-world-mill.min.js"></script>
<script src="../../assets/js/horizontal-timeline.min.js"></script>
<script src="../../assets/js/jquery.validate.min.js"></script>
<script src="../../assets/js/jquery.steps.min.js"></script>
<script src="../../assets/js/dropzone.min.js"></script>
<script src="../../assets/js/ion.rangeSlider.min.js"></script>
<script src="../../assets/js/datatables.min.js"></script>
<script src="../../assets/js/main.js"></script>

<script>
    $(document).ready(function () {
        $("#dataTable").DataTable({
            responsive: true,
            dom: '<"topbar"<"toolbar"><"right"li>><"table-responsive"t>p',
        });

        $(".records--list").find(".toolbar").text($(".records--list").data('title'));

        $("#tambah-btn").click(function (){
            if(!$("#form-tambah")[0].checkValidity()){
                $("#form-tambah")[0].reportValidity();
                return
            }

            $("#form-tambah").submit();
        });

        $(document).on('click','.btn_update',function(){
            let kategori_id = $(this).attr('data-kategori_id')

            $('#kategori_id_edit option[value="' + kategori_id + '"]').prop('selected', true);
            $("#id_edit").val($(this).attr('data-id'))
            $("#nama_edit").val($(this).attr('data-nama'));
            $("#des_edit").val($(this).attr('data-des'));
            $("#url_edit").val($(this).attr('data-url'));
            $("#status_edit").val($(this).attr('data-status'));
            $("#created_at_edit").val($(this).attr('data-created_at'));
            $('#edit').modal('show');
        });

        $('#btn-save-update').click(function(){
            $.ajax({
                url: "edit.php",
                type : 'post',
                data : $('#form-edit-transaksi-masuk').serialize(),
                success: function(data){
                    var res = JSON.parse(data);
                    if (res.code == 200){
                        alert('Success Update');
                        location.reload();
                    }
                }
            })
        });
    });
</script>

<!-- Page Level Scripts -->

</body>
</html>
