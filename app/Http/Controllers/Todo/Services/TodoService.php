<?php


namespace App\Http\Controllers\Todo\Services;

use App\Http\Controllers\Todo\Contracts\TodoInterface;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\DB;

class TodoService
{
    /**
     * @var TodoInterface
     */
    private TodoInterface $repository;

    /**
     * UserService constructor.
     * @param TodoInterface $repository
     */
    public function __construct(TodoInterface $repository)
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

    /**
     * @param $request
     * @return mixed
     */
    public function store($request): mixed
    {
        return $this->repository->store($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        return $this->repository->destroy($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id): mixed
    {
        return $this->repository->getTodoByid($id);
    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id): mixed
    {
        return $this->repository->update($request,$id);
    }
}
