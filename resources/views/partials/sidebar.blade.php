<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <h6 class="brand-text">Sistem Informasi Surat Menyurat</h6>
        <h4 class="brand-text font-weight-bold">MTSn 10 Pekanbaru</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @hasrole('Siswa')
                <li class="nav-item">
                    <a href="{{ route('pengajuan-surat.create') }}" class="nav-link {{ (request()->is('pengajuan/surat')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Pengajuan Surat
                        </p>
                    </a>
                </li>
                @endhasrole

                @hasrole('Alumni')
                <li class="nav-item">
                    <a href="{{ route('pengajuan-legalisir.create') }}" class="nav-link {{ (request()->is('pengajuan/legalisir')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Pegajuan Legalisir
                        </p>
                    </a>
                </li>
                @endhasrole

                @unlessrole('Siswa|Alumni')
                <li class="nav-item">
                    <a href="{{ route('permintaan-surat.index') }}" class="nav-link {{ (request()->is('permintaan/surat')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p>
                            Permintaan Surat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('permintaan-legalisir.index') }}" class="nav-link {{ (request()->is('permintaan/legalisir')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Permintaan Legalisir
                        </p>
                    </a>
                </li>
                @endunlessrole

                @hasanyrole('Staff Tata Usaha')
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('kelola-user*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Kelola User
                        </p>
                    </a>
                </li>
                @endhasanyrole

                @hasanyrole('Siswa|Alumni')
                <li class="nav-item">
                    <a href="{{ route('riwayat.index') }}" class="nav-link {{ (request()->is('riwayat')) ? 'active' : '' }}">
                        <i class="nav-icon fa fa-history"></i>
                        <p>
                            Lacak Riwayat Surat
                        </p>
                    </a>
                </li>
                @endhasanyrole

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>