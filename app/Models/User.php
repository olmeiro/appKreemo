<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static $menu = [
        1=>[
            [
                "nombre"=>"Usuarios",
                "url"=>"/users",
                "icono"=>"fas fa-users",
            ],
            [
                "nombre"=>"Contactos",
                "url"=>"#",
                "icono"=>"fas fa-id-card usario",
                "hijos"=>[

                    ["nombre"=>"cliente","url"=>"/cliente"],
                    ["nombre"=>"contactosObra","url"=>"/obracontacto"],
                    ["nombre"=>"empresa","url"=>"/empresa"],
                    ["nombre"=>"estadisticas","url"=>"/chart"],

                ],
            ],
            [
                "nombre"=>"Visitas",
                "url"=>"#",
                "icono"=>"fas fa-calendar-alt",
                "hijos"=>[
                    ["nombre"=>"Crear visita","url"=>"/visita"],
                    ["nombre"=>"Lista de visitas","url"=>"/visita/listarvisitas"],
                    ["nombre"=>"Listas de chequeo","url"=>"/listachequeo"],
                ],
            ],
            [
                "nombre"=>"Cotizaciones",
                "url"=>"#",
                "icono"=>"fas fa-hand-holding-usd",
                "hijos"=>[
                    ["nombre"=>"Cotización","url"=>"/cotizacion"],
                    ["nombre"=>"Estado cotización","url"=>"/ajaxestado"],
                    ["nombre"=>"Etapa","url"=>"/etapa"],
                    ["nombre"=>"Jornada","url"=>"/jornada"],
                    ["nombre"=>"Modalidad","url"=>"/modalidad"],
                    ["nombre"=>"Tipo de concreto","url"=>"/tipoConcreto"],
                ],
            ],
            [
                "nombre"=>"Maquinaria",
                "url"=>"#",
                "icono"=>"fas fa-trailer",
                "hijos"=>[
                    ["nombre"=>"Maquinaria","url"=>"/maquinaria"],
                    ["nombre"=>"Operario","url"=>"/operario"],
                ],
            ],
            [
                "nombre"=>"Servicio",
                "url"=>"#",
                "icono"=>"fas fa-tasks",
                "hijos"=>[
                    ["nombre"=>"Crear servicio","url"=>"/servicio"],
                    ["nombre"=>"Lista de servicios","url"=>"/servicio/listarservicio"],
                    ["nombre"=>"Encuestas","url"=>"/encuesta"],
                ],
            ],
        ],
        2=>[
            [
                "nombre"=>"Contactos",
                "url"=>"#",
                "icono"=>"fas fa-id-card usario",
                "hijos"=>[
                    ["nombre"=>"Cliente","url"=>"/cliente"],
                    ["nombre"=>"Contactos obra","url"=>"/obracontacto"],
                    ["nombre"=>"Empresa","url"=>"/empresa"],
                ],
            ],
            [
                "nombre"=>"Visitas",
                "url"=>"#",
                "icono"=>"fas fa-calendar-alt",
                "hijos"=>[
                    ["nombre"=>"Crear visita","url"=>"/visita"],
                    ["nombre"=>"Lista de visitas","url"=>"/visita/listarvisitas"],
                    ["nombre"=>"Listas de chequeo","url"=>"/listachequeo"],
                ],
            ],
            [
                "nombre"=>"Cotizaciones",
                "url"=>"#",
                "icono"=>"fas fa-hand-holding-usd",
                "hijos"=>[
                    ["nombre"=>"Cotización","url"=>"/cotizacion"],
                    ["nombre"=>"Estado cotización","url"=>"/ajaxestado"],
                    ["nombre"=>"Etapa","url"=>"/etapa"],
                    ["nombre"=>"Jornada","url"=>"/jornada"],
                    ["nombre"=>"Modalidad","url"=>"/modalidad"],
                    ["nombre"=>"Tipo de concreto","url"=>"/tipoConcreto"],
                ],
            ],
            [
                "nombre"=>"Maquinaria",
                "url"=>"#",
                "icono"=>"fas fa-trailer",
                "hijos"=>[
                    ["nombre"=>"Maquinaria","url"=>"/maquinaria"],
                    ["nombre"=>"Operario","url"=>"/operario"],
                ],
            ],
            [
                "nombre"=>"Servicio",
                "url"=>"#",
                "icono"=>"fas fa-tasks",
                "hijos"=>[
                    ["nombre"=>"Crear servicio","url"=>"/servicio"],
                    ["nombre"=>"Lista de servicios","url"=>"/servicio/listarservicio"],
                    ["nombre"=>"Encuestas","url"=>"/encuesta"],
                ],
            
            ],
        ],
        3=>[
            [
                "nombre"=>"Visitas",
                "url"=>"#",
                "icono"=>"fas fa-calendar-alt",
                "hijos"=>[
                    ["nombre"=>"Crear visita","url"=>"/visita"],
                    ["nombre"=>"Lista de visitas","url"=>"/visita/listarvisitas"],
                    ["nombre"=>"Listas de chequeo","url"=>"/listachequeo"],
                ],
            ]
        ]
    ];

    public static $permisos = [
        1=>[

            ["url" => "/home", "method"=>"GET", "identica"=>true],

            ["url" => "/users", "method"=>"GET", "identica"=>true], //Mostrando lista de index
            ["url" => "/users", "method"=>"GET", "identica"=>false], //mostrando datos de un user
            ["url" => "/users", "method"=>"POST", "identica"=>true],
            ["url" => "/users/create", "method"=>"GET", "identica"=>true], //crear x resouce
            ["url" => "/users/{id}/edit", "method"=>"GET", "identica"=>true],
            ["url" => "/users/{user}", "method"=>"PATCH", "identica"=>true],
            ["url" => "/users/{id}", "method"=>"GET", "identica"=>false],
            ["url" => "/users", "method"=>"delete", "identica"=>false], //eliminar user x resource


            ["url" => "/tipocontacto", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/editar", "method"=>"GET", "identica"=>false],
            ["url" => "/tipocontacto/actualizar", "method"=>"POST", "identica"=>false],
            ["url" => "/tipocontacto/eliminar", "method"=>"GET", "identica"=>false],
            ["url" => "/tipocontacto/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/guardar", "method"=>"POST", "identica"=>true],

            ["url" => "/cliente", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/cliente/guardarNuevo", "method"=>"POST", "identica"=>true],
            ["url" => "/cliente/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/cliente/cambiar/estado", "method"=>"GET", "identica"=>false],
            ["url" => "/cliente/eliminar", "method"=>"POST", "identica"=>false],

            ["url" => "/obra", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/crearcontactos", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/obra/editar/{id}", "method"=>"GET", "identica"=>false],
            ["url" => "/obra/actualizar", "method"=>"POST", "identica"=>true],

            ["url" => "/obracontacto", "method"=>"GET", "identica"=>true],
            ["url" => "/obracontacto/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/obracontacto/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/obracontacto/editar", "method"=>"GET", "identica"=>false],

            ["url" => "/empresa", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/guardarNuevo", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/eliminar", "method"=>"POST", "identica"=>false],

            ["url" => "/visita", "method"=>"GET", "identica"=>true],
            ["url" => "/visita", "method"=>"POST", "identica"=>false], //guardo
            ["url" => "/visita/store", "method"=>"POST", "identica"=>true],
            ["url" => "visita/{visitum}/edit", "method"=>"POST", "identica"=>false],
            ["url" => "/visita/update", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/cambiar/estado", "method"=>"GET", "identica"=>false], //para cambiar el estado de la visita
            ["url" => "/visita/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/listarvisitas", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/show", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/crear/", "method"=>"GET", "identica"=>true],
            ["url" => "/visita", "method"=>"delete", "identica"=>false], //elimina x Resource
            ["url" => "/visita", "method"=>"patch", "identica"=>false],   //modifica x resource

            ["url" => "/listachequeo", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/actualizar", "method"=>"POST", "identica"=>false],
            ["url" => "/listachequeo/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/crear/", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/editar", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/listachequeo/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/tipoConcreto", "method"=>"GET", "identica"=>true],
            ["url" => "/tipoConcreto/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxtipoConcreto", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxtipoConcreto", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxtipoConcreto", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxtipoConcreto", "method"=>"delete", "identica"=>false],



            ["url" => "/modalidad", "method"=>"GET", "identica"=>true],
            ["url" => "/modalidad/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxmodalidad", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxmodalidad", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmodalidad", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxmodalidad/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmodalidad/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxmodalidad/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxmodalidad", "method"=>"delete", "identica"=>false],


            ["url" => "/jornada", "method"=>"GET", "identica"=>true],
            ["url" => "/jornada/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxjornada", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxjornada", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxjornada", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxjornada/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxjornada/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxjornada/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxjornada", "method"=>"delete", "identica"=>false],


            ["url" => "/etapa", "method"=>"GET", "identica"=>true],
            ["url" => "/etapa/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxetapa", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxetapa", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxetapa", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxetapa/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxetapa/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxetapa/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxetapa", "method"=>"delete", "identica"=>false],


            ["url" => "/maquinaria", "method"=>"GET", "identica"=>true],
            ["url" => "/maquinaria/cambiar/estado", "method"=>"GET", "identica"=>false],

            ["url" => "/ajaxmaquinaria", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxmaquinaria", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmaquinaria", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxmaquinaria/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmaquinaria/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxmaquinaria/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxmaquinaria", "method"=>"delete", "identica"=>false],


            ["url" => "/operario", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxoperario", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxoperario", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxoperario", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxoperario/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxoperario/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxoperario/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxoperario", "method"=>"delete", "identica"=>false],

             //hasta aqui full

            ["url" => "/servicio", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio", "method"=>"POST", "identica"=>false], //guardo
            ["url" => "/servicio/store", "method"=>"POST", "identica"=>true],
            ["url" => "servicio/{visitum}/edit", "method"=>"POST", "identica"=>false],
            ["url" => "/servicio/update", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/cambiarEstado", "method"=>"GET", "identica"=>false], //para cambiar el estado
            ["url" => "/servicio/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/listarservicio", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/show", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/create", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio", "method"=>"delete", "identica"=>false], //elimina x Resource
            ["url" => "/servicio", "method"=>"patch", "identica"=>false],   //modifica x resource



            ["url" => "/cotizacion", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/guardar", "method"=>"POST", "identica"=>true], //OK
            ["url" => "/cotizacion/editar", "method"=>"GET", "identica"=>false], //OK
            ["url" => "/cotizacion/actualizar", "method"=>"POST", "identica"=>true], //OK
            ["url" => "/cotizacion/editarEstado", "method"=>"GET", "identica"=>false], //pendiente pero conectado
            ["url" => "/cotizacion/estado", "method"=>"POST", "identica"=>true], //pendiente

            ["url" => "/cotizacion/informe", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/generar/pdf", "method"=>"POST", "identica"=>true],


           //funciona
            ["url" => "/ajaxestado", "method"=>"POST", "identica"=>true],

            ["url" => "/ajaxestado", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxestado", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxestado", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxestado/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxestado/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxestado/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxestado", "method"=>"delete", "identica"=>false],



            ["url" => "/encuesta", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/crear", "method"=>"GET", "identica"=>false],
            ["url" => "/encuesta/ver", "method"=>"GET", "identica"=>false],
            ["url" => "/encuesta/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/encuesta/eliminar", "method"=>"GET", "identica"=>false],

            ["url" => "/chart", "method"=>"GET", "identica"=>true],
            ["url" => "/chart/valorCotizacion", "method"=>"POST", "identica"=>true],

        ],
        2=>[
            ["url" => "/home", "method"=>"GET", "identica"=>true],

            ["url" => "/tipocontacto", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/editar", "method"=>"GET", "identica"=>false],
            ["url" => "/tipocontacto/actualizar", "method"=>"POST", "identica"=>false],
            ["url" => "/tipocontacto/eliminar", "method"=>"GET", "identica"=>false],
            ["url" => "/tipocontacto/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/tipocontacto/guardar", "method"=>"POST", "identica"=>true],

            ["url" => "/cliente", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/cliente/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/cliente/guardarNuevo", "method"=>"POST", "identica"=>true],
            ["url" => "/cliente/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/cliente/cambiar/estado", "method"=>"GET", "identica"=>false],
            ["url" => "/cliente/eliminar", "method"=>"POST", "identica"=>false],

            ["url" => "/obra", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/crearcontactos", "method"=>"GET", "identica"=>true],
            ["url" => "/obra/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/obra/editar/{id}", "method"=>"GET", "identica"=>false],
            ["url" => "/obra/actualizar", "method"=>"POST", "identica"=>true],

            ["url" => "/obracontacto", "method"=>"GET", "identica"=>true],
            ["url" => "/obracontacto/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/obracontacto/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/obracontacto/editar", "method"=>"GET", "identica"=>false],

            ["url" => "/empresa", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/empresa/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/guardarNuevo", "method"=>"POST", "identica"=>true],
            ["url" => "/empresa/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/empresa/eliminar", "method"=>"POST", "identica"=>false],

            ["url" => "/visita", "method"=>"GET", "identica"=>true],
            ["url" => "/visita", "method"=>"POST", "identica"=>false], //guardo
            ["url" => "/visita/store", "method"=>"POST", "identica"=>true],
            ["url" => "visita/{visitum}/edit", "method"=>"POST", "identica"=>false],
            ["url" => "/visita/update", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/cambiar/estado", "method"=>"GET", "identica"=>false], //para cambiar el estado de la visita
            ["url" => "/visita/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/listarvisitas", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/show", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/crear/", "method"=>"GET", "identica"=>true],
            ["url" => "/visita", "method"=>"delete", "identica"=>false], //elimina x Resource
            ["url" => "/visita", "method"=>"patch", "identica"=>false],   //modifica x resource

            ["url" => "/listachequeo", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/actualizar", "method"=>"POST", "identica"=>false],
            ["url" => "/listachequeo/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/crear/", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/editar", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/listachequeo/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/tipoConcreto", "method"=>"GET", "identica"=>true],
            ["url" => "/tipoConcreto/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxtipoConcreto", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxtipoConcreto", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxtipoConcreto", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxtipoConcreto/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxtipoConcreto", "method"=>"delete", "identica"=>false],



            ["url" => "/modalidad", "method"=>"GET", "identica"=>true],
            ["url" => "/modalidad/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxmodalidad", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxmodalidad", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmodalidad", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxmodalidad/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmodalidad/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxmodalidad/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxmodalidad", "method"=>"delete", "identica"=>false],


            ["url" => "/jornada", "method"=>"GET", "identica"=>true],
            ["url" => "/jornada/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxjornada", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxjornada", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxjornada", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxjornada/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxjornada/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxjornada/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxjornada", "method"=>"delete", "identica"=>false],


            ["url" => "/etapa", "method"=>"GET", "identica"=>true],
            ["url" => "/etapa/listar", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxetapa", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxetapa", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxetapa", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxetapa/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxetapa/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxetapa/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxetapa", "method"=>"delete", "identica"=>false],


            ["url" => "/maquinaria", "method"=>"GET", "identica"=>true],
            ["url" => "/maquinaria/cambiar/estado", "method"=>"GET", "identica"=>false],

            ["url" => "/ajaxmaquinaria", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxmaquinaria", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmaquinaria", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxmaquinaria/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxmaquinaria/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxmaquinaria/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxmaquinaria", "method"=>"delete", "identica"=>false],


            ["url" => "/operario", "method"=>"GET", "identica"=>true],

            ["url" => "/ajaxoperario", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxoperario", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxoperario", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxoperario/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxoperario/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxoperario/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxoperario", "method"=>"delete", "identica"=>false],

             //hasta aqui full

            ["url" => "/servicio", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio", "method"=>"POST", "identica"=>false], //guardo
            ["url" => "/servicio/store", "method"=>"POST", "identica"=>true],
            ["url" => "servicio/{visitum}/edit", "method"=>"POST", "identica"=>false],
            ["url" => "/servicio/update", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/cambiarEstado", "method"=>"GET", "identica"=>false], //para cambiar el estado
            ["url" => "/servicio/listarservicio", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio/show", "method"=>"GET", "identica"=>true],
            ["url" => "/servicio", "method"=>"delete", "identica"=>false], //elimina x Resource
            ["url" => "/servicio", "method"=>"patch", "identica"=>false],   //modifica x resource



            ["url" => "/cotizacion", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/cotizacion/guardar", "method"=>"POST", "identica"=>true], //OK
            ["url" => "/cotizacion/editar", "method"=>"GET", "identica"=>false], //OK
            ["url" => "/cotizacion/actualizar", "method"=>"POST", "identica"=>true], //OK
            ["url" => "/cotizacion/editarEstado", "method"=>"GET", "identica"=>false], //pendiente pero conectado
            ["url" => "/cotizacion/estado", "method"=>"POST", "identica"=>true], //pendiente

            ["url" => "/cotizacion/informe", "method"=>"GET", "identica"=>false],
            ["url" => "/cotizacion/generar/pdf", "method"=>"POST", "identica"=>true],

           //funciona
            ["url" => "/ajaxestado", "method"=>"POST", "identica"=>true],

            ["url" => "/ajaxestado", "method"=>"GET", "identica"=>true],
            ["url" => "/ajaxestado", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxestado", "method"=>"POST", "identica"=>false],
            ["url" => "/ajaxestado/edit", "method"=>"GET", "identica"=>false],
            ["url" => "/ajaxestado/update", "method"=>"PUT", "identica"=>false],
            ["url" => "/ajaxestado/update", "method"=>"PATCH", "identica"=>false],
            ["url" => "/ajaxestado", "method"=>"delete", "identica"=>false],



            ["url" => "/encuesta", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/encuesta/crear", "method"=>"GET", "identica"=>false],
            ["url" => "/encuesta/ver", "method"=>"GET", "identica"=>false],
            ["url" => "/encuesta/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/encuesta/eliminar", "method"=>"GET", "identica"=>false],
        ],
        3=>[
            ["url" => "/home", "method"=>"GET", "identica"=>true],

            ["url" => "/visita", "method"=>"GET", "identica"=>true],
            ["url" => "/visita", "method"=>"POST", "identica"=>false], //guardo
            ["url" => "/visita/store", "method"=>"POST", "identica"=>true],
            ["url" => "visita/{visitum}/edit", "method"=>"POST", "identica"=>false],
            ["url" => "/visita/update", "method"=>"GET", "identica"=>true],

            ["url" => "/visita/cambiar/estado", "method"=>"GET", "identica"=>false], //para cambiar el estado de la visita

            ["url" => "/visita/listar", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/listarvisitas", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/show", "method"=>"GET", "identica"=>true],
            ["url" => "/visita/crear/", "method"=>"GET", "identica"=>true],

            ["url" => "/visita", "method"=>"delete", "identica"=>false], //elimina x Resource
            ["url" => "/visita", "method"=>"patch", "identica"=>false],   //modifica x resource

            ["url" => "/listachequeo", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/actualizar", "method"=>"POST", "identica"=>false],
            ["url" => "/listachequeo/crear", "method"=>"GET", "identica"=>true],
            ["url" => "/listachequeo/crear/", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/editar", "method"=>"GET", "identica"=>false],
            ["url" => "/listachequeo/guardar", "method"=>"POST", "identica"=>true],
            ["url" => "/listachequeo/listar", "method"=>"GET", "identica"=>true],




        ],
    ];
}
