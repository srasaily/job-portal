<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'email', 'detail', 'is_verified', 'verification_token'];

    public function jobSkills()
    {
        return $this->belongsToMany(JobSkill::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
}
