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
                    <h5 class="card-header">Cập Nhật Bài Viết</h5>
                    <div class="card-body">
                        <form action="{{ route('posts.update',[$showposts->id])}}" method="POST"
                            class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Tiêu Đề:</label>
                                    <input type="text" class="form-control" id="" placeholder="Nhập Tiêu Đề ..."
                                        name="titles" value="{{ $showposts->titles }}">
                                    @error('titles')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Mô Tả Ngắn:</label>
                                    <!-- <input type="text" class="form-control" id="" placeholder="Nhập Mô Tả Ngắn ..."
                                        required name="short_desc"> -->
                                    <textarea class="form-control" id="ckeditor_short" placeholder="Ghi Nội Dung"
                                        name="short_desc" rows="5" style=" resize: none;">
                                    {{ $showposts->short_desc }}
                                    </textarea>
                                    @error('short_desc')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Ảnh:</label>
                                    <input type="file" class="form-control" id="image" placeholder="Ảnh"
                                        name="image"><br>
                                    <img src="{{url('images/'.$showposts->image) }}" height="100" width="100">

                                    @error('image')
                                    <div class="alert alert-danger mt-1 mb-1">Vui Lòng Chọn ảnh Và Chọn Đúng Định Dạng
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom01">Nội Dung:</label>
                                    <textarea class="form-control" id="ckeditor_desc" placeholder="Ghi Nội Dung"
                                        name="desc" rows="5" style=" resize: none;">{{ $showposts->desc }}</textarea>

                                    @error('desc')
                                    <div class="alert alert-danger mt-1 mb-1">Không Được Để Trống
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom02">Danh Mục Bài Viết</label>
                                    <select name="category_post_id" class="form-control input-sm m-bot15">

                                        @foreach($showcategory as $key =>$cate)

                                        <option {{ $showposts->category_post_id==$cate->id ? "selected": " "}}
                                            value="{{ $cate->id }}"> {{ $cate->title }}</option>



                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label for="validationCustom02">Trạng Thái</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        @if($showposts->status==0)
                                        <option selected value="0"> Ẩn</option>
                                        <option value="1">Hiển Thị</option>
                                        @else
                                        <option value="0">Ẩn</option>
                                        <option selected value="1">Hiển Thị</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <button class="btn btn-primary" type="submit">Cập Nhật Bài Viết</button>
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