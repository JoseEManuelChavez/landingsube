<?php

class ControladorLanding
{
	
	function landing()
	{
		include "vistas/landing.php";
	
	}

	public function ctrenviarcorreo()
	{
		
		if (isset($_POST['mensaje'])) {
			
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
				preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["apellidos"]) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["correo"]) &&
			    preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["mensaje"])) {
				
				$datos = array("nombre" => $_POST["nombre"],
							   "apellidos" => $_POST["apellidos"],
							   "correo" => $_POST["correo"],
							   "mensaje" => $_POST["mensaje"]
							);

				/*=====================================
				Enviar correo electronico
				======================================*/
				
				$correo = mail('cjose2544@gmail.com','Nuevo cliente potencial','Nombre:'.$datos["nombre"].', Apellidos: '.$datos["apellidos"].',Correo: '.$datos["correo"].', Mensaje: '.$datos["mensaje"].'');

				if (!$correo) {

					echo '<script>

					alert("No me envie")

					</script>';

				}else{

					echo '<script>

					alert("Me envie jeje")
					
					window.location = "vistas/paginas/gracias.php";

					</script>';

				}

			}else{

				echo '<script>

					alert("¡Error al enviar el formulario, no se permiten caracteres especiales!")

					</script>';
			}

		}

	}
}