<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{



    protected $table = 'customer';
    protected $primaryKey = 'id';


    protected $fillable = [
        'fname',
        'lname',
        'height',
        'weight',
        'age',
        'alergies',
        'activity',
        'lifestyle',
        'goal',
        'boky',
        'pas',
        'stehno',
        'inbody',
        'gender',
        'city',
        'pament',
        'note',
        'active',
        'mobil',
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
