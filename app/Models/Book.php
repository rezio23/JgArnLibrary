<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $primaryKey = 'BookID';

    protected $fillable = [
        'BookName',
        'CategoryID',
        'Qty',
        'Description',
    ];

    protected $casts = [
        'Qty' => 'integer',
    ];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'CategoryID');
    }
}
