<?php
//MENU PRINCIPAL:
    $menu = [];
    $menu[] = [
        'id' => 'principal',
        'nombre' => 'PRINCIPAL',
        'icono' => 'icon icon-principal',
        'url' => 'index.php?url=principal',
		'mostrar' => -1
    ];
	$menu[] = [
        'id' => 'about',
        'nombre' => 'QUIENES SOMOS',
        'icono' => 'icon icon-contacto',
        'url' => 'index.php?url=about',
		'mostrar' =>-1
    ];
	$menu[] = [
        'id' => 'contacto',
        'nombre' => 'CONTACTO',
        'icono' => 'icon icon-contacto',
        'url' => 'index.php?url=contacto',
		'mostrar' =>-1
    ];
	$menu[] = [
        'id' => 'productos',
        'nombre' => 'PRODUCTOS',
        'icono' => 'icon icon-contacto',
        'url' => 'index.php?url=productos',
		'mostrar' =>-1
    ];
	$menu[] = [
        'id' => 'comentar',
        'nombre' => 'COMENTAR',
        'icono' => 'icon icon-contacto',
        'url' => 'index.php?url=comentar',
		'mostrar' =>0
    ];
    $menu[] = [
        'id' => 'construccion',
        'nombre' => 'CONSTRUCCION',
        'icono' => '',
        'url' => 'index.php?url=construccion',
		'mostrar' => 0
    ];
	$menu[] = [
        'id' => '404',
        'nombre' => '404',
        'icono' => '',
        'url' => 'index.php?url=404',
		'mostrar' => 0
    ];

//SLIDERS DE PAGINA PRINCIPAL:
    $sliders = [];
    $sliders[] = [
        'src' => 'img/principal/slider1.jpg',
        'alt' => 'slider1',
        'title' => 'slider1',
        'width' => '940',
        'height' => '529',
		'url' => 'index.php?url=productos&id=44'
    ];
    $sliders[] = [
        'src' => 'img/principal/slider2.jpg',
        'alt' => 'slider2',
        'title' => 'slider2',
        'width' => '940',
        'height' => '529',
		'url' => 'index.php?url=contacto&todo=-1'
    ];
    $sliders[] = [
        'src' => 'img/principal/slider1.jpg',
        'alt' => 'slider1',
        'title' => 'slider1',
        'width' => '940',
        'height' => '529',
		'url' => 'index.php?url=productos&id=44'
    ];
    $sliders[] = [
        'src' => 'img/principal/slider2.jpg',
        'alt' => 'slider2',
        'title' => 'slider2',
        'width' => '940',
        'height' => '529',
		'url' => 'index.php?url=contacto&todo=-1'
    ];
    $sliders[] = [
        'src' => 'img/principal/slider1.jpg',
        'alt' => 'slider1',
        'title' => 'slider1',
        'width' => '940',
        'height' => '529',
		'url' => 'index.php?url=productos&id=44'
    ];
    
?>