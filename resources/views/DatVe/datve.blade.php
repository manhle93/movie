<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


<div class="container">

    <div class="row">
        <div class="col-sm-4 avatar">
            <img src="/{{$phim->anh_dai_dien}}" height="450px" width="330px">
        </div>
        <div class="col-sm-8 noidung">
            <h2 class="tenphim">{{$phim->ten_phim}}</h2><br>
            <label class="phim">Thể Loại: </label><span class="noidungphim"> {{$phim->the_loai}}</span><br>
            <label class="phim">Quốc Gia: </label><span class="noidungphim"> {{$phim->quoc_gia}}</span><br>
            <label class="phim">Hãng: </label><span class="noidungphim"> {{$phim->hang}}</span><br>
            <label class="phim">Thời lượng: </label><span class="noidungphim"> {{$phim->thoi_luong}}</span><br>
            <label class="phim">Ngôn Ngữ: </label><span class="noidungphim"> {{$phim->ngon_ngu}}</span><br>
        </div>
    </div>

    <br>
    @foreach($ngaychieu as $ngay)

    <div class="ngaychieu">Ngày chiếu: {{$ngay->ngay_chieu}}</div>

    @foreach($ngay->gioChieu as $gio)
    <div>
        <div class="thoigian">Thời gian: {{$gio->gio_chieu}}</div>
        <div class="phongchieu">
            @foreach($gio->phongChieu as $phong)
            <a href="/datghe/{{$phong->id}}" class="tenphong">{{$phong->danhmucphongChieu->ten_phong}}</a>
            @endforeach
        </div>
        @endforeach
    </div><br>
    @endforeach
</div>

<footer>
    <img src="/storage/Slider/footer.png" style="width: 100%;">
</footer>