<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home') }}">Coding Tes Deptech</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">SL</a>
        </div>
        <ul class="sidebar-menu">
            <li class="nav-item dropdown ">
                <a href="{{ route('user.index') }}" class="nav-link"><i class="far fa-user"></i><span>Users</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('siswa.index') }}" class="nav-link"><i class="far fa-user"></i><span>Siswa</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('eskul.index') }}" class="nav-link"><i class="fas fa-columns"></i><span>Extrakulikuler</span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a href="{{ route('list.index') }}" class="nav-link"><i class="fa-solid fa-circle-info"></i><span>List Data</span>
                </a>
            </li>
    </aside>
</div>
