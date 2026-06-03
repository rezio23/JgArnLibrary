<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class, 'BookID', 'BookID');
    }
}
