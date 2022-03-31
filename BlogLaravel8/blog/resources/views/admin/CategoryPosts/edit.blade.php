@extends('admin.Admin')
@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <!-- <h2 class="pageheader-title">Thêm Danh Mục Bài Viết </h2> -->
                    <!-- <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                        vestibulum mi. Morbi lobortis pulvinar quam.</p> -->
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li> -->
                                <!-- <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Validations</li> -->
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Cập Nhật Danh Mục Bài Viết</h5>
                    <div class="card-body">
                        <form action="{{ route('category.update',[$categoryedit->id]) }}" method="POST"
                            class="needs-validation" novalidate>
                            @csrf


                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Tiêu Đề:</label>
                                    <input type="text" class="form-control" id="" value="{{$categoryedit->title}}"
                                        name="title" required>
                                    @error('title')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Mô Tả Ngắn:</label>
                                    <input type="text" class="form-control" id="" value="{{$categoryedit->desc_short}}"
                                        required name="desc_short">
                                    @error('desc_short')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom02">Trạng Thái:</label>
                                    <select name="status" class="form-control ">
                                        @if($categoryedit->status ==0)
                                        <option selected value="0"> Ẩn</option>
                                        <option value="1"> Hiển Thị</option>
                                        @else
                                        <option value="0"> Ẩn</option>
                                        <option selected value="1"> Hiển Thị</option>
                                        @endif
                                    </select>
                                </div>



                            </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập Nhật </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>



</div>



</div>

















































@endsection