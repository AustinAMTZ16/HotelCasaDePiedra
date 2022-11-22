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
			require 'backend/config/ConexionSNSesion.php';
			$id = '8';
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
											<img src="backend/img/room.svg" alt="Room" />
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
							<?php include_once 'backend/php/add_mdin_web.php' ?>
							<div class="card-body">
								<form method="POST" action="" enctype="multipart/form-data" autocomplete="off">
									<div class="row gutters">
										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="modal-body">
												<form class="row gutters" method="POST">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="docTitle">Documento</label>
															<select class="form-control" name="mddoc" required>
																<option>Seleccione documento</option>
																<option value="DNI">DNI</option>
																<option value="PASAPORTE">PASAPORTE</option>
																<option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
															</select>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="dovType">Nº de documento</label>
															<input type="text" maxlength="14" class="form-control" name="mdnum" placeholder="Nº de documento">
														</div>
													</div>


													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="dovType">Nombre del cliente</label>
															<input type="text" class="form-control" name="mdnom" placeholder="Nombre del cliente">
														</div>
													</div>

													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="dovType">Apellido del cliente</label>
															<input type="text" class="form-control" name="mdap" placeholder="Apellido del cliente">
														</div>
													</div>


													<div class="text-right">
														<button type="submit" name="md_insert" class="btn btn-secondary">Alta</button>
													</div>

												</form>
											</div>



										</div>

										<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="form-group">
												<label for="addRess">Fecha entrada</label>
												<input type="text" class="form-control" name="rxent" value="
												<?php $fechaActual = date('Y-m-d');
												echo $fechaActual;
												?>">
											</div>
											<div class="form-group">
												<label for="ciTy">Fecha salida</label>
												<input type="date" class="form-control" required name="rxsal">
											</div>
											<div class="form-group">
												<label for="sTate">Precio</label>
												<input type="text" class="form-control" value="<?php echo $d->precha; ?>" readonly>
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

												<button type="submit" name="insertar" class="btn btn-secondary">Guardar</button>
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



<div class="modal fade" id="addNewDocument" tabindex="-1" role="dialog" aria-labelledby="addNewDocumentLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addNewDocumentLabel">Nuevo cliente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="row gutters" method="POST">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="docTitle">Documento</label>
							<select class="form-control" name="mddoc" required>
								<option>Seleccione documento</option>
								<option value="DNI">DNI</option>
								<option value="PASAPORTE">PASAPORTE</option>
								<option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option>
							</select>
						</div>
					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="dovType">Nº de documento</label>
							<input type="text" maxlength="14" class="form-control" name="mdnum" placeholder="Nº de documento">
						</div>
					</div>


					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="dovType">Nombre del cliente</label>
							<input type="text" class="form-control" name="mdnom" placeholder="Nombre del cliente">
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="form-group">
							<label for="dovType">Apellido del cliente</label>
							<input type="text" class="form-control" name="mdap" placeholder="Apellido del cliente">
						</div>
					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="md_insert" class="btn btn-secondary">Guardar</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>