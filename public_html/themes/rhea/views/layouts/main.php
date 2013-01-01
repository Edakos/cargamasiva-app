<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script>
usermenu_display = 'none';


parar_bola = true;

function _$(id)
{
   return document.getElementById(id);
}

function p_ver_usermenu(target, origen) 
{
    if (_$('usermenu') != null) {
        display = 'sin_evento';

       if (origen == 'clic') {
          //Llamada desde clic en el enlace
          display = (usermenu_display == 'none') ? '' : 'none';
          parar_bola = false;

       } else if (origen == 'fondo' && !parar_bola) {
          //Llama desde el fondo, inmediatamente luego del clic en el enlace
          parar_bola = true;

       } else {
          //Llama desde el fondo
          display = 'none';

       }

       if (display != 'sin_evento') {
          usermenu_display = display;

          _$('usermenu').style.display = usermenu_display;
          _$('usermenu').style.left = getX(target) + 'px';
          _$('usermenu').style.top = '0px';
       }
    }
}


function getX(oElement)
{
    if (oElement == null) {return 0;}
    
   var iReturnValue = 0;
    oElement = oElement.parentNode;
   while (oElement != null) {
   //if (oElement != null) {
      iReturnValue += oElement.offsetLeft;
      oElement = oElement.offsetParent;
   }
   return iReturnValue;
}

function getY(oElement)
{
    if (oElement == null) {return 0;}
   var iReturnValue = 0;

    oElement = oElement.parentNode;
   while (oElement != null) {
      iReturnValue += oElement.offsetTop;
      oElement = oElement.offsetParent;
   }
   return iReturnValue;
}

$(document).ready(function () {
    p_ver_usermenu(null, 'fondo') 
});

$(document).click(function () {
    p_ver_usermenu(null, 'fondo') 
});


    </script>
    <style>
.username {
    padding:10px;
    font-size:+12pt;
    text-align:right;
    }
.username a{
    color:#fff;
    font-weight:bold;
    }
#usermenu {
    background-color:#00304C;position:absolute;top:0px;left:0px;border:solid 0px #069;
    width:200px
    
    }
#usermenu .username{
        text-align:right;
        padding:0px !important;
        xxxwidth:150px;
    }
#usermenu a {
    display:inline-block;
    
    padding:10px 10px;
    color:#000;
    text-decoration:none;
    background-color:#eee;
    }
#usermenu a.usermenu-option:hover {
    background-color:#fff;
}
#usermenu .usermenu-option {
    width:180px;
    }
    </style>
</head>

<body>

<div class="container" id="page">

	<div id="header" style="clear:both;">
        <?php //echo CHtml::image('images/senescyt.png'); ?>
		<div id="logo" style="float:left;width:520px;">
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/carga-masiva.png', CHtml::encode(Yii::app()->name), array('width' => '200', 'height' => '100')), Yii::app()->homeUrl); ?>
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/senescyt-logo-negro.png'), 'http://www.senescyt.gob.ec'); ?>
            
            <?php //echo CHtml::image('images/sniese.png'); ?>
            <?php //echo CHtml::encode(Yii::app()->name); ?>
        </div>
        <div id="user" style="float:right;width:200px;">
<?php if (!Yii::app()->user->isGuest): ?>
<div class="username"><a href="#" onclick="p_ver_usermenu(this, 'clic'); return false;"><?php echo Yii::app()->user->name; ?> ▼</a></div>
<div id="usermenu" style="display:none;">
<div class="username"><a href="#" onclick="p_ver_usermenu(this, 'clic'); return false;"><?php echo Yii::app()->user->name; ?> ▼</a></div>
<div><?php echo CHtml::link(CHtml::image('/images/edit.gif', 'Modificar datos', array('width' => '20px', 'height' => '20px')) . ' Modificar datos', array('/usuario/modificar'), array('class' => 'usermenu-option')); ?></div>
<div><?php echo CHtml::link(CHtml::image('/images/key.gif', 'Cambiar contraseña', array('width' => '20px', 'height' => '20px')) . ' Cambiar contraseña', array('/usuario/clave'), array('class' => 'usermenu-option')); ?></div>
<div><?php echo CHtml::link(CHtml::image('/images/exit.png', 'Cerrar sesión', array('width' => '20px', 'height' => '20px')) . ' Cerrar sesión', array('/site/logout'), array('class' => 'usermenu-option')); ?></div>
</div>
<?php endif; ?>
        </div>
	</div><!-- header -->

	<div id="mainmenu" style="clear:both;">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                
                array('label'=>Yii::t('app', 'Login'), 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                
				array('label'=>Yii::t('app', 'Home'), 'url'=>array('site/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'About'), 'url'=>array('site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Contact'), 'url'=>array('site/contact'), 'visible'=>Yii::app()->user->isGuest),

/*
                array('label'=>Yii::t('app', 'Formularios'), 'url'=>array('formulario/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Tipos de dato'), 'url'=>array('tipo/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'IES'), 'url'=>array('ies/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Archivos'), 'url'=>array('archivo/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Areas del conocimiento'), 'url'=>array('conocimientoArea/index'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Provincias'), 'url'=>array('provincia/index'), 'visible'=>!Yii::app()->user->isGuest),                
*/ 

                array('label'=>Yii::t('app', 'Formulario Institucional'), 'url'=>array('formulario/llenar'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Carreras'), 'url'=>array('ies/carreras'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Cargas de archivos'), 'url'=>array('carga/realizar'), 'visible'=>!Yii::app()->user->isGuest),
                
                array('label'=>Yii::t('app', 'Configuración'), 'url'=>array('site/admin'), 'visible'=>!Yii::app()->user->isGuest), //cambio de contraseña, agregar elaborado (ver si el usuario tiene nombre), revisado, aprobado, rector (ver si se carga)

				//array('label'=>Yii::t('app', 'Cerrar sesión') . ' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs) && !Yii::app()->user->isGuest):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink' => CHtml::link('Inicio', '/site/index'),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content">
		<?php echo $content; ?>
	</div>
	<div id="footer">
        <a href="http://www.senescyt.gob.ec">SENESCYT</a> - <?php echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
