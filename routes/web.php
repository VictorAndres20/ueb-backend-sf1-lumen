<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return date("Y-m-d");
});

/**
 * Login
 */
$router->post('/auth/login', 'AuthController@login');

/**
 * Rutas Protegidas por JWT
 */
$router->group(['middleware' => 'auth:api'], function($router)
{
    
});

/**
 * Rutas para el modelo Usuario
 */
$router->get('/usuario','UsuarioController@list');
$router->get('/usuario/nomina','UsuarioController@nomina');
$router->get('/usuario/nomina/{cod_usuario}','UsuarioController@nominaUser');
$router->get('/usuario/{cod_usuario}','UsuarioController@listById');
$router->get('/usuario/permisos/{cod_usuario}','UsuarioController@listRoutes');
$router->put('/usuario','UsuarioController@create');
$router->put('/usuario/add/prestacion','UsuarioController@addPrestacion');
$router->post('/usuario','UsuarioController@update');
$router->get('/usuario/bloquear/{cod_usuario}','UsuarioController@updateBlock');

/**
 * Rutas para el modelo Estado
 */
$router->get('/estado','EstadoController@list');

/**
 * Rutas para el modelo Departamento
 */
$router->get('/departamento','DepartamentoController@list');
$router->put('/departamento','DepartamentoController@create');
$router->post('/departamento','DepartamentoController@update');

/**
 * Rutas para el modelo Rol
 */
$router->get('/rol','RolController@list');
$router->put('/rol','RolController@create');
$router->post('/rol','RolController@update');

/**
 * Rutas para el modelo TipoFinanzas
 */
$router->get('/tipofinanza','TipoFinanzaController@list');
$router->put('/tipofinanza','TipoFinanzaController@create');
$router->post('/tipofinanza','TipoFinanzaController@update');

/**
 * Rutas para el modelo TipoTransaccion
 */
$router->get('/tipotransaccion','TipoTransaccionController@list');
$router->put('/tipotransaccion','TipoTransaccionController@create');
$router->post('/tipotransaccion','TipoTransaccionController@update');

/**
 * Rutas para el modelo Finanza
 */
$router->get('/finanza','FinanzaController@list');
$router->get('/finanza/ingreso','FinanzaController@listIngresos');
$router->get('/finanza/egreso','FinanzaController@listEngresos');
$router->put('/finanza','FinanzaController@create');
$router->post('/finanza','FinanzaController@update');


/**
 * Rutas para el modelo TipoLogistica
 */
$router->get('/tipologistica','TipoLogisticaController@list');
$router->put('/tipologistica','TipoLogisticaController@create');
$router->post('/tipologistica','TipoLogisticaController@update');



/**
 * Rutas para el modelo EstadoLogistica
 */
$router->get('/estadologistica','EstadoLogisticaController@list');
$router->put('/estadologistica','EstadoLogisticaController@create');
$router->post('/estadologistica','EstadoLogisticaController@update');
$router->delete('/estadologistica/{cod_estado_logistica}','EstadoLogisticaController@delete');

/**
 * Rutas para el modelo Logistica
 */
$router->get('/logistica','LogisticaController@list');
$router->get('/logistica/materiaprima/almacenada','LogisticaController@listMateriaPrimaAlmacenada');
$router->get('/logistica/materiaprima/produccion','LogisticaController@listMateriaPrimaProduccion');
$router->get('/logistica/producto/enviado','LogisticaController@listProductoTerminadoEnvio');
$router->get('/logistica/producto/entregado','LogisticaController@listProductoTerminadoEnviado');
$router->put('/logistica','LogisticaController@create');
$router->post('/logistica','LogisticaController@update');

/**
 * Rutas para el modelo Permission
 */
$router->get('/permission','PermissionController@list');
$router->get('/permission/{cod_permission}','PermissionController@listById');
$router->put('/permission','PermissionController@create');
$router->put('/permission/add/rol','PermissionController@addRol');
$router->post('/permission','PermissionController@update');

/**
 * Rutas para el modelo PrestacionServicios
 */
$router->get('/prestacion','PrestacionServiciosController@list');
$router->get('/prestacion/{cod_permission}','PrestacionServiciosController@listById');
$router->put('/prestacion','PrestacionServiciosController@create');
$router->post('/prestacion','PrestacionServiciosController@update');

