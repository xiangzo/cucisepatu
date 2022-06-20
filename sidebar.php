<!-- Sidebar  -->
<?php
include "koneksi/koneksi.php";
session_start();
?>
<nav id="sidebar">

    <div id="dismiss">
        <i class="fa fa-arrow-left"></i>
    </div>

    <ul class="list-unstyled components">
        <li class="active"> <a href="index">Home</a></li>
        <li> <a href="about">About</a></li>
        <li> <a href="product">Treatment</a></li>
        <li> <a href="pesanan">Pesanan</a></li>
        <li> <a href="cekstatus">Cek Status</a></li>
        <li> <a href="contact">Contact us</a></li>
        <?php if (empty($_SESSION['nama'])) { ?>
            <li> <a href="login">Login</a></li>
        <?php } else if (!empty($_SESSION['nama'])) { ?>
            <li> <a href="logout">Log Out</a></li>
        <?php } ?>
    </ul>

</nav>
</div>

<div id="content">
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index">
                                        <font color="black">Feaf.id</font>
                                        <!-- <img src="images/logo.jpg" alt="#"> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="right_header_info">
                            <ul>
                                <li>
                                    <a href="#" style="color: black;">Selamat datang, <b><?php echo $_SESSION['nama'] ?></b></a>
                                </li>
                                <li>
                                    <a href="login"><img style="margin-right: 15px;" src="icon/1.png" alt="#" /></a>
                                </li>
                                <li>
                                    <a href="cekstatus"><img style="margin-right: 15px;" src="icon/2.png" alt="#" /></a>
                                </li>
                                <li>
                                    <a href="transaksi"><img style="margin-right: 15px;" src="icon/3.png" alt="#" /></a>
                                </li>

                                <li>
                                    <button type="button" id="sidebarCollapse">
                                        <img src="images/menu_icon.png" alt="#" />
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end header inner -->
    </header>
    <!-- end header -->