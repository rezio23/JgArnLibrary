<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $primaryKey = 'BorrowingID';

    protected $fillable = [
        'UserID',
        'BookID',
        'BorrowedDate',
        'ReturnedDate',
        'Status',
    ];

    protected $casts = [
        'BorrowedDate' => 'datetime',
        'ReturnedDate' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'BookID', 'BookID');
    }
}
