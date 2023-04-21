@extends('admin.layout')

@section('title')
    Admin - Category
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start content header -->
            @include('admin.partials.content-header', ['name' => 'Danh mục', 'key' => 'Thêm mới'])

            <!-- end content header -->
            <!-- start page create form -->
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Tên danh mục</label>
                            <input type="text" class="form-control" name="name" id="categoryName"
                                placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="selectParentCategory">Danh mục cha</label>
                            <select class="form-control" name="parent_id" id="selectParentCategory">
                                <option value="0">Chọn danh mục cha</option>
                                {!! $htmlOptions !!}
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Thêm</button>
                    </form>
                </div>
            </div> <!-- end row -->
            <!-- end page create form -->

        </div> <!-- end container-fluid -->

    </div>
@endsection
