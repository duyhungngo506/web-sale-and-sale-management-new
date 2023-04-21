@extends('admin.layout')

@section('title')
    Admin - Category
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start content header -->
            @include('admin.partials.content-header', ['name' => 'Danh mục', 'key' => 'Quản lý'])

            <!-- end content header -->
            <!-- start page table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="header-title">Danh mục sản phẩm</h4>
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm danh mục</a>
                        </div>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên danh mục</th>
                                    <th>Danh mục cha</th>
                                    <th>slug</th>
                                    <th>Thời gian tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @foreach ($categories as $item)
                                                @if ($category->parent_id === $item->id)
                                                    {{ $item->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td class=" d-flex justify-content-around"> <a
                                                href="{{ route('categories.edit', $category->id) }}"class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('categories.destroy', [$category->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class=" fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
            <!-- end page table -->

        </div> <!-- end container-fluid -->

    </div>
@endsection
