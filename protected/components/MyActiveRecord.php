<?php

class MyActiveRecord extends CActiveRecord 
{
	public function attributeLabels()
	{
		$labels = array();
		
		foreach ($this->attributeNames() as $name) {
		    if (!isset($labels[$name])) {
                $labels[$name] = Yii::t('app', $this->generateAttributeLabel($name));
		    }
		}

		return $labels;
	}

    /**
    * Prepares create_time, create_user_id, update_time and update_user_
    id attributes before performing validation.
    */
    protected function beforeValidate()
    {
        if ($this->isNewRecord) {
            // set the create date, last updated date and the user doing the creating
            $this->created = $this->modified = new CDbExpression('NOW()');
            //$this->created_by = $this->modified_by = Yii::app()->user->id;
        } else {
            //not a new record, so just set the last updated time and last updated user id
            $this->modified = new CDbExpression('NOW()');
            //$this->modified_by = Yii::app()->user->id;
        }
        return parent::beforeValidate();
    }

}
