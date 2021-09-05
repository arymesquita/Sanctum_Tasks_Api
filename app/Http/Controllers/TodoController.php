<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoResource;
use App\Http\Requests\UpdateStoreRequest;

class TodoController extends Controller
{
    
    public function markAsDone(Todo $todo)
    {
       $todo->is_done = true;
       $todo->save();

       return new TodoResource($todo);
    }

   
    public function markAsUndone(Todo $todo)
    {
        $todo->is_done = false;
        $todo ->save();

        return new TodoResource($todo);
    }

    
   
    public function update(Todo $todo, UpdateStoreRequest $request)
    {
        $input = $request->validated();
        $todo->fill($input);
        $todo->save();

        return new TodoResource($todo);
    }

   
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
