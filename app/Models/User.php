<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;


   

    // Table name (optional since it's already 'users', but good practice)
    protected $table = 'users';

    // Primary key (optional, since Laravel assumes 'id')
    protected $primaryKey = 'id';

    // Allow mass assignment on these columns
    protected $fillable = [
        'name',
        'phone_number',
        'password',
        'email',
    ];

    // Laravel will handle created_at and updated_at automatically
    public $timestamps = true;
}
