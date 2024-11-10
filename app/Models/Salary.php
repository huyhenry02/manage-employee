<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salary extends Model
{
    protected $table = 'salaries';

    protected $fillable = [
        'employee_id',
        'base_salary',
        'bonus',
        'deductions',
        'net_salary',
        'month_year',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
