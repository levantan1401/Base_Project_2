<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Calendar;
use App\Models\task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        // if ($request->ajax()) {
            //     $data = Calendar::whereDate('start', '>=', $request->start)
            //         ->whereDate('end', '<=', $request->end)
            //         ->get(['id', 'title', 'start', 'end']);
            //     return response()->json($data);
            // }
        $tasks = task::all();
        return view('admin.Calendar.full-calender',compact('tasks'));
    }

    public function action(Request $request)
    {
        if ($request->ajax()) {
            if ($request->type == 'add') {
                $event = Calendar::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end'   => $request->end,
                ]);
                return response()->json($event);
            }

            if ($request->type == 'update') {
                $event = Calendar::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end'   => $request->end,
                ]);
                return response()->json($event);
            }

            if ($request->type == 'delete') {
                $event = Calendar::find($request->id)->delete();
                return response()->json($event);
            }
        }
    }

    public function task()
    {
        $listTask = task::all();
        return view('admin.Calendar.task',compact('listTask'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Admin::all();
        return view('admin.Calendar.create',compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required',
            'id_staff' => 'required',
            'date' => 'required',
        ], [
            'title.required' => 'Tên sản phẩm không được để trống',
            'note.required' => 'Tên Slug không được để trống',
            'id_staff.required' => 'Hay lựa chọn nhân viên',
            'date.required' => 'Ngày không được để trống',
        ]);

        $request->offsetUnset('_token');
        task::create($request->all());
        return redirect()->route('task')->with('success','Thêm mới thành công');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
   }
}
