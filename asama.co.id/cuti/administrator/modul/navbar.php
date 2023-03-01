<?php
if ($_SESSION["level"] == 'admin'){
?>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="dashboard.php?p=cutimanual"><span class="glyphicon glyphicon-list-alt"></span> Cuti</a></li>
					<li><a href="dashboard.php?p=cuti"><span class="glyphicon glyphicon-book"></span> Data Cuti</a></li>
					<li><a href="dashboard.php?p=user"><span class="glyphicon glyphicon-book"></span> Data User</a></li>
					<li><a href="dashboard.php?p=pegawai"><span class="glyphicon glyphicon-book"></span> Data Pegawai</a></li>
					<li><a href="dashboard.php?p=cabang"><span class="glyphicon glyphicon-book"></span> Data Departemen</a></li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="dashboard.php?p=ubah_password"><span class="glyphicon glyphicon-lock"></span> Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
    </div>
<?php
}

elseif ($_SESSION["level"] == 'pimpinan'){
?>
	<div class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User<b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="dashboard.php?p=ubah_password"><span class="glyphicon glyphicon-lock"></span> Ubah Password</a></li>
								<li class="divider"></li>
								<li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
							</ul>
					</li>
				</ul>
			</div>
		</div>
    </div>


<?php
}
?>