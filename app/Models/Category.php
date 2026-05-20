<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $primaryKey = 'CategoryID';

    protected $fillable = [
        'CategoryName',
        'Description',
    ];

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'UpdatedDate';

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'CategoryID', 'CategoryID');
    }
}
