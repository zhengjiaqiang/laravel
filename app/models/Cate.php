<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //自定义表
    protected $table='cate';
    protected $primaryKey='cate_id';
    public $timestamps=false;
    /**
     *不能被批量赋值的属性 @var array
     */
    protected $guarded=[];//黑名单:$guarded属性包含你不想被赋值的属性数组(禁止某个属性入库)
}
