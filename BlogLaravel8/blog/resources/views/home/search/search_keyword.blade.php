  @extends('home.Home')
  @section('content')

  <!--------------------------  CHI TIẾT 1 DANH MỤC----------------->
  <div class="about">
      <div class="container">
          <div class="about-main">
              <div class="col-md-8 about-left">
                  <div class="about-one">
                  </div>
                  <div class="about-tre">
                      @foreach ($search_key as $key => $post_h)
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
              <div class="col-md-4 about-right heading">
                  <div class="abt-2">
                      <h3>Danh Mục Gợi Ý</h3>
                      <ul style="margin: 50px;">

                          @foreach ($cate_post_recoment as $key => $cate_post_re)

                          <li><a href="{{route('cate_home.show',[$cate_post_re->id])  }}">
                                  {{ $cate_post_re->title }} </a></li>
                          @endforeach
                      </ul>
                  </div>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
  </div
>
  @stop