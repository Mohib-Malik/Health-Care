<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'Age', 
        'address', 
        'phone', 
        'email',
        'avatar',
    ];
}
