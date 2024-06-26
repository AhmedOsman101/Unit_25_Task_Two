<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RequestModel extends Model {
    use HasFactory;
    protected $table = 'requests';

    protected $fillable = [
        'description',
        'user_id',
        'service_id',
        'status'
    ];


    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }
}
