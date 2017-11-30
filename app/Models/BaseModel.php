<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model {
    protected static $className;
    
    public static function find($id) {
        /**
         * @var Model $model
         */
        $model = parent::find($id);
        $type = $model->getAttribute("type");
        $classNameType = static::$className.''.ucfirst(strtolower($type));
        if(class_exists($classNameType)) {
            return $classNameType::find($id);
        }
        return $model;
    }
}