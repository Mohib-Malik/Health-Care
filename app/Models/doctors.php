<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    protected $table = 'doctors'; // Specify the correct table name if it's different

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class);
    }
    
}
