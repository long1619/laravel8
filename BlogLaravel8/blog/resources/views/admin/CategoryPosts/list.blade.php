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
                    <h5 class="card-header">Danh Sách Danh Mục </h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Số Thứ Tự</th>
                                        <th>Tiêu Đề</th>
                                        <th>Mô Tả Ngắn</th>
                                        <th>Trạng Thái</th>
                                        <th>Chức Năng</th>
                                    </tr>
                                </thead>
                                @php
                                $i=0;
                                @endphp

                                @foreach($showcategory as $key => $value)
                                @php
                                $i++
                                @endphp
                                <tr>
                                    <td> {{ $i }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->desc_short }}</td>
                                    <td>
                                        <?php
                                        if ($value->status == 0) {
                                            echo 'Ẩn';
                                        } else {
                                            echo ' Hiển Thị';
                                        }
                                        ?>

                                    </td>
                                    <th> <a href="{{ route('category.show',[$value->id]) }}" class="btn btn-info"> Sửa
                                        </a>

                                        <a onclick="return confirm('Bạn Chắc Chắn Muốn Xóa ?');"
                                            href="{{ route('category.destroy',[$value->id]) }}"
                                            class="btn btn-danger">Xóa
                                        </a>
                                    </th>

                                </tr>
                                @endforeach
                            </table>

                        </div>
                        <div style="margin:10px 0px 0px 800px">
                            {{$showcategory->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>





@endsectio0