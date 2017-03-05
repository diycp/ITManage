<?php
class ActiveRecord extends CActiveRecord {

	public function getDbConnection()
	{
		if(self::$db!==null)
			return self::$db;
		else
		{
			self::$db=Yii::app()->getDb();
			if(self::$db instanceof DbExchange)
				return self::$db;
			else
				throw new CDbException(Yii::t('yii','Active Record requires a "db" DbExchange application component.'));
		}
	}
}
?>
