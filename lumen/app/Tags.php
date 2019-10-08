<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model {

    protected $fillable = [
        "id",
        "name",
    ];
    
    protected $hidden = ['created_at', 'updated_at'];

}
