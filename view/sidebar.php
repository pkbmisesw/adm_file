<!-- Sidebar Start -->
<aside class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Profile Start -->
    <div class="sidebar--profile">
        <div class="profile--img">
            <a href="profile.html">
                <img src="../../assets/img/avatars/avatar.png" alt="" class="rounded-circle">
            </a>
        </div>

        <div class="profile--name">
            <a href="profile.html" class="btn-link"><?php echo $_SESSION['nama']; ?></a>
        </div>

        <div class="profile--nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="../../logout.php" class="nav-link" title="Logout">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar Profile End -->

    <!-- Sidebar Navigation Start -->
    <div class="sidebar--nav">
        <ul>
            <li>
                <ul>
                    <li class="active">
                        <a href="../admin/">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">Master</a>

                <ul>
                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Master File</span>
                        </a>

                        <ul>
                            <li><a href="../m_kat_file/">Master Kategori File</a></li>
                            <li><a href="../m_file/">Master File All</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Master File Period</span>
                        </a>

                        <ul>
                            <li><a href="../m_file/view_bulan.php?month=1">Master File Bulan</a></li>
                            <li><a href="../m_file/view_tahun.php?year=<?php echo date("Y"); ?>">Master File Tahun</a></li>
                            <li><a href="../m_file/view_periode.php?from=<?php echo date("Y-m-d", strtotime("-1 year", strtotime(date("Y-m-d")))); ?>&to=<?php echo date("Y-m-d"); ?>">Master File Periode</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- Sidebar Navigation End -->

</aside>
<!-- Sidebar End -->