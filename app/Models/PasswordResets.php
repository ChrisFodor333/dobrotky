<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PasswordResets extends Model
{



    protected $table = 'password_resets';
    protected $primaryKey = 'id';


    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];


}
