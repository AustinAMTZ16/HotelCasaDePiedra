<!-- Loading starts -->
<div id="loading-wrapper">
	<div class="spinner-border" role="status">
		<span class="sr-only">Loading...</span>
	</div>
</div>
<!-- Loading ends -->



<!-- Page header start -->
<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">Reservacion</li>
		<li class="breadcrumb-item">Habitaciones</li>
		<li class="breadcrumb-item active">Reservar</li>
	</ol>
</div>
<!-- Page header end -->

<!-- Main container start -->
<section class="page-section bg-light" id="team">
    <div class="container">
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
										<i class="icon-receipt"></i> Mis habitaciones
									</div>
								</div>
							</div>

						</div>

					</div>
					<div class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-8">

						<div class="documents-container">

							<div class="documents-header">
								<h3>Este Dia <span class="date" id="todays-date"></span></h3>
								<div class="custom-search">

									<form class="example" method="POST" action="" style="margin:auto;max-width:300px">
										<input type="searchs" class="search-query" placeholder="Buscar habitación ..."
											name="keyword"
											value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"
											required="" />
										<button name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
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

												<div class="doc-title">N°:
													<?php echo $row->numiha; ?>
													<?php echo $row->numiha; ?>
												</div>
												
												<?php

													if ($row->estadha == '1') {
														echo '<a href="index.php?view=mostrar.php" class="btn btn-white btn-lg">Disponible</a>';
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
												<div class="doc-title">N°:
													<?php echo $row->numiha; ?>
												</div>
												<div class="doc-title">
													<?php echo $row->detaha; ?>
												</div>

												<?php


													if ($row->estadha == 1) {
														echo '<a href="frontend/seccionWeb/mostrar.php?id=' . $row->idhab . '" class="btn btn-white btn-lg">Disponible</a>';
														// code...
													} else if ($row->estadha == 2) {
														//echo '<button class="btn btn-white btn-lg">Ocupado</button>';
														echo '<a href="#" class="btn btn-white btn-lg">Ocupado</a>';
													} else {
														echo '<a href="#" class="btn btn-white btn-lg">Limpieza</a>';
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
</section>
<!-- Main container end -->