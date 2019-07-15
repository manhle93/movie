<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>


<div class="container">
	<div>
		<p class="tieude">BÁO CÁO KHÁCH HÀNG</p>
	</div>
<table border="2PX" borderCOLOR:BLACK align="center" width="1000">
    <tr>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Địa chỉ</th>
        <th>Ngày sinh</th>
        <th>Tên phim</th>
        <th>Số vé đã đặt</th>
        <th>Ngày chiếu</th>
        <th>Giờ chiếu</th>
        <th>Phòng chiếu</th>
        <th>Ghế đã đặt</th>
    </tr>
    @foreach($khachhangs as $khachhang)
    <tr>
        <td>{{$khachhang->ten_khach_hang}}</td>
        <td>{{$khachhang->so_dien_thoai}}</td>
        <td>{{$khachhang->dia_chi}}</td>
        <td>{{$khachhang->ngay_sinh}}</td>
        <td>{{$khachhang->phim->ten_phim}}</td>
        <td>{{count($khachhang->datVe)}}</td>
        <td>{{$khachhang->ngay}}</td>
        <td>{{$khachhang->gio}}</td>
        <td>{{$khachhang->phong}}</td>
        <td>
        ghế:
            @foreach($khachhang->datVe as $item)
                <a> {{$item->ghe->danhMucGhe->ten_ghe}},</a>
            @endforeach
        </td>

    </tr>
    @endforeach
</table>
<br>
<br>
<div class="row">
    <div class="col">
      
    </div>
    <div class="col" style="text-align: center;">
    <a href="/home"> <button type="button" class="btn btn-danger btn-lg" style="font-family: 'Times New Roman', Times, serif;
    font-size: 20px; font-weight: bold; text">Trang chủ</button></a>
    </div>
    <div class="col">
      
    </div>
  </div>
</div>
<footer style=" margin-top: 200px;">
    <img src="storage/Slider/footer.png" style="width: 100%;">
</footer>