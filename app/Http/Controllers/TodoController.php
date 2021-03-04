<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Item;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::orderBy('priority')->get();
        return view('todo.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'priority' => 'required|numeric'
        ]);

        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()],422);

        $todo = Todo::create($request->all());

        if ($request->items) {
            foreach($request->items as $item){
                if (empty($item)) continue;
                Item::create([
                    'title'  => $item,
                    'todo_id'   => $todo->id
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message'=>__('Todo successfully added'),
            'url' => route('todo.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit',compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(),[
            'name' => 'required',
            'priority' => 'required|numeric'
        ]);

        if ($validator->fails())
            return response()->json(['errors'=>$validator->errors()->all()],422);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        $todo->items()->delete();

        if ($request->items) {
            foreach($request->items as $item){
                if (empty($item)) continue;
                Item::create([
                    'title'  => $item,
                    'todo_id'   => $todo->id
                ]);
            }
                
        }

        return response()->json([
            'success' => true,
            'message'=>__('Todo successfully updated'),
            'url' => route('todo.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->items()->delete();
        $todo->delete();
        return response()->json([
            'message' => 'Todo deleted successfully'
        ]);
    }

    /**
     * [bulkDestroy description]
     * @param  Request $request [description]
     * @return json           [description]
     */     
    public function bulkDestroy(Request $request)
    {
        Item::whereIn('todo_id',$request->ids)->delete();
        Todo::whereIn('id',$request->ids)->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }

    /**
     * [bulkEdit description]
     * @param  Request $request [description]
     * @return blade view           [description]
     */
    public function bulkEdit(Request $request)
    {
       $todos = Todo::find($request->ids);
       return view('todo.edit-bulk',compact('todos'));
    }

    /**
     * [bulkUpdate description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function bulkUpdate(Request $request)
    {
        foreach ($request->status as $todo_id => $value) {
            Todo::where('id',$todo_id)->update(['status' => $value]);
        }
        foreach ($request->priority as $todo_id => $value) {
            Todo::where('id',$todo_id)->update(['priority' => $value]);
        }
        return response()->json([
            'message' => 'Todo updated successfully',
            'url'    => route('todo.index')
        ]);
    }
}
