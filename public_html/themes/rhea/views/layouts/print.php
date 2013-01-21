<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="screen, projection" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
<style>
input[type=submit]{
    display:none;
    }
    
table tr td, table tr th {
    page-break-inside: avoid;
    vertical-align:top;
}
body {
    padding:20mm;
    width:210mm;
}

.nobreak{
    page-break-inside: avoid;
    xxxborder:solid 2px #f00;
}

table {
    width:18cm;
}

.sombreado {
    background-color:#eee;
}

</style>

</head
<body>
<div class="container">
    <div id="header">
        <div><?php echo CHtml::image('http://cargamasiva.senescyt.gob.ec/images/senescyt-logo.png'); //echo CHtml::image(Yii::app()->request->baseUrl . '/images/senescyt-logo.png'); ?></div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
    </div>
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

</body>
</html>
