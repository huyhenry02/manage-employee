<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    protected $table = 'contracts';
    protected $fillable = [
        'user_id',
        'name',
        'start_date',
        'end_date',
        'terms',
        'gross_salary',
        'attachment_file',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
