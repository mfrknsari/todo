<?php

namespace App\Http\Controllers\Log\Enumerations;

abstract class LogStatusEnum
{
    const CREATED = 0;
    const UPDATED = 1;
    const DELETED = 2;
    const STATUS_UPDATED = 3;
}
