<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hotel Casas de Piedra</title>
	<!-- <link rel="stylesheet" href="./backend/css/orden.css"> -->
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="../../BackWeb/assets/img/logo.jpeg" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
	<!-- Core theme CSS (includes Bootstrap)-->
	<link href="../../BackWeb/css/styles.css" rel="stylesheet" />


	<!-- Icomoon Font Icons css -->
	<link rel="stylesheet" href="../../backend/fonts/style.css">
	<!-- Main css -->
	<!-- <link rel="stylesheet" href="backend/css/main.css"> -->

	<!-- Data Tables -->
	<link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4.css" />
	<link rel="stylesheet" href="../../backend/vendor/datatables/dataTables.bs4-custom.css" />
	<link href="../../backend/vendor/datatables/buttons.bs.css" rel="stylesheet" />




	<!-- Messenger Plugin de chat Code -->
	<div id="fb-root"></div>

	<!-- Your Plugin de chat code -->
	<div id="fb-customer-chat" class="fb-customerchat">
	</div>

	<script>
		var chatbox = document.getElementById('fb-customer-chat');
		chatbox.setAttribute("page_id", "100180828258427");
		chatbox.setAttribute("attribution", "biz_inbox");
	</script>

	<!-- Your SDK code -->
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v15.0'
			});
		};

		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s);
			js.id = id;
			js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
</head>

<body>


	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="../../index.php"><img src="../../BackWeb/assets/img/logo.jpeg" alt="..." /></a>
			<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars ms-1"></i>
			</button> -->
			<div class="" id="">
				<ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
					<li class="nav-item"><a class="nav-link" href="../../index.php">Salir</a></li>
				</ul>
			</div>
		</div>
	</nav>

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
									<form class="row gutters" method="POST">
										<div class="row gutters">
											<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="modal-body">
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="docTitle">Datos de usuario</label>
															<select class="form-control" name="mddoc" required>
																<option>Seleccione contacto</option>
																<option value="DNI">Telefono celular</option>
																<!-- <option value="PASAPORTE">PASAPORTE</option>
																<option value="CARNET DE EXTRANJERIA">CARNET DE EXTRANJERIA</option> -->
															</select>
														</div>
														<input type="hidden" name="rxha" value="<?php echo $d->idhab; ?>">
													</div>
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="dovType">Numero de contacto</label>
															<input type="text" maxlength="10" class="form-control" name="mdnum" placeholder="Telefono">
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
													<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
														<div class="form-group">
															<label for="dovType">Correo Electronico</label>
															<input type="email" class="form-control" name="email" placeholder="Correo Electronico">
														</div>
													</div>
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
													<input type="text" class="form-control" name="precio" value="<?php echo $d->precha; ?>" readonly>
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
													<div class="text-right">
														<button type="submit" name="md_insert" class="btn btn-secondary">Reservar ahora</button>
													</div>
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



	<!-- Footer-->
	<footer class="footer py-4">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-4 text-lg-start">Copyright &copy;Hotel Casa de Piedra 2022</div>
				<div class="col-lg-4 my-3 my-lg-0">
					<a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/Lacasadepiedraelseco?mibextid=LQQJ4d" target="_Black" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
					<a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/Lacasadepiedraelseco?mibextid=LQQJ4d" target="_Black" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<div class="col-lg-4 text-lg-end">
					<a class="link-dark text-decoration-none me-3" href="#!">Política de privacidad
					</a>
					<a class="link-dark text-decoration-none" href="sistema.php">Sistema Hotel
					</a>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>