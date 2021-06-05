<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'usersreg';
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_password'
       ];
}
