@extends('admin.Admin')
@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
                <div class="page-header">
                    <h2 class="pageheader-title">Data Tables</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet
                        vestibulum mi. Morbi lobortis pulvinar quam.</p>
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

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Danh Sách Bài Viết</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Số Thứ Tự</th>
                                        <th>Tiêu Đề</th>
                                        <th>Ảnh</th>
                                        <th>Mô Tả Ngắn</th>
                                        <th>Danh Mục</th>
                                        <th>Trạng Thái</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                @php
                                $i=0;
                                @endphp
                                @foreach($posts as $key => $posts_p)

                                @php
                                $i++
                                @endphp
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td>{{ $posts_p->titles }}</td>
                                    <td><img src="/images/{{ $posts_p->image }}" height="100" width="100"></td>

                                    <td>{{ $posts_p->short_desc }}</td>
                              
                                    <td> {{ $posts_p->category->title }}</td>
                                    <td>
                                        <?php
                                        if ($posts_p->status == 0) {
                                            echo 'Ẩn';
                                        } else {
                                            echo 'Hiển Thị';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.show',[$posts_p->id]) }}" class="btn btn-info"> Sửa
                                        </a>
                                        <a onclick="return confirm('Bạn Chắc Chắn Muốn Xóa ?');"
                                            href="{{ route('posts.destroy',[$posts_p->id]) }}" class="btn btn-danger">
                                            Xóa </a>
                                    </td>
                                </tr>
                                @endforeach

                            </table>

                        </div>
                        <div style="margin:10px 0px 0px 800px">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>











@endsectio0