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

$year = isset($_GET['year']) ? $_GET['year'] : "";
if(!$year){
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
                            <input type="number" id="select-year" min="1901" max="<?php echo date("Y"); ?>" step="1" value="<?php echo $year; ?>" />
                        </div>
                    </div>
                </div>
                <!-- Records Header End -->
            </div>

            <div class="panel">
                <!-- Records List Start -->
                <div class="records--list" data-title="Master <?php echo $master; ?>" data-month="<?php echo $year; ?>">
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

                        $query = $conn->prepare("SELECT m_file.*, m_kat_file.nama as nama_kategori FROM `m_file` INNER JOIN m_kat_file ON m_file.id_kat = m_kat_file.id WHERE YEAR(m_file.created_at) = :year ORDER BY id DESC");
                        $query->execute([":year" => $year]);
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

        $('#select-year').on("change", function(){
            let value = $(this).val();
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace(/([?&])year=[^&]*(&|$)/, '$1year=' + value + '$2');
            window.location.href = newUrl;
        });
    });
</script>

<!-- Page Level Scripts -->

</body>
</html>
