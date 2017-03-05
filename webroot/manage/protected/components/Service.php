<?php

class Service extends FormModel
{

    /**
     * Returns the list of attribute names.
     * By default, this method returns all public properties of the class.
     * You may override this method to change the default.
     * @return array list of attribute names. Defaults to all public properties of the class.
     */
    public function attributeNames(){
        $className=get_class($this);
        if(!isset(self::$_names[$className])){
            $class=new ReflectionClass(get_class($this));
            $names=array();
            foreach($class->getProperties() as $property){
                $name=$property->getName();
                if($property->isPublic() && !$property->isStatic())
                    $names[]=$name;
            }
            return self::$_names[$className]=$names;
        }
        else
            return self::$_names[$className];
    }

    /**
     * 查找属性值
     * @param  string  $model        AR类名
     * @param  integer $contentId    tbContent.id
     * @param  array   $attributeIds 属性ID
     * @return array   AR记录数组
     */
    public function findAllAttributeValue($model, $contentId, $attributeIds){
        if(!empty($contentId) && !empty($attributeIds) && is_numeric($contentId) && is_array($attributeIds)) {
            $ids = implode(',', $attributeIds);
            return $model::model()->findAll(array('select'=>array('fdAttributeID','fdValue'),
                'condition'=>"fdContentID = '{$contentId}' AND fdAttributeID IN ({$ids})"));
        }
    }

}