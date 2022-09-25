<?php

namespace App\Http\Controllers\Todo\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Todo\Requests\TodoRequest;
use App\Http\Controllers\Todo\Services\TodoService;
use App\Http\Services\EnumerationService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TodoController extends Controller
{
    /**
     * @var TodoService
     */
    private TodoService $service;

    /**
     * LanguageController constructor.
     *
     * @param TodoService $service
     */
    public function __construct(TodoService $service)
    {
        $this->service = $service;
    }

    /**
     * Todo İndex
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('todo.todo',
            ['todos' => $this->service->index()]);
    }

    /**
     * Todo Create
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('todo.form');
    }

    /**
     * Todo Store
     * @param TodoRequest $request
     * @return RedirectResponse
     */
    public function store(TodoRequest $request): RedirectResponse
    {
        $request->merge(['user_id' => auth()->user()->id]);
        return $this->service->store($request->all()) ? redirect()->route('todo.index') : back();
    }

    /**
     * Todo Edit
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        return view('todo.form', ['todo' => $this->service->edit($id)]);
    }

    /**
     * Todo Update
     * @param TodoRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(TodoRequest $request, $id): RedirectResponse
    {
        $request->merge(['user_id' => auth()->user()->id]);
        return $this->service->update($request->all(), $id) ? redirect()->route('todo.index') : back();
    }

    /**
     * Todo Destoy
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        return $this->service->destroy($id) ? redirect()->route('todo.index') : back();
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function statusUpdate($id): RedirectResponse
    {
        return $this->service->update(['status' => '1'], $id) ? redirect()->route('todo.index') : back();
    }
}
