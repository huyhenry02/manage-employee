<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkHour extends Model
{
    protected $table = 'work_hours';

    protected $fillable = [
        'employee_id',
        'date',
        'hours_worked',
        'overtime_hours',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
