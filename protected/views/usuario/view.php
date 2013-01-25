<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('admin'),
	$model->username,
);

$this->menu=array(
	//array('label'=>'List Usuario', 'url'=>array('index')),
	//array('label'=>'Create Usuario', 'url'=>array('create')),
    array('label'=>'< Lista', 'url'=>array('admin')),
	array('label'=>'Modificar >', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('app', 'Are you sure you want to delete this item?'))),
	//array('label'=>'Manage Usuario', 'url'=>array('admin')),
);
?>

<h1>Detalles del usuario "<?php echo $model->username; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'first_name',
        'last_name',
        'name',
		'cedula',
        'email',
		'address',
		'cellphone',
		'birthday',
		'last_login_time',
		'disabled',
        'reset_password',
		'created',
		'modified',
		'created_by',
		'modified_by',
	),
)); ?>
