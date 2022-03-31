@extends('home.Home')
@section('content')
<div class="about">
    <div class="container">
        <div class="about-main" style="margin-top:0px">
            <div class="col-md-8 about-left">

                <div class="about-tre">

                    @foreach ($show_post_home as $key => $post_h)
                    <div class="row" style="margin: 15px;">
                        <div class="col-md-6 abt-left">
                            <a href="single.html">
                                <img src="{{ url('/images/'.$post_h->image) }}" style="width:80%;height:200px; margin: 0 10px;" />
                            </a>
                        </div>
                        <div class="col-md-6 abt-left">
                            <h5>Danh Mục: {{$post_h->category->title}}</h5>
                            <h3>Tên Bài Viết: {{$post_h->titles }}</h3>
                            <p> Mô Tả Ngắn: {{$post_h->short_desc }}</p>
                            <label>{{$post_h->date }}</label>
                            <div class="about-btn">
                                <a href="{{route('post_home.show',[$post_h->id])}}"> Đọc Tiếp </a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>

            </div>
            <div class="col-md-4 about-right heading" style="margin-top:32px">
                <div class="abt-1">
                    <h3>Bài Viết Mới Nhất</h3>
                    @foreach ($show_post_slidebar as $key => $slidebar)
                    <div class="abt-one">

                        <div style=" display:flex">
                            <img src="{{ url('images/'.$slidebar->image) }}" alt="" style="margin:-25px 0 0 62px ; width: 15%;height:50px; " />
                            <p style="margin: -25px 0px 0px 15px;
    text-align: left;">{{$slidebar->titles }} </p>
                            <p style="text-align: initial;">{{$slidebar->date}} </p>
                        </div>
                        <div class="about-btn" style="margin-top:-10px">
                            <a href="{{route('post_home.show',[$slidebar->id])}}" style="width:10px"> Đọc Tiếp </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="abt-2">
                    <h3>Danh Mục Gợi Ý</h3>
                    <ul style="margin: 50px;">

                        @foreach ($cate_post_recoment as $key => $cate_post_re)

                        <li><a href="{{route('cate_home.show',['id'=>$cate_post_re->id])  }}">{{ $cate_post_re->title }}
                            </a></li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="clearfix"></div>

        </div>
    </div>

</div>
@endsection
