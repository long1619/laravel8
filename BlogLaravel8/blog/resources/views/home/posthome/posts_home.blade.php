  @extends('home.Home')
  @section('content')

  <!---------------------------CHI TIẾT BÀI VIẾT --------------------------------->
  <style type="text/css">
#mig {
    margin-right: 200px;
}

.single-top.single-post {
    width: 100% !important;
}
  </style>
  <div class="single">

      <div class="container">
          <div class="col-md-8">
              <div class="single-top single-post">
                  <a href="#"><img class="img-responsive center-block img-rounded"
                          src="{{ url('/images/'.$show_post_home->image) }}" alt=" " style="width:100%;height:600px "
                          id="img"></a>
                  <div class=" single-grid">
                      <h4>{{ $show_post_home->titles }}</h4>
                      <ul class="blog-ic">
                          <li><a href="#"><span> <i class="glyphicon glyphicon-user"> </i>Super user</span> </a> </li>
                          <li><span><i class="glyphicon glyphicon-time"> </i> {{$show_post_home->date }}</span></li>
                          <!-- <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li> -->
                      </ul>
                      <h5>{{ $show_post_home->desc }}</h5>
                  </div>
              </div>
              <hr>
          </div>



          <!---------------------------------------------------->
          <div class="col-md-4 about-right heading">
              <div class="abt-1">
                  <h3>Bài Viết Liên Quan</h3>
                  @foreach ($post_related as $key =>$related)
                  <div class="abt-one">

                      <div style=" display:flex">
                          <img src="{{ url('images/'.$related->image) }}" alt=""
                              style="margin:-25px 0 0 62px ; width: 15%;height:50px; " />
                          <p style="margin: -25px 0px 0px 15px;
    text-align: left;">{{$related->titles }} </p>
                          <p style="text-align: initial;">{{$related->date}} </p>
                      </div>
                      <div class="about-btn" style="margin-top:-10px">
                          <a href="{{route('post_home.show',[$related->id])}}" style="width:10px"> Đọc Tiếp </a>
                      </div>
                  </div>
                  @endforeach
              </div>



          </div>


      </div>


















      @endsection