<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Staff\CreateStaffRequest;
use App\Http\Requests\Staff\UpdateStaffRequest;
use App\Models\Staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function list(){
        $staffs =  staffs::paginate(10);
        return view('admin.staff.list',compact('staffs'));
    }

    public function add(){
        return view('admin.staff.add');
    }

    public function store(CreateStaffRequest $request)
    {
        Staffs::createNewStaff($request->validated());

        return redirect()->route('staff.list')->with('success', 'Nhân viên đã được thêm thành công!');
    }

    public function edit($id){
        $staffs = Staffs::findOrFail($id);
        return view('admin.staff.edit', compact('staffs'));
    }
    
    public function update(UpdateStaffRequest $request, $id)
{    

    $staffs = Staffs::findOrFail($id);
   
    $staffs->updateNewStaff($request->validated());
    return redirect()->route('staff.list')->with('success', 'Nhân viên đã được cập nhật thành công!');
}

    
    public function delete($id){
        $staffs = Staffs::find($id);
        $staffs->delete();

        return redirect()->route('staff.list')->with('success', 'Nhân viên đã được xóa thành công.');
    }

}
