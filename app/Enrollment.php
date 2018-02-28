<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'stripe_id', 'subscription_id', 'course_id', 'ends_at', 
    ];
}
