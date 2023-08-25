   <!-- ======= Sidebar ======= -->
   <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link  {{ Request::is('dashboard') ? 'active':'' }} collapsed " href="/dashboard">
                <i class='bi bi-grid'></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active': '' }} collapsed" href="/dashboard/posts">
                <i class='bi bi-book'></i>
                <span>Article</span>
            </a>
        </li><!-- End Article Nav -->


@can('admin')

    <li class="nav-heading">Admin</li>

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('dashboard/categories*') ? 'active':'' }} collapsed " href="/dashboard/categories">
            <i class='bi bi-server'></i>
            <span>Manajemen Categories</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link  {{ Request::is('dashboard/allpost*') ? 'active':'' }} collapsed " href="/dashboard/allpost">
            <i class='bi bi-server'></i>
            <span>Manajemen Post</span>
        </a>
    </li><!-- End Dashboard Nav -->
@endcan

<li>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="nav-link collapsed text-bold" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span> Logout</span>
        </button>
    </form>
</li>
</ul>


</aside><!-- End Sidebar-->


