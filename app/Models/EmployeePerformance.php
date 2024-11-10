<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeePerformance extends Model
{
    protected $table = 'employee_performance';

    protected $fillable = [
        'employee_id',
        'review_date',
        'performance_score',
        'reviewer_id',
        'total_salary',
        'work_hours',
        'comment',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
