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
<section section class="page-section bg-light" id="team">
	<div class="container">
		<!-- Row start -->
		<div class="row gutters">
			<?php
			require '../../backend/config/ConexionSNSesion.php';
					$id = $_GET['id'];
					$sentencia = $connect->prepare("SELECT habitaciones.idhab, habitaciones.numiha, habitaciones.detaha, habitaciones.precha, pisos.idps, pisos.nompis, hcate.idhc, hcate.nomhc, habitaciones.estadha FROM habitaciones INNER JOIN pisos ON habitaciones.idps =pisos.idps INNER JOIN hcate ON habitaciones.idhc =hcate.idhc  WHERE idhab= '$id';");
					$sentencia->execute();
			
					$data =  array();
					if ($sentencia) {
						while ($r = $sentencia->fetchObject()) {
							$data[] = $r;
						}
					}
			?>
			<?php if (count($data) > 0) : ?>
			<?php foreach ($data as $d) : ?>
			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-body">
						<div class="account-settings">
							<div class="user-profile">
								<div class="user-avatar">
									<img src="../../backend/img/room.svg" alt="Room" />
								</div>
								<h5 class="user-name">
									<?php echo $d->numiha; ?>
								</h5>
								<h6 class="user-email">
									<?php echo $d->detaha; ?>
								</h6>
							</div>
							<div class="list-group">
								<a href="#" class="list-group-item">
									<?php echo $d->nompis; ?>
								</a>
								<a href="#" class="list-group-item">
									<?php echo $d->nomhc; ?>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
				<div class="card h-100">
					<div class="card-header">
						<div class="card-title">Detalle de la reserva</div>
					</div>
					<?php include_once '../../backend/php/add_mdin_web.php' ?>
					<div class="card-body">
						<form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
							<div class="row gutters">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="fullName">DNI del cliente</label><button
											class="btn btn-primary btn-sm" data-toggle="modal"
											data-target="#addNewDocument"><i class="icon-plus"></i><H1>FFF</H1></button>


										<select class="form-control" name="rxdoc" id="doc" required>
											<option>Seleccione</option>

										</select>
										<input type="hidden" name="rxha" value="<?php echo $d->idhab; ?>">
									</div>
									<div class="form-group">
										<label for="eMail">Nombre del cliente</label>

										<select class="form-control" id="docname" disabled>
											<option>Seleccione</option>

										</select>
									</div>
									<div class="form-group">
										<label for="phone">Apellido del cliente</label>


										<select class="form-control" id="doclas" disabled>
											<option>Seleccione</option>

										</select>
									</div>

									<div class="form-group">
										<label for="sTate">Adelanto</label>
										<input type="number" min="0" value="0" class="form-control" name="rxade">
									</div>

								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="form-group">
										<label for="addRess">Fecha entrada</label>
										<input type="text" class="form-control" name="rxent" value="<?php $fechaActual = date('Y-m-d');
																										echo $fechaActual; ?>">
									</div>
									<div class="form-group">
										<label for="ciTy">Fecha salida</label>
										<input type="date" class="form-control" required name="rxsal">
									</div>
									<div class="form-group">
										<label for="sTate">Precio</label>
										<input type="text" class="form-control" value="<?php echo $d->precha; ?>"
											readonly>
									</div>


									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<label for="sTate">Observaciones</label>
											<textarea class="form-control" name="rxobs" rows="3"></textarea>

										</div>
									</div>

								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="text-right">

										<button type="submit" name="insertar" class="btn btn-primary">Guardar</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

			<?php else : ?>
			<p class="alert alert-warning">No hay datos</p>
			<?php endif; ?>
		</div>
		<!-- Row end -->

	</div>
</section>
<!-- Main container end -->