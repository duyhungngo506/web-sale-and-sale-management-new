@extends('admin.layout')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start content header -->
            @include('admin.partials.content-header', ['name' => 'Trang chủ', 'key' => ''])

            <!-- end content header -->

        </div> <!-- end container-fluid -->

    </div>
@endsection
