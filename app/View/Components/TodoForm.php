<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TodoForm extends Component
{
    public $method,
        $route,
        $isParameter,
        $todo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method, string $route, bool $isParameter, $todo = null)
    {
        $this->method = $method;
        $this->route = $route;
        $this->isParameter = $isParameter;
        $this->todo = $todo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.todo-form',
            [
                'method' => $this->method,
                'route' => $this->route,
                'isParameter' => $this->isParameter,
                'todo' => $this->todo
            ]);
    }
}
