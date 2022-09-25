<?php

namespace App\Http\Controllers\Todo\Repositories;

use App\Http\Controllers\Todo\Contracts\TodoInterface;
use App\Models\Todo;

class TodoRepository implements TodoInterface
{
    /**
     * @var Todo
     */
    private Todo $todo;

    /**
     * TodoRepository constructor.
     *
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * @return mixed
     */
    public function index(): mixed
    {
        return $this->todo
            ->orderBy('id', 'DESC')
            ->get();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function store($request): mixed
    {
        return $this->todo
            ->create($request)->id;
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function getTodoById($id, array $columns = ['*']): mixed
    {
        return $this->todo
            ->select($columns)
            ->findOrFail($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        $todo = $this->getTodoById($id);
        return $todo->delete();

    }

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request, $id): mixed
    {
        $todo = $this->getTodoById($id);
        return $todo->update($request);
    }

}
