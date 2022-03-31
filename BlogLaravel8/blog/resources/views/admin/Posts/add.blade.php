@extends('admin.Admin')
@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
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
                    <h5 class="card-header">Thêm Bài Viết</h5>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" class="needs-validation"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Tiêu Đề:</label>
                                    <input type="text" class="form-control" id="" placeholder="Nhập Tiêu Đề ..."
                                        name="titles">
                                    <!-- required -->
                                    @error('titles')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Mô Tả Ngắn:</label>
                                    <!-- <input type="text" class="form-control" id="" placeholder="Nhập Mô Tả Ngắn ..."
                                        name="short_desc"> -->
                                    <textarea class="form-control" id="ckeditor_short" placeholder="Nhập Mô Tả Ngăn ..."
                                        name="short_desc" rows="5" style=" resize: none;"></textarea>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Ảnh:</label>
                                    <input type="file" class="form-control" id="" placeholder="" name="image">
                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">Vui Lòng Chọn ảnh Và Chọn Đúng Định Dạng
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Nội Dung:</label>
                                    <!-- <input type="text" class="form-control" id="" placeholder="Nhập Nội Dung ..."
                                        required name="desc"> -->
                                    <textarea class="form-control" id="ckeditor_desc" placeholder="Nhập Nội Dung ..."
                                        name="desc" rows="5" style=" resize: none;"></textarea>

                                    @error('desc')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom02">Danh Mục Bài Viết</label>
                                    <select name="category_post_id" class="form-control ">
                                        @foreach($showcategory as $key =>$cate)

                                        <option value="{{ $cate->id }}"> {{ $cate->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom02">Trạng Thái</label>
                                    <select name="status" class="form-control ">
                                        <option value="0"> Ẩn</option>
                                        <option value="1"> Hiển Thị</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Thêm Bài Viết</button>
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