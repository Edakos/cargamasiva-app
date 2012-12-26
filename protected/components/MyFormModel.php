<?php

class MyFormModel extends CFormModel
{
	public function attributeLabels()
	{
		$labels = array();
		
		foreach($this->attributeNames() as $name) {
		    if (!isset($labels[$name])) {
			$labels[$name] = Yii::t('app', $this->generateAttributeLabel($name));
		    }
		}
		
		return $labels;
	}
}
