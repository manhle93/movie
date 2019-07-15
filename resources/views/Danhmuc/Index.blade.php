<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>




<div id="khung">
	<div>
		<p class="tieude">DANH SÁCH PHÒNG CHIẾU PHÒNG CHIẾU</p>
	</div>
	<table border="2PX" borderCOLOR:BLACK align="center" width="600">
		<thead>
			<tr align="center" class="label" height="50px">
				<td width= "40%">TÊN PHÒNG</td>
				<td width= "40%">SỐ GHẾ</td>
				<td width= "20%">XÓA</td>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $item)
			<tr align="center" height="40px" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">
				<td>{{$item->ten_phong}}</td>
				<td>{{$item->soghe}}</td>
				<td><a href="{{route('delete.phong', $item->id)}}"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row" style="margin-top: 50px; text-align: center; font-family: 'Times New Roman', Times, serif">
    <div class="col-sm-4"><a href="{{route('add.themphong')}}"><button type="button" class="btn btn-success">CẬP NHẬT PHÒNG</button></a></div>
	<div class="col-sm-4"></div>
	<div class="col-sm-4"><a href="{{route('add.addphim')}}"><button type="button" class="btn btn-danger">CẬP NHẬT PHIM </button></a></div>
  </div>
	
</div>