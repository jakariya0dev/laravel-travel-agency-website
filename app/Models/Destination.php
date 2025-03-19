<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'country',
        'city',
        'visa',
        'language',
        'currency',
        'activity',
        'visit_time',
        'safety',
        'area',
        'time_zone',
        'featured_photo',
        'map_link',
        'view_count',
    ];
}
