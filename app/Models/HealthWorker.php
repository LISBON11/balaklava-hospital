<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\HealthWorker
 *
 * @property integer $id
 * @property string $fio
 * @property integer $login_id
 * @property string $address
 * @property string $birth_date
 * @property string $post
 * @property string $description
 * @property \Carbon\Carbon $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $department_chief
 * @property-read \App\Models\HospitalDepartment $hospital_department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inpatient[] $inpatients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\InspectionProtocol[] $inspections_protocols
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReceivedPatient[] $received_patients
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inspection[] $inspections
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Procedure[] $procedures
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Operation[] $operations
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Analysis[] $analyzes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MedicalAppointment[] $medical_appointments
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Note[] $notes
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereFio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereLoginId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereBirthDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker wherePost($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $sex
 * @method static \Illuminate\Database\Query\Builder|\App\Models\HealthWorker whereSex($value)
 */
class HealthWorker extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'health_workers';

    protected $guarded = ['id'];

    protected $fillable = [
        'fio', 'name', 'address', 'birth_date',
        'post', 'description', 'login_id'
    ];

    //belongs to
    public function department_chief()
    {
        return $this->belongsTo('App\Models\User');
    }

    //has one
    public function hospital_department()
    {
        return $this->hasOne('App\Models\HospitalDepartment', 'department_chief_id');
    }

    //has many
    public function inpatients(){
        return $this->hasMany('App\Models\Inpatient','attending_doctor_id');
    }

    public function inspections_protocols(){
        return $this->hasMany('App\Models\InspectionProtocol','duty_doctor_id');
    }

    public function received_patients(){
        return $this->hasMany('App\Models\ReceivedPatient','registration_nurse_id');
    }

    public function inspections(){
        return $this->hasMany('App\Models\Inspection','doctor_id');
    }

    public function procedures(){
        return $this->hasMany('App\Models\Procedure','doctor_id');
    }

    public function operations(){
        return $this->hasMany('App\Models\Operation','doctor_id');
    }

    public function analyzes(){
        return $this->hasMany('App\Models\Analysis','doctor_id');
    }

    public function medical_appointments(){
        return $this->hasMany('App\Models\MedicalAppointment','doctor_id');
    }

    public function notes(){
        return $this->hasMany('App\Models\Note','health_worker_id');
    }
}
