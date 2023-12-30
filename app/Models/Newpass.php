<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Newpass extends Model
{



    protected $table = 'newpass';
    protected $primaryKey = 'id';


    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];


}
