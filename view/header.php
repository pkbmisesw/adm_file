<!-- Navbar Start -->
<header class="navbar navbar-fixed">
    <!-- Navbar Header Start -->
    <div class="navbar--header">
        <!-- Logo Start -->
        <a href="index.html" class="logo">
            <img src="../../assets/img/logo.png" alt="">
        </a>
        <!-- Logo End -->

        <!-- Sidebar Toggle Button Start -->
        <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <!-- Sidebar Toggle Button End -->
    </div>
    <!-- Navbar Header End -->

    <!-- Sidebar Toggle Button Start -->
    <a href="#" class="navbar--btn" data-toggle="sidebar" title="Toggle Sidebar">
        <i class="fa fa-bars"></i>
    </a>
    <!-- Sidebar Toggle Button End -->

    <!-- Navbar Search Start -->
    <div class="navbar--search">
        <form action="search-results.html">
            <input type="search" name="search" class="form-control" placeholder="Search Something..." required>
            <button class="btn-link"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- Navbar Search End -->

    <div class="navbar--nav ml-auto">
        <ul class="nav">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-bell"></i>
                    <span class="badge text-white bg-blue">7</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="mailbox_inbox.html" class="nav-link">
                    <i class="fa fa-envelope"></i>
                    <span class="badge text-white bg-blue">4</span>
                </a>
            </li>

            <!-- Nav Language Start -->
            <li class="nav-item dropdown nav-language">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <img src="../../assets/img/flags/us.png" alt="">
                    <span>English</span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="">
                            <img src="../../assets/img/flags/de.png" alt="">
                            <span>German</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../../assets/img/flags/fr.png" alt="">
                            <span>French</span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="../../assets/img/flags/us.png" alt="">
                            <span>English</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Nav Language End -->

            <!-- Nav User Start -->
            <li class="nav-item dropdown nav--user online">
                <a href="#" class="nav-link" data-toggle="dropdown">
                    <img src="../../assets/img/avatars/avatar.png" alt="" class="rounded-circle">
                    <span><?php echo $_SESSION['nama']; ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu">
                    <li><a href="profile.html"><i class="far fa-user"></i>Profile</a></li>
                    <li><a href="mailbox_inbox.html"><i class="far fa-envelope"></i>Inbox</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i>Settings</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a href="lock-screen.html"><i class="fa fa-lock"></i>Lock Screen</a></li>
                    <li><a href="../../logout.php"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
            </li>
            <!-- Nav User End -->
        </ul>
    </div>
</header>
<!-- Navbar End -->