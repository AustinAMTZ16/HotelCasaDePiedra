<?php
// session_start();

// if (!isset($_SESSION['rol']) ) {
// 	header('location: ../login.php');
// }
?>
<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Meta -->
	<meta name="description" content="Hotel MI CIELO">
	<meta name="author" content="Hotel">
	<link rel="shortcut icon" href="backend/img/ico.png" />

	<!-- Title -->
	<title>Recepción | Hotel Casa de Piedra"</title>


	<!-- *************
			************ Common Css Files *************
		************ -->
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="backend/css/bootstrap.min.css">
	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="backend/fonts/style.css">
	<!-- Main css -->
	<link rel="stylesheet" href="backend/css/main.css">

	<!-- Data Tables -->
	<link rel="stylesheet" href="backend/vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="backend/vendor/datatables/dataTables.bs4-custom.css" />
	<link href="backend/vendor/datatables/buttons.bs.css" rel="stylesheet" />

</head>

<body>

	<!-- Loading starts -->
	<div id="loading-wrapper">
		<div class="spinner-border" role="status">
			<span class="sr-only">Loading...</span>
		</div>
	</div>
	<!-- Loading ends -->


	<!-- Page wrapper start -->
	<div class="page-wrapper">
		<!-- Page wrapper start -->
		<div class="page-wrapper">



			<!-- Page content start  -->
			<div class="page-content">

				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item">Clientes</li>
						<li class="breadcrumb-item active">Nuevo clientes</li>
					</ol>
				</div>
				<!-- Page header end -->
				<!-- Main container start -->

				<div class="main-container">

					<!-- Row start -->
					<div class="row justify-content-center gutters">
						<div class="col-xl-7 col-lg-7 col-md-8 col-sm-10">
							<form enctype="multipart/form-data" method="POST" action="" autocomplete="off">
								<div class="card m-0">
									<div class="card-header">
										<div class="card-title">Nuevos clientes</div>
										<div class="alert alert-warning" role="alert">
											<i class="icon-warning"></i>Es importante rellenar los campos con &nbsp;<span class="badge badge-primary">*</span>
										</div>
									</div>
									<div class="card-body">
										<div class="row gutters">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<select class="form-control" name="cxtip" required>
														<option>Seleccione documento</option>
														<option value="DNI">DNI</option>
														<option value="PASAPORTE">PASAPORTE</option>
														<option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
													</select>
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<input type="text" class="form-control" maxlength="14" name="cxdoc" placeholder="Nº de documento" required="">
												</div>
											</div>

										</div>

										<div class="row gutters">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<input type="text" class="form-control" name="cxna" placeholder="Nombres" required="">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<input type="text" class="form-control" name="cxap" placeholder="Apellidos" required="">
												</div>
											</div>
										</div>


										<div class="row gutters">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<input type="email" class="form-control" name="cxema" placeholder="Correo electrónico">
												</div>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
												<div class="form-group">
													<select class="form-control" name="cxsta">
														<option value="1">Activo</option>

													</select>
												</div>
											</div>
										</div>

										<button name="insertar" type="submit" class="btn btn-primary float-right">Guardar</button>
										<button type="button" class="btn btn-danger float-right" onclick="location.href='mostrar.php'">Cancelar</button>

									</div>
								</div>
							</form>
						</div>
					</div>
					<!-- Row end -->

				</div>

				<!-- Main container end -->


				<!-- Main container start -->
				<div class="main-container">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="documents-section">

								<!-- Row start -->
								<div class="row no-gutters">
									<div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col-4">

										<div class="docs-type-container">
											<div class="mt-5"></div>

											<div class="docTypeContainerScroll">
												<div class="docs-block">
													<h5>Recepción</h5>
													<div class="doc-labels">
														<a href="mostrar.php" class="active">
															<i class="icon-receipt"></i> Mis habitaciones
														</a>

													</div>
												</div>
											</div>

										</div>

									</div>
									<div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">

										<div class="documents-container">

											<div class="documents-header">
												<h3>Today <span class="date" id="todays-date"></span></h3>
												<div class="custom-search">

													<form class="example" method="POST" action="" style="margin:auto;max-width:300px">
														<input type="searchs" class="search-query" placeholder="Buscar habitación ..." name="keyword" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" required="" />

														<button name="search"><i class="icon-search1"></i></button>

													</form>



												</div>
											</div>
											<div class="documentsContainerScroll">
												<div class="documents-body">
													<!-- Row start -->
													<div class="row gutters">

														<?php
														// require the database connection
														require 'backend/config/ConexionSNSesion.php';
														if (isset($_POST['search'])) {
														?>

															<?php
															$keyword = $_POST['keyword'];
															$query = $connect->prepare("SELECT habitaciones.idhab, habitaciones.numiha, habitaciones.detaha, habitaciones.precha, pisos.idps, pisos.nompis, hcate.idhc, hcate.nomhc, habitaciones.estadha FROM habitaciones INNER JOIN pisos ON habitaciones.idps =pisos.idps INNER JOIN hcate ON habitaciones.idhc =hcate.idhc WHERE `numiha` LIKE '%$keyword%' or `nompis` LIKE '%$keyword%' or `nomhc` LIKE '%$keyword%' or  `estadha` LIKE '%$keyword%'  GROUP BY habitaciones.idhab");
															$query->execute();
															while ($row = $query->fetch()) {
															?>

																<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
																	<div class="doc-block">
																		<div class="doc-icon">
																			<img src="backend/img/room.svg" alt="Doc Icon" />
																		</div>

																		<div class="doc-title">N°: <?php echo $row->numiha; ?></div>
																		<?php

																		if ($row->estadha == '1') {
																			echo '<a href="../rs_habitacion/mostrar.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Disponible</a>';
																			// code...
																		} else if ($row->estadha == '2') {
																			//echo '<button class="btn btn-white btn-lg">Ocupado</button>';
																			echo '<a href="../rs_habitacion/ocupado.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Ocupado</a>';
																		} else {
																			echo '<a href="../rs_habitacion/limpieza.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Limpieza</a>';
																			//echo '<button class="btn btn-white btn-lg">Limpieza</button>';
																		}
																		?>


																	</div>
																</div>

															<?php
															}
															?>

														<?php
														} else {
														?>

															<?php
															$query = $connect->prepare("SELECT habitaciones.idhab, habitaciones.numiha, habitaciones.detaha, habitaciones.precha, pisos.idps, pisos.nompis, hcate.idhc, hcate.nomhc, habitaciones.estadha FROM habitaciones INNER JOIN pisos ON habitaciones.idps =pisos.idps INNER JOIN hcate ON habitaciones.idhc =hcate.idhc GROUP BY habitaciones.idhab");
															$query->execute();
															while ($row = $query->fetch()) {


															?>
																<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
																	<div class="doc-block">
																		<div class="doc-icon">
																			<img src="backend/img/room.svg" alt="Doc Icon" />
																		</div>
																		<div class="doc-title">N°: <?php echo $row->numiha; ?></div>

																		<?php

																		if ($row->estadha == 1) {
																			echo '<a href="rs_habitacion/mostrar.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Disponible</a>';
																			// code...
																		} else if ($row->estadha == 2) {
																			//echo '<button class="btn btn-white btn-lg">Ocupado</button>';
																			echo '<a href="../rs_habitacion/ocupado.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Ocupado</a>';
																		} else {
																			echo '<a href="../rs_habitacion/limpieza.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Limpieza</a>';
																			//echo '<button class="btn btn-white btn-lg">Limpieza</button>';
																		}
																		?>


																	</div>
																</div>


															<?php
															}
															?>

														<?php
														}
														$conn = null;
														?>
													</div>
													<!-- Row end -->
												</div>
											</div>
										</div>

									</div>
								</div>
								<!-- Row end -->

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




	</div>
	<!-- Page wrapper end -->

	<!-- MODAL-ELIMINAR -->






	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="backend/js/jquery.min.js"></script>
	<script src="backend/js/bootstrap.bundle.min.js"></script>
	<script src="backend/js/moment.js"></script>

	<!-- Data Tables -->
	<script src="backend/vendor/datatables/dataTables.min.js"></script>
	<script src="backend/vendor/datatables/dataTables.bootstrap.min.js"></script>


	<!-- Custom Data tables -->
	<script src="backend/vendor/datatables/custom/custom-datatables.js"></script>
	<script src="backend/vendor/datatables/custom/fixedHeader.js"></script>



	<!-- Main JS -->
	<script src="backend/js/main.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="backend/vendor/slimscroll/slimscroll.min.js"></script>
	<script src="backend/vendor/slimscroll/custom-scrollbar.js"></script>



</body>

</html>