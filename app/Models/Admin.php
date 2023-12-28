<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{



    protected $table = 'admin';
    protected $primaryKey = 'id';


    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];


}
