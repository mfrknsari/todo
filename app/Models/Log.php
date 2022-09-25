<?php

namespace App\Models;

use App\Http\Controllers\Log\Enumerations\LogStatusEnum;
use App\Http\Controllers\Todo\Enumerations\TodoLogStatusEnum;
use App\Http\Services\EnumerationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'todo_id',
        'status',
        'changed_column'
    ];

    /**
     * @return array|Application|Translator|string|null
     */
    public function isStatus()
    {
        $enumerations = (new EnumerationService())->enumerationsToArray(LogStatusEnum::class);
        return (new EnumerationService())->enumerationTranslator($enumerations[$this->status],
            ['id' => $this->todo_id, 'rows' => $this->changed_column]);
    }
}
