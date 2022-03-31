<!--------------------------  CHI TIẾT DANH MỤC CHỨA BÀI VIẾT ------------------------->
@extends('home.Home')
@section('content')
<div class="about">
    <div class="container">
        <div class="about-main">
            <div class="col-md-8 about-left">
                <div class="about-one">

                </div>
                <!--------------------------------->

                <div class="about-tre">

                    @foreach ($post_home as $key => $post_h)
                    <div class="row" style="margin: 15px;">
                        <div class="col-md-6 abt-left">
                            <a href="single.html">
                                <img src="{{ url('/images/'.$post_h->image) }}"
                                    style="width:80%;height:200px; margin: 0 10px;" />
                            </a>
                        </div>
                        <div class="col-md-6 abt-left">
                            <h5>Danh Mục: {{$post_h->category->title}}</h5>
                            <!--tên danh mục-->
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

            <!----------------------------------------->
            <div class="col-md-4 about-right heading" style="margin-top:32px">
                <div class="abt-1">
                    <h3>Bài Viết Mới Nhất</h3>
                    @foreach ($post_new as $key => $post_n)
                    <div class="abt-one">

                        <div style=" display:flex">
                            <img src="{{ url('images/'.$post_n->image) }}" alt=""
                                style="margin:-25px 0 0 62px ; width: 15%;height:50px; " />
                            <p style="margin: -25px 0px 0px 15px;
    text-align: left;">{{$post_n->titles }} </p>
                            <p style="text-align: initial;">{{$post_n->date}} </p>
                        </div>
                        <div class="about-btn" style="margin-top:-10px">
                            <a href="{{route('post_home.show',[$post_n->id])}}" style="width:10px"> Đọc Tiếp </a>
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
                <!-- <div class="abt-2">
                    <h3>NEWS LETTER</h3>
                    <div class="news">
                        <form>
                            <input type="text" value="Email" onfocus="this.value = '';"
                                onblur="if (this.value == '') {this.value = 'Email';}" />
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div> -->
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>








@endsection