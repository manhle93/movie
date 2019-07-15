<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}"></script>
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div id="khung">
    <div>
        <p class="tieude">CẬP NHẬT DANH MỤC PHÒNG CHIẾU</p>
    </div>
    <div class="row">
    <div class="col-sm" style="text-align: center;">
    <a href="/home"> <button type="button" class="btn btn-danger btn-lg" style="font-family: 'Times New Roman', Times, serif;
    font-size: 20px; font-weight: bold;">Trang chủ</button></a>
    </div>
    <div class="col-sm">
      
    </div>
    <div class="col-sm" style="text-align: center;">
    <a href="danhsachphong"> <button type="button" class="btn btn-success btn-lg" style="font-family: 'Times New Roman', Times, serif;
    font-size: 20px; font-weight: bold; width: 240px;">Danh sách phòng chiếu</button></a>
    </div>
  </div>
<br>
<br>
    <form method="POST" action="{{route('add.themphong')}}" style="text-align: center;">
        @csrf
        <div class="row">
            <label class="col-sm-2 label">Tên phòng</label>
            <input type="text" name="ten_phong" class="col-sm-6">
        </div>
        <br>
        <div class="row">
            <label class="col-sm-2 label"> Số Ghế</label>
            <input type="number" name="so_ghe" class="col-sm-6">
        </div>
        <!-- <div class="vitriluu">
        <button type="submit" id="onsubmit" class="btn btn-primary btn-lg luu"> LƯU </button>
        </div> -->
        <br>

 <div class="row">
 <div class="col">
   
    </div>
    <div class="col">
    <button type="submit" id="onsubmit" class="btn btn-primary btn-lg luu"> LƯU </button>
    </div>
</div>
    </form>
    
</div>