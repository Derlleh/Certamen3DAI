<?php

use Slim\App;
use Slim\Http\Uri;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Views\Twig;
use Slim\Http\Environment;
use Slim\Views\TwigExtension;
use Medoo\Medoo;

return function (App $app) {


	/*alumno*/

	$app->get('/alumnos', function ($request, $response) {
		$db = new \Modelo\dUsuario($this);
		$dbp = new \Modelo\dAlumno($this);
		return $this->view->render($response, 'alumno.html', 
			['usuarios'=>$db->datos(),'alumnos'=>$dbp->datos()]);
	});

	$app->post('/actalumno', function ($request, $response) {
		$op=$_POST["operacion2"];
		$db = new \Modelo\dAlumno($this);
		$dbp = new \Modelo\dUsuario($this);
		
		if ($op=="grabar2") {
		
			$db->agregarA($_POST["rut"],$_POST["carrera"],$_POST["nombre"],$_POST["username"],$_POST["pass"]);
		}
		if ($op=="modificar2") {
			$db->modificarA($_POST["rut"],$_POST["carrera"],$_POST["nombre"],$_POST["username"],$_POST["pass"]);
		}
		if ($op=="eliminar2") {
			$db->eliminarA($_POST["rut"]);
		}
		return $this->view->render($response, 'alumno_detalle.html',['alumnos'=>$db->datos()]);
	});
};

