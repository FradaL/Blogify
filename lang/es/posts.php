<?php

return [

    'overview' => [
        'page_title'=> 'Posts',

        'table_head' => [
            'title_active' => 'Posts',
            'title_trashed' => 'Eliminar posts',
            'hash' => 'Hash',
            'title' => 'Titulo',
            'slug' => 'Slug',
            'status' => 'Estado',
            'publish_date' => 'Fecha de Publicación',
            'actions' => 'Acciones'
        ],

        'no_results' => 'No se encontraron post.',

        'links' => [
            'trashed' => 'Mostrar Posts Eliminados',
            'active' => 'Mostrar Posts Activos',
        ],
    ],

    'form' => [
        'page' => [
            'title' => [
                'create' => 'Agregar Nuevo Post',
                'update' => 'Editar Post',
            ],
        ],

        'title' => [
            'placeholder' => 'Ingrese Título',
        ],

        'slug' => [
            'placeholder' => 'Ingrese Slug',
        ],

        'publish' => [
            'title' => 'Publicar',
            'status' => [
                'label' => 'Estado:',
            ],

            'visibility' => [
                'label' => 'Visibilidad:',
            ],

            'password' => [
                'label' => 'Contraseña:',
            ],

            'publish_date' => [
                'label' => 'Fecha de Publicación:'
            ],

            'save_button' => [
                'value' => 'Guardar Post',
            ],
        ],

        'reviewer' => [
            'title' => 'Revisor',
        ],

        'category' => [
            'title' => 'Categoría',
            'placeholder' => 'Crear Nueva Categoria',
            'no_results' => 'No se encontraron Categorias',
        ],

        'tags' => [
            'title' => 'Etiquetas',
            'placeholder' => 'Agregar Etiquetas',
            'help_block' => 'Separar etiquetas con comas',
        ],
    ],

    'validation' => [
        'required' => 'Tienes que rellenar al menos una etiqueta',
        'min' => 'Una etiqueta debe tener al menos 2 caractere',
        'max' => 'Una etiqueta puede tener como máximo 45 caracteres',
    ],

    'notify' => [
        'being_edited' => 'La publicación ya está siendo editada por: :name',
    ]
];