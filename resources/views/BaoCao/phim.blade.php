<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>


<div class="container">
	<div>
		<p class="tieude">BÁO CÁO LƯỢNG ĐẶT VÉ THEO PHIM</p>
	</div>
<table border="2PX" borderCOLOR:BLACK align="center" width="600">
    <tr>
        <th>Tên phim</th>
        <th>Thể loại</th>
        <th>Quốc gia</th>
        <th>Số vẽ đã đặt</th>
    </tr>
    @foreach($phims as $phim)
    <tr>
       
        <td>{{$phim->ten_phim}}</td>
        <td>{{$phim->the_loai}}</td>
        <td>{{$phim->quoc_gia}}</td>
        <td>{{count($phim->datVe)}}</td>
        
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


</div>

<footer style=" margin-top: 300px;">
    <img src="storage/Slider/footer.png" style="width: 100%;">
</footer>