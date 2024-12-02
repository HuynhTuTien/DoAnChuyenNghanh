@extends('layouts.admin')

@section('content')
    <div class="content-body">
        <div class="container w-50">
            <div class="col-xl-12">
                <div class="card dz-card" id="bootstrap-table1">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="Preview" role="tabpanel" aria-labelledby="home-tab">
                            <div class="card-header flex-wrap border-0">
                                <div>
                                    <h2 class="card-title">Nhập nguyên liệu từ nhà cung cấp</h2>


                                    <a href="{{ route('supplier.create') }}" class="btn btn-info mt-2 me-1 m-2 float-end">Thêm nhà cung cấp</a>

                                    <a href="{{ route('ingredient.create') }}" class="btn btn-info mt-2 me-1 m-2 float-end">Thêm nguyên liệu</a>

                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <form action="{{ route('ingredient.storeEntry') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="ingredient_id">Nguyên liệu</label>
                                        <select name="ingredient_id" id="ingredient_id" class="form-control" required>
                                            @foreach($ingredients as $ingredient)
                                                <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier_id">Nhà cung cấp</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control" required>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Số lượng</label>
                                        <input type="text" name="quantity" id="quantity" class="form-control"
                                               pattern="^\d+(\.\d{1,2})?$" title="Nhập số thập phân với tối đa 2 chữ số sau dấu chấm" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="unit">Đơn vị</label>
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="">Chọn đơn vị</option>
                                            @foreach ($ingredients as $ingredient)
                                                <option value="{{ $ingredient->unit }}">{{ $ingredient->unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Đơn giá nhập</label>
                                        <input type="number" name="price" id="price" class="form-control" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary m-2">Nhập nguyên liệu</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
