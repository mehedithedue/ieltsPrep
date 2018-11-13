<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{

    protected $table = 'parts';

    public static function getPartName($partId){
        return (isset(self::find($partId)->name)) ? self::find($partId)->name : '';
    }
}
