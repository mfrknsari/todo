<?php

namespace App\Models;

use App\Http\Controllers\Todo\Enumerations\TodoStatusEnum;
use App\Http\Services\EnumerationService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'dead_at',
        'user_id',
        'status'
    ];

    /**
     * @return bool
     */
    public function isDead(): bool
    {
        return strtotime($this->dead_at) < time();
    }

    public function isStatus()
    {
        $enumerations = (new EnumerationService())->enumerationsToArray(TodoStatusEnum::class);
        return (new EnumerationService())->enumerationTranslator($enumerations[$this->status]);
    }
}
