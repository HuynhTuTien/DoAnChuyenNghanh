@extends('layouts.admin')
@section('title', 'Manage Ingredients')

@section('content')
<div class="content-body">
    <div class="container w-75">
        <div class="col-xl-12">
            <div class="card dz-card" id="bootstrap-table1">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-header flex-wrap border-0">
                            <h2 class="card-title">Danh sách nguyên liệu cho món ăn: <strong>{{ $dish->name }}</strong></h2>
                        </div>
                        <div class="card-body pt-0">
                            <!-- Table -->
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Tên nguyên liệu</th>
                                        <th>Số lượng</th>
                                        <th>Đơn vị</th>
                                        <th>Tùy Chỉnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dish->ingredients as $ingredient)
                                        <tr>
                                            <td>{{ $ingredient->name }}</td>
                                            <td>{{ $ingredient->pivot->quantity }}</td>
                                            <td>{{ $ingredient->unit }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('dish.updateIngredientQuantity', [$dish->slug, $ingredient->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $ingredient->pivot->quantity }}" required class="form-control form-control-sm w-auto d-inline-block">
                                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>
                                                </form>

                                                <form action="{{ route('dish.deleteIngredient', [$dish->slug, $ingredient->id]) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Add Ingredient Form -->
                            <h3 class="mt-5 mb-3 card-title">Thêm nguyên liệu mới</h3>
                            <form action="{{ route('dish.addIngredient', $dish->slug) }}" method="POST" class="w-50">
                                @csrf
                                <div class="form-group">
                                    <label for="ingredient_id">Chọn nguyên liệu:</label>
                                    <select name="ingredient_id" required class="form-control">
                                        @foreach ($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}">
                                                {{ $ingredient->name }} ({{ $ingredient->unit }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Số lượng:</label>
                                    <input type="number" name="quantity" required min="1" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success mt-2 mb-3">Thêm nguyên liệu</button>
                            </form>
                            <a href="{{ route('dish.list') }}" class="btn btn-primary mt-2 me-1 m-2 float-end">Quay lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
