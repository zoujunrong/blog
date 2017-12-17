<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	
    /**
     * 设置自动维护的字段格式
     */
    public function fromDateTime($value)
    {
        return strtotime(parent::fromDateTime($value));
    }

}
