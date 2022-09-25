<?php

namespace App\Http\Controllers\Log\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Log\Services\LogService;
use App\Http\Controllers\Todo\Enumerations\TodoStatusEnum;
use App\Http\Controllers\Todo\Requests\TodoRequest;
use App\Http\Controllers\Todo\Services\TodoService;
use App\Http\Services\EnumerationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * @var LogService
     */
    private LogService $service;

    /**
     * LanguageController constructor.
     *
     * @param LogService $service
     */
    public function __construct(LogService $service)
    {
        $this->service = $service;
    }

    /**
     * Log Index
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('log.log', ['logs' => $this->service->index()]);
    }
}
