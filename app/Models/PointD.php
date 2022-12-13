<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;

class PointD extends Model
{
    use HasFactory, LogsActivity;

    protected static $logName = 'Point D';

    protected $table = "point_d";
    protected $guarded = [];

    protected static $logUnguarded = true;
    public function getDescriptionForEvent(string $eventName): string
    {
        return $this->name . " {$eventName} Oleh: " . Auth::user()->name;
    }
    protected static $logOnlyDirty = true;

    public function UserId()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
