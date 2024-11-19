<?php

namespace App\Http\Controllers\Admin\Promotion;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promotion\CreatePromotionRequest;
use App\Http\Requests\Promotion\UpdatePromotionRequest;
use Illuminate\Http\Request;

use App\Models\Promotion;

class PromotionController extends Controller
{
    public function list()
    {
        $promotions = Promotion::paginate(5);
        return view('admin.promotion.list', compact('promotions'));
    }

    public function add()
    {
        return view('admin.promotion.add');
    }

    public function store(CreatePromotionRequest $request)
    {
        $validatedData = $request->validated();
        Promotion::create($validatedData);
        flash()->success('Khuyến mãi đã được thêm thành công.');
        return redirect()->route('promotion.list');
    }

    public function update($id)
    {
        $promotion = Promotion::where('id',$id)->firstOrFail();

        return view('admin.promotion.update', compact('promotion'));
    }

    public function processUpdate(UpdatePromotionRequest $request, $id)
    {

        $validated = $request->validated();


        $promotion = Promotion::where('id',$id)->firstOrFail();

        $promotion->code = $validated['code'];
        $promotion->discount = $validated['discount'];
        $promotion->number_use = $validated['number_use'];
        $promotion->start_time = $validated['start_time'];
        $promotion->end_time = $validated['end_time'];
        $promotion->status = $validated['number_use']<= 0 ? 'inactive' : $validated['status'];
        $promotion->describe = $validated['describe'];
        
        $promotion->save();

        flash()->success('Khuyến mãi đã được cập nhật thành công.');
        return redirect()->route('promotion.list');
    }

    public function delete(Request $request, $id)
    {
        $promotion = Promotion::findOrFail($id);


        $promotion->delete();

        flash()->success('Khuyến mãi đã được xóa thành công.');
        return redirect()->route('promotion.list');
    }
}
