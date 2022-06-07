<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Dashboard</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-git-repository-commits-line"></i> <span data-key="t-widgets">Laporan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#contact" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="contact">
                        <i class="ri-contacts-book-2-line"></i> <span data-key="t-maps">Kontak</span>
                    </a>
                    <div class="collapse menu-dropdown" id="contact">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('contact.create')}}" class="nav-link" data-key="t-google">
                                    Tambah Kontak
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contact.index')}}" class="nav-link" data-key="t-vector">
                                    Data Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title"><span data-key="t-menu">Finances</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-bank-fill"></i> <span data-key="t-widgets">Kas & Bank</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-shopping-cart-2-line"></i> <span data-key="t-widgets">Penjualan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-price-tag-3-line"></i> <span data-key="t-widgets">Pembelian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-currency-line"></i> <span data-key="t-widgets">Biaya</span>
                    </a>
                </li>

                <li class="menu-title"><span data-key="t-menu">Lainnya</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-ancient-gate-line"></i> <span data-key="t-widgets">Pengaturan Aset</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-survey-line"></i> <span data-key="t-widgets">Daftar Akun</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="widgets.html">
                        <i class="ri-inbox-archive-fill"></i> <span data-key="t-widgets">Product</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#setting" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="setting">
                        <i class="ri-settings-5-line"></i> <span data-key="t-maps">Setting</span>
                    </a>
                    <div class="collapse menu-dropdown" id="setting">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="maps-google.html" class="nav-link" data-key="t-google">
                                    Perusahaan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="maps-vector.html" class="nav-link" data-key="t-vector">
                                    Pengguna
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
