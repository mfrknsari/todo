<?php

namespace App\Http\Controllers\Log\Repositories;

use App\Http\Controllers\Log\Contracts\LogInterface;
use App\Models\Log;

class LogRepository implements LogInterface
{
    /**
     * @var Log
     */
    private Log $log;

    /**
     * LogRepository constructor.
     *
     * @param Log $log
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->log
            ->where('user_id',auth()->user()->id)
            ->orderBy('id','DESC')
            ->get();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request): mixed
    {
        return $this->log
            ->create($request)->id;
    }

}
