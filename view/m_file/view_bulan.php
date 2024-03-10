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

$month = isset($_GET['month']) ? $_GET['month'] : "";
if(!$month){
    echo "<script>history.back();</script>";
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
                        <h3 class="h3"><?php echo $master; ?></h3>
                    </div>

                    <div class="actions">

                        <div class="search">
                            <select class="form-control" id="select-month">
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Records Header End -->
            </div>

            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Master <?php echo $master; ?>" data-month="<?php echo $month; ?>">
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $count = 1;

                        $query = $conn->prepare("SELECT m_file.*, m_kat_file.nama as nama_kategori FROM `m_file` INNER JOIN m_kat_file ON m_file.id_kat = m_kat_file.id WHERE MONTH(m_file.created_at) = :month ORDER BY id DESC");
                        $query->execute([":month" => $month]);
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

        let month = $(".records--list").data('month');
        $('#select-month option[value="' + month + '"]').prop('selected', true);

        $('#select-month').on("change", function(){
            let value = $(this).val();
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace(/([?&])month=[^&]*(&|$)/, '$1month=' + value + '$2');
            window.location.href = newUrl;
        });
    });
</script>

<!-- Page Level Scripts -->

</body>
</html>
