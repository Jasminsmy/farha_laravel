<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BusinessUnit;
use App\Models\User;

class Project extends Model
{
    use HasFactory;
        protected $fillable = [
        'system_owner', 'system_pic', 'start_date', 'duration', 'end_date',
        'status', 'lead_developer', 'developers', 'methodology', 'platform', 'deployment_type'
    ];

    public function progressReports()
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function systemOwner()
    {
        return $this->belongsTo(BusinessUnit::class, 'system_owner', 'name');
    }

    //public function systemPIC()
    //{
    //    return $this->belongsTo(User::class, 'system_pic');
    //}
}
