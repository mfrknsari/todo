<?php


namespace App\Http\Controllers\Log\Services;

use App\Http\Controllers\Log\Contracts\LogInterface;
use App\Http\Controllers\Todo\Contracts\TodoInterface;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\DB;

class LogService
{
    /**
     * @var LogInterface
     */
    private LogInterface $repository;

    /**
     * UserService constructor.
     * @param LogInterface $repository
     */
    public function __construct(LogInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->repository->index();
    }
}
