<template>

  <div>
    <h2 class="tieude" style=" margin-bottom: 30px;  margin-top: 35px;">LỰA CHỌN GHẾ NGỒI</h2>
      <div class="row">
    <div class="col">
    </div>
    <div class="col-10 manhinh">
      MÀN HÌNH
    </div>
    <div class="col">
    </div>
  </div>
    <div class="grid-container">
     <div v-for="(item,index) in ghes">
      <div v-if="item.dadat=='dadat'" style="background-color:red;"  class="grid-item" >{{item.ten_ghe}}</div>
       <div v-if="item.dadat=='dangdat'" style="background-color:yellow;"  @click="dangchon(item.id)" class="grid-item mauvang" >{{item.ten_ghe}}</div>
      <div v-if="item.dadat==''"   class="grid-item ghechuadat" @click="chonghe(item.id) " >
      {{item.ten_ghe}} </div>
    </div>
    </div>
     <br>
     <span class="label">Chú thích</span>
     <br>
     <br>
      <div class="row" style="text-align: center;">
    <div class="col-sm">
      <img src="/storage/Slider/dadat.png" height="100px" width="100px"> <span class="label">Ghế đã đặt</span>
    </div>
    <div class="col-sm">
      <img src="/storage/Slider/chuadat.png" height="100px" width="100px"><span class="label"> Ghế trống</span>
    </div>
    <div class="col-sm">
      <img src="/storage/Slider/dangchon.png" height="100px" width="100px"> <span class="label">Ghế đang chọn</span>
    </div>
  </div>

    <br>
    <br>
    <h2 style="font-family: 'Times New Roman', Times, serif;
    font-size: 26px;
    font-weight: bold;">Thông tin khách hàng</h2>
    <br>
   
    <div class="row">
      <label class="col-sm-2 label">Họ và Tên</label>
      <input type="text" v-model="ten_khach_hang" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-2 label">Số điện thoại</label>
      <input type="number" v-model="so_dien_thoai" class="col-sm-6" placeholder="+84">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-2 label">Địa Chỉ</label>
      <input type="text" v-model="dia_chi" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-2 label">Ngày Sinh</label>
      <input type="date" v-model="ngay_sinh" class="col-sm-6">
    </div>

    <br>

    <button type="submit" @click="luu" class="btn btn-danger btn-lg" style="font-family: 'Times New Roman', Times, serif;">ĐẶT VÉ</button>
    
  </div>
</template>

<script>
export default {
  props: ["ghe", "phong", "phim"],
  data() {
    return {
      doimau: 'ghechuadat',
      ghes: [],
      phongchieu: null,
      phimchieu: null,
      ghedat: [],
      ten_khach_hang: null,
      so_dien_thoai: null,
      dia_chi: null,
      ngay_sinh: null
    };
  },
  methods: {
    dangchon:function(id){
        this.ghedat.forEach(Element => {
          if (Element.ghe_id == id) {
            let a = this.ghedat.indexOf(Element);
            this.ghedat.splice(a, 1);
            this.ghes.forEach(it=>{
              if(it.id==id){
                it.dadat='';
              }
            })
          }
        });
    },
    chonghe: function(id) {

        this.ghedat.push({ ghe_id: id });
          this.ghes.forEach(it=>{
              if(it.id==id){
               it.dadat='dangdat';
              }
            })
    },
    // dangdat(id){
    //  return this.dang_dat =!this.dang_dat;
    // },

    luu: function() {      
      if(this.ghedat.length == 0){alert("bạn chưa đặt ghế")}
      else{
      if(this.ten_khach_hang == null || this.ten_khach_hang == ""){alert("Bạn chưa nhập tên")}
      else{
      axios
        .post("/adddatve/" + this.phongchieu.id, {
          ghedat: this.ghedat,
          phim_id:this.phim.id,
          khachdatve: {
            ten_khach_hang: this.ten_khach_hang,
            so_dien_thoai: this.so_dien_thoai,
            dia_chi: this.dia_chi,
            ngay_sinh: this.ngay_sinh
          }
        })
        .then(Response => {
          window.location.href = "/datvethanhcong";
        });
      }
    }
    }
  },
  mounted: function() {
    (this.ghes = this.ghe),
      (this.phimchieu = this.phim),
      (this.phongchieu = this.phong);
  }
};
</script>