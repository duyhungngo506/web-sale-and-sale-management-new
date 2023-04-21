@extends('admin.layout')

@section('title')
    Admin - menu
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start content header -->
            @include('admin.partials.content-header', ['name' => 'Menu', 'key' => 'Cập nhật'])

            <!-- end content header -->
            <!-- start page create form -->
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="{{ route('menus.update', [$menu->id]) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="menuName">Tên Menu</label>
                            <input type="text" class="form-control" value="{{ $menu->name }}" name="name"
                                id="menuName" placeholder="Nhập tên menu">
                        </div>
                        <div class="form-group">
                            <label for="selectParentmenu">Menu cha</label>
                            <select class="form-control" name="parent_id" id="selectParentmenu">
                                <option value="0">Chọn menu cha</option>
                                {!! $optionSelect !!}
                            </select>
                        </div>


                        <button type="submit" class="btn btn-success">Cập nhật</button>
                    </form>
                </div>
            </div> <!-- end row -->
            <!-- end page create form -->

        </div> <!-- end container-fluid -->

    </div>
@endsection
