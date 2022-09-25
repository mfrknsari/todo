<?php

namespace App\Observers;

use App\Http\Controllers\Log\Contracts\LogInterface;
use App\Models\Todo;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Schema;

class TodoObserve
{
    /**
     * @param Todo $todo
     * @return void
     * @throws BindingResolutionException
     */
    public function created(Todo $todo): void
    {
        app()
            ->make(LogInterface::class)->store([
                'user_id' => auth()->user()->id,
                'todo_id' => $todo->id,
                'status' => 0
            ]);
    }

    /**
     * @param Todo $todo
     * @return void
     * @throws BindingResolutionException
     */
    public function updated(Todo $todo): void
    {
        if ($todo->isDirty('status')) {
            app()
                ->make(LogInterface::class)->store([
                    'user_id' => auth()->user()->id,
                    'todo_id' => $todo->id,
                    'status' => 3
                ]);
        } else {
            $changedColumns = [];
            $columns = Schema::getColumnListing('todos');
            foreach ($columns as $column) {
                if ($column === 'dead_at') continue;
                if ($column === 'updated_at') continue;
                if ($todo->isDirty($column))
                    $changedColumns[$column] = $todo->$column;
            }
            app()
                ->make(LogInterface::class)->store([
                    'user_id' => auth()->user()->id,
                    'todo_id' => $todo->id,
                    'changed_column' => json_encode($changedColumns, true),
                    'status' => 1
                ]);
        }
    }

    /**
     * @param Todo $todo
     * @return void
     * @throws BindingResolutionException
     */
    public function deleted(Todo $todo)
    {
        app()
            ->make(LogInterface::class)->store([
                'user_id' => auth()->user()->id,
                'todo_id' => $todo->id,
                'status' => 2
            ]);
    }
}
