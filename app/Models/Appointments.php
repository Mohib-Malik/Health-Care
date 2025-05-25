<?php
namespace App\Models;
use App\Models\patients;
use App\Models\doctors;
use App\Models\Department;

use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    protected $table = 'appointments'; 
    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'id',
        'patient_id', // Consider adding a patient_id for proper relationships
        'doctor_id',
        'department_id',
        'appointment_date',
        'appointment_time',
        'patient_age',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(patients::class, 'patient_id'); // Assuming you have a patient_id
    }

    public function doctor()
    {
        return $this->belongsTo(doctors::class, 'doctor_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    // Automatically generate custom ID when creating a new appointment
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($appointment) {
            $lastAppointment = self::orderBy('id', 'desc')->first();
            $nextId = 1; 
    
            if ($lastAppointment) {
                $lastId = substr($lastAppointment->id, 4); 
    
                \Log::info('Last ID: ' . $lastAppointment->id);
                \Log::info('Extracted Last ID: ' . $lastId); 
    
                if (is_numeric($lastId)) {
                    $nextId = intval($lastId) + 1;
                } else {
                    \Log::warning('Last ID is not numeric: ' . $lastId); 
                }
            }
    
            $appointment->id = 'APT-' . str_pad($nextId, 4, '0', STR_PAD_LEFT); 
        });
    }
}
