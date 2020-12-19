<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
				<div class="sidebar-brand-icon rotate-n-15">
						<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Pustaka Booking</div>
		</a>

		<!-- Divider -->
		<hr class="sidebar-divider my-0">

		<!-- Nav Item - Dashboard -->
		<li class="nav-item active">
				<a class="nav-link" href="<?= base_url('admin'); ?>">
						<i class="fas fa-fw fa-tachometer-alt"></i>
						<span>Dashboard</span></a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		<!-- Looping Menu -->

		<!-- Heading -->
		<div class="sidebar-heading">
				Master Data	
		</div>

		<!-- Nav Item - Dashboard -->
		<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('buku/kategori'); ?>">
						<i class="fas fa-fw fa-clipboard-list"></i>
						<span>Kategori Buku</span>
				</a>
		</li>

		<li class="nav-item">
				<a class="nav-link collapsed" href="<?= base_url('buku'); ?>">
						<i class="fas fa-fw fa-book"></i>
						<span>Data Buku</span>
				</a>
		</li>

		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
				<a class="nav-link collapsed" href="">
						<i class="fas fa-fw fa-users"></i>
						<span>Data Anggota</span>
				</a>
		</li>

		<!-- Divider -->
		<hr class="sidebar-divider">

		
		<!-- Sidebar Toggler (Sidebar) -->
		<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
		</div>

</ul>

<!-- ================================ End of Sidebar =================================== -->
