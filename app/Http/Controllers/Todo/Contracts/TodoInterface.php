<?php

namespace App\Http\Controllers\Todo\Contracts;


interface TodoInterface
{

    /**
     * @return mixed
     */
    public function index(): mixed;

    /**
     * @param $request
     * @return mixed
     */
    public function store($request): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed;

    /**
     * @param $request
     * @param $id
     * @return mixed
     */
    public function update($request,$id): mixed;
}
