<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <meta property="og:title" content="Noble-investments">
<meta property="og:description" content="Invest today.">
<meta property="og:image" content="https://noble-investments.org/assets/images/favicon-32x32.png">
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="assets/css/popup_style.css" type="text/css">
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Noble-investments</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper" >
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" style="z-index:9999 !important;" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Noble</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="dashboard.php"><i class="bx bx-right-arrow-alt"></i>Main</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
					<ul>
						<li> <a href="user-profile.php"><i class="bx bx-right-arrow-alt"></i>Profile</a>
						</li>
						<li> <a href="downline.php"><i class="bx bx-right-arrow-alt"></i>downlines</a>
						</li>
					</ul>
				</li>
				
			
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
						</div>
						<div class="menu-title">Transactions</div>
					</a>
					<ul>
						<li> <a href="user_tran.php"><i class="bx bx-right-arrow-alt"></i>Sold</a>
						</li>
						<li> <a href="user_bought.php"><i class="bx bx-right-arrow-alt"></i>Bought</a>
                        </li>
                        <li> <a href="earning.php"><i class="bx bx-right-arrow-alt"></i>Referral</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">support</div>
					</a>
					<ul>
                    <li> <a href="faq.php"><i class="bx bx-right-arrow-alt"></i>Questions</a>
						</li>
						<li> <a href="https://chat.whatsapp.com/HXnotDH4AFqCJPU2hfD4zc"><i class="bx bx-right-arrow-alt"></i>Whatsapp</a>
						</li>
						<li> <a href="https://t.me/joinchat/UHT2P23B2RJjYjg0"><i class="bx bx-right-arrow-alt"></i>Telegram</a>
						</li>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Facebook</a>
						</li>
					</ul>
				</li>

				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-user-circle"></i>
						</div>
						<div class="menu-title">Logout</div>
					</a>
					<ul>
                    <li> <a href="logout.php"><i class="bx bx-right-arrow-alt"></i>Logout</a>
						</li>
						
					</ul>
				</li>
				
				
			</ul>
			<!--end navigation-->
		</div>

		<!--end sidebar wrapper -->
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center"  style="z-index:9999 !important;">
				<nav class="navbar navbar-expand bg-gradient-orange">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Referrals</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Report</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Payments</div>
										</div>
										
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
								 href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
								 <span class="alert-count">1</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger">
													<i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">support<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">your account has been activated</p>
												</div>
											</div>
										</a>
										
									</div>
									
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" 
								href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								 <span class="alert-count">1</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/kenyan.jpg" 
													class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">support <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">your account is now active</p>
												</div>
											</div>
										</a>
								
									</div>
								
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                        
                        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/kenyan.jpg" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo $customer_username;?></p>
							
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end" style="z-index:9999 !important;">
							<li><a class="dropdown-item" href="user-profile.php"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="user-profile.php"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							<li><a class="dropdown-item" href="dashboard.php"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="dashboard.php"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
						
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="logout.php"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->