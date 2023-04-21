@extends('admin.layout')

@section('title')
    Admin - menu
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start content header -->
            @include('admin.partials.content-header', ['name' => 'Menu', 'key' => 'Quản lý'])

            <!-- end content header -->
            <!-- start page table -->
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="d-flex justify-content-between mb-4">
                            <h4 class="header-title">Danh sách menu</h4>
                            <a href="{{ route('menus.create') }}" class="btn btn-primary">Thêm menu</a>
                        </div>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tên menu</th>
                                    <th>Menu cha</th>
                                    <th>Thời gian tạo</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->id }}</td>
                                        <td>{{ $menu->name }}</td>
                                        <td>
                                            @foreach ($menus as $item)
                                                @if ($menu->parent_id === $item->id)
                                                    {{ $item->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $menu->created_at }}</td>
                                        <td class=" d-flex justify-content-around"> <a
                                                href="{{ route('menus.edit', $menu->id) }}"class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('menus.destroy', [$menu->id]) }}" method="post">
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
