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
</head>

<body>

<div class="container" id="page">

	<div id="header">
        <?php //echo CHtml::image('images/senescyt.png'); ?>
		<div id="logo">
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/carga-masiva.png', CHtml::encode(Yii::app()->name), array('width' => '200', 'height' => '100')), Yii::app()->createAbsoluteUrl(Yii::app()->request->url)); ?>
            <?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl . '/images/senescyt.png'), 'http://www.senescyt.gob.ec'); ?>
            
            <?php //echo CHtml::image('images/sniese.png'); ?>
            <?php //echo CHtml::encode(Yii::app()->name); ?>
        </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				//array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				//array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                
                array('label'=>Yii::t('app', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                
				array('label'=>Yii::t('app', 'Home'), 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'About'), 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Contact'), 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
				
                array('label'=>Yii::t('app', 'Formularios'), 'url'=>array('/formulario'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Tipos de dato'), 'url'=>array('/tipo'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'IES'), 'url'=>array('/ies'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Archivos'), 'url'=>array('/archivo'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Areas del conocimiento'), 'url'=>array('/conocimientoArea'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>Yii::t('app', 'Provincias'), 'url'=>array('/provincia'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Logout') . ' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>''
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
