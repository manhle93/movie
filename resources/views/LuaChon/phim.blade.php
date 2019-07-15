
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>

<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="storage/Slider/tam-cam-chuyen-chua-ke.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="storage/Slider/black-panther.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="storage/Slider/avengers-character-poster-banner.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
<h2 class="LABEL" style="margin-top: 50PX; font-size: 22px;">DANH SÁCH PHIM ĐANG CHIẾU</h2>
    <div class="row">
        @foreach($dsphim as $phim)
        <div class="col-sm-3 dsphim">
        <a href="/datve/{{$phim->id}}"><img src="{{$phim->anh_dai_dien}}" alt="" height="300px" width="220px" style="margin-bottom:20px; margin-top:40px"></a>
        <a href="/datve/{{$phim->id}}"> <p class="ten_phim">{{$phim->ten_phim}}</p></a>
        <p class="the_loai">{{$phim->the_loai}}</p>

        </div>
        @endforeach

    </div>
</div>
<footer>
    <img src="storage/Slider/footer.png" style="width: 100%;">
</footer>