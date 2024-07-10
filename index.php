<!doctype html>
<html lang="en">
	<head>
		<title>Test Estrés Laboral</title>
		<!-- Required meta tags -->
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, shrink-to-fit=no"
		/>

		<!-- Bootstrap CSS v5.2.1 -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="style.css">
	</head>

	<body>

		<main>
			<div class="container">
<br/>
			<div class="row">
				<div class="col">
					<h5>TEST DE ESTRÈS LABORAL</h5>
					Permite conocer en qué grado el trabajador padece los síntomas asociados
					al estrés. <br/>
					<strong>Instrucciones: </strong>
					De los siguientes síntomas, selecciona el grado experimentado durante los
					últimos 3 meses de acuerdo al semáforo presentado.<br/>
					<span class="badge color1">1 (Nunca )</span>
					<span class="badge color2">2 (Casi nunca)</span>
					<span class="badge color3">3 (Pocas veces)</span>
					<span class="badge color4">4 (Algunas veces)</span>
					<span class="badge color5">5 (Relativamente frecuente)</span>
					<span class="badge color6">6 (Muy frecuente)</span>
					<br/> <br>

					<!-- Preguntas  (Items) -->

<form action="index.php" method="post">


<?php

$preguntas=[
	" Imposibilidad de conciliar el sueño.",
	" Jaquecas y dolores de cabeza",
	" Indigestiones o molestias gastrointestinales. ",
	" Sensación de cansancio extremo o agotamiento",
	" Tendencia de comer, beber o fumar más de lo habitual. ",
	" Disminución del interés sexual.",
	" Respiración entrecortada o sensación de ahogo",
	" Disminución del apetito.",
	" Temblores musculares (por ejemplo tics nerviosos o parpadeos).",
	" Pinchazos o sensaciones dolorosas en distintas partes del cuerpo",
	" Tentaciones fuertes de no levantarse por la mañana.",
	" Tendencias a sudar o palpitaciones."

];

?>

					<div class="card">
						<div class="card-body">

						<?php foreach($preguntas as $index => $pregunta){ ?>

							<span class="badge bg-light text-dark">
								<?php echo $index+1 ?>.-
							</span>

							<?php echo $pregunta ?>
							<br/>

						<?php for($opcion =1; $opcion <=6; $opcion++){?>
							<span class="badge color<?php echo $opcion; ?>">

							<div class="form-check form-check-inline">
								<input
									class="form-check-input"
									type="radio"
									name="pregunta<?php echo $index; ?>"

									value="<?php echo $opcion;?>"required
								/>
								<label class="form-check-label" for=""><?php echo $opcion;?></label>
							</div>
							</span>
						<?php } ?>
						<br/>
						<?php } ?>



						</div>
					</div> <br/>

					<div class="d-grid gap-2">
					<button type="submit" class="btn btn-primary"> Enviar respuestas</button>
					</div>



				</div>
				<div class="col">
					<h5>RESPUESTAS</h5>
					<?php if($_SERVER["REQUEST_METHOD"] =="POST"){
						$respuestas=[];
						$numeroPreguntas=count($preguntas);
						for($i=0; $i<$numeroPreguntas; $i++){
							$respuesta=isset($_POST["pregunta$i"])?(int)$_POST["pregunta$i"]:0;
							$respuestas[]=($respuesta);
						}
						$puntajeTotal=array_sum($respuestas);


						if($puntajeTotal<=12){
							$nivelEstres = "Sin estrés";
							$mensaje ="
							<div class='alert alert-info' role='alert'>
							No existe síntoma alguno de estrés.</div>";
						}elseif($puntajeTotal <=24){
							$nivelEstres = "Sin estrés";
							$mensaje ="
							<div class='alert alert-primary' role='alert'>
							Tienes un buen equilibrio, continúa así y contagia a	
							los demàs de tus estrategias de afrontamiento!
							</div>";
						}elseif($puntajeTotal <=36){
							$nivelEstres = "Estrés leve";
							$mensaje ="
							<div class='alert alert-success' role='alert'> 
							Te encuentras en fase de alarma, trata de identificar el o
							los factores que te causan estrés para poder ocuparte de ellos de manera preventiva
							</div>";
						}elseif($puntajeTotal<=48){
							$nivelEstres = "Estrés medio";
							$mensaje ="
							<div class='alert alert-warning' role='alert'>
							Haz conciencia de la situación en la que te encuentras y trata
							de ubicar qué puedes modificar, ya que si la situación estresante se prolonga,
							puedes romper tu equilibrio entre lo laboral y lo personal. No agotes
							tus resistencias!
							</div>";
						}elseif($puntajeTotal<=60){
							$nivelEstres = "Estrés alto";
							$mensaje ="
							<div class='alert alert-danger' role='alert'> Te encuentras en una fase de agotamiento de recursos fisiológicos
							con desgaste físico y mental. Esto puede tener consecuencias más serias para
							tu salud.</div>";
						}else{
							$nivelEstres = "Estrés grave";
							$mensaje ="
							<div class='alert alert-danger' role='alert'>
							Busca ayuda </div>";
						}
						echo "<br> <strong>Puntaje obtenido: </strong>".$puntajeTotal;
						echo "<br> <strong>Nivel de estrés: </strong>".$nivelEstres;
						echo "<br> <strong>Mensaje: </strong> <br><br>".$mensaje;


					} ?> <br/>


				</div>

			</div>

			</div>
			</form>


		</main>
		<footer>
			<!-- place footer here -->
		</footer>
		<!-- Bootstrap JavaScript Libraries -->
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
			integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
			crossorigin="anonymous"
		></script>

		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
			integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
			crossorigin="anonymous"
		></script>
	</body>
</html>
