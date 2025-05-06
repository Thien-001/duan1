<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('') }}css/admin.css">
    <link rel="stylesheet" href="{{ asset('') }}js/admin.css">

    <link rel="stylesheet" href="{{ asset('') }}js/scriptthome.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


	<title>Mega Watch</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			{{-- <i class='bx bxs-smile'></i> --}}
            {{-- <i><img src="{{ asset('') }}img/logonho.png" alt="" width="50px" border-radius="15px"></i> --}}
            <img src="{{ asset('') }}img/logonew.png" alt="" width="280px" margin="10px" >

{{--
			<span class="text">MEGA WATCH</span> --}}
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="/admin">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			{{-- <li {{Route::is('/admin/category') ? 'class=active' : ''}}> --}}
                <li>
				<a href="/admin/category">
                    <i class='bx bx-category' ></i>
					<span class="text">Danh mục sản phẩm</span>
				</a>
			</li>
			<li>
				<a href="/admin/product">

					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Sản phẩm</span>
				</a>
			</li>
			<li>
				<a href="/admin/user">
					<i class='bx bxs-user' ></i>
					<span class="text">Người dùng</span>
				</a>
			</li>
			<li>
				<a href="/admin/order">
					<i class='bx bxs-cart' ></i>
					<span class="text">Đơn hàng</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="/logout" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">0</span>
			</a>
			<a href="#" class="profile">
				<img src="{{ asset('') }}img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		@yield('bodyadmin')
	</section>
	<!-- CONTENT -->
    <script>
        const switchMode = document.getElementById('switch-mode');


        switchMode.addEventListener('change', function () {
            if(this.checked) {
                document.body.classList.add('dark');
            } else {
                document.body.classList.remove('dark');
            }
        })


    </script>
    {{-- <script src="{{ asset('') }}js/admin.css"></script> --}}
</body>
</html>
