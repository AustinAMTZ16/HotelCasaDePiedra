<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active">Admin Dashboard</li>
	</ol>


</div>
<!-- Page header end -->
<!-- Main container start -->
<div class="main-container">

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="info-stats4">
				<div class="info-icon">
					<i class="icon-file-text"></i>
				</div>
				<div class="sale-num">
					<?php require '../../backend/config/Conexion.php'; ?>
					<?php
					$sql = "SELECT COUNT(*) total FROM habitaciones";
					$result = $connect->query($sql); //$pdo sería el objeto conexión
					$total = $result->fetchColumn();

					?>
					<h3><?php echo  $total; ?></h3>
					<p>HABITACIONES</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="info-stats4">
				<div class="info-icon">
					<i class="icon-tag"></i>
				</div>
				<div class="sale-num">

					<?php
					$sql = "SELECT COUNT(*) total FROM habitaciones WHERE estadha ='1'";
					$result = $connect->query($sql); //$pdo sería el objeto conexión
					$total = $result->fetchColumn();

					?>

					<h3><?php echo  $total; ?></h3>
					<p>DISPONIBLES</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="info-stats4">
				<div class="info-icon">
					<i class="icon-shopping-bag1"></i>
				</div>
				<div class="sale-num">
					<?php
					$sql = "SELECT COUNT(*) total FROM habitaciones WHERE estadha ='2'";
					$result = $connect->query($sql); //$pdo sería el objeto conexión
					$total = $result->fetchColumn();

					?>
					<h3><?php echo  $total; ?></h3>
					<p>OCUPADAS</p>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
			<div class="info-stats4">
				<div class="info-icon">
					<i class="icon-activity"></i>
				</div>
				<div class="sale-num">
					<?php
					$sql = "SELECT COUNT(*) total FROM habitaciones WHERE estadha ='3'";
					$result = $connect->query($sql); //$pdo sería el objeto conexión
					$total = $result->fetchColumn();

					?>
					<h3><?php echo  $total; ?></h3>
					<p>LIMPIEZA</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Row end -->

	<!-- Row start -->
	<div class="row gutters">
		<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="card">
				<div class="card-body">
					<div class="customScroll5">
						<div class="quick-analytics">
							<a href="#">
								<i class="icon-user1"></i>
								<?php
								$sql = "SELECT COUNT(*) total FROM clientes";
								$result = $connect->query($sql); //$pdo sería el objeto conexión
								$total = $result->fetchColumn();

								?>
								<?php echo  $total; ?> Clientes
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Row end -->

</div>
<!-- Main container end -->

</div>
<!-- Page content end -->

</div>
<!-- Page wrapper end -->


<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="../../backend/js/jquery.min.js"></script>
<script src="../../backend/js/bootstrap.bundle.min.js"></script>
<script src="../../backend/js/moment.js"></script>


<!-- Main JS -->
<script src="../../backend/js/main.js"></script>

<!-- Slimscroll JS -->
<script src="../../backend/vendor/slimscroll/slimscroll.min.js"></script>
<script src="../../backend/vendor/slimscroll/custom-scrollbar.js"></script>

</body>

</html>