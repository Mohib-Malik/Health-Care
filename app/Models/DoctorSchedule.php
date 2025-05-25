<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctorschedule'; // Specify the correct table name if it's different

    protected $casts = [
        'available_days' => 'array', // This will automatically handle JSON conversion
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctors::class, 'doctor_name'); // Adjust if your foreign key is different
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_name'); // Adjust if your foreign key is different
    }
}
