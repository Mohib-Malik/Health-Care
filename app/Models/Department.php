<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    
    protected $fillable = ['department_name', 'status']; // This ensures mass assignment works

    public $timestamps = true; // Automatically manages created_at and updated_at
}
