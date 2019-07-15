<template>
  <div id="khung">
    <p class="tieude">CẬP NHẬT PHÒNG CHIẾU</p>
    <div v-if="thongbao" class="alert alert-success thongbao"><strong>Thành công!</strong> Cập nhật giờ chiếu thành công</div>
    <h2 class="giochieu">Phim</h2>
    <multiselect
       v-model="value"
        :options="options"
        placeholder="Chọn phim"
        label="ten_phim"
        track-by="id"
        @input="layngay(value.id)">
    </multiselect>
    <br>
    <h2 class="giochieu">Ngày chiếu</h2>
     <multiselect
        v-model="ngaychieu"
        :options="ngaychieus"
        placeholder="Chọn ngày chiếu"
        label="ngay_chieu"
        track-by="id"
        @input="laygio(ngaychieu.id)">
    </multiselect>
    <br>
    <h2 class="giochieu">Giờ chiếu</h2>
    <multiselect
        v-model="giochieu"
        :options="giochieus"
        placeholder="Chọn giờ chiếu"
        label="gio_chieu"
        track-by="id"
        @input="layphong()">
    </multiselect>
    <br>
    <h2 class="giochieu">Phòng chiếu</h2>
    <multiselect
        v-model="phongchieu"
        :options="phongchieus"
        :multiple="true"
        :disabled=disabled
        placeholder="Chọn phòng chiếu"
        label="ten_phong"
        track-by="id">
    </multiselect>
  <div>
    <button @click="them" class="btn btn-danger" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">Thêm</button>  
  </div>
  <br>  
  <div class="label" style="text-align: center;"> Chi Tiết</div>
  <div>   
    <table
        class="table table-bordered table-striped dataTable"
        role="grid"
        style="margin-top: 20px; border: 2px solid black;"
      >
        <thead style="text-align: center;">
          <tr role="row">
            <th style="border: 1px solid black;">Tên Phim</th>
            <th style="border: 1px solid black;">Ngày chiếu</th>
            <th style="border: 1px solid black;">Giờ chiếu</th>
            <th style="border: 1px solid black;">Phòng chiếu</th>
            <th style="border: 1px solid black;">Xóa</th>
    
          </tr>
        </thead>
        <tbody style="text-align: center;">
          <tr v-for="(data, index) in data_phongchieu" >
            <td style="border: 1px solid black;">{{data.tenphim.ten_phim}} </td>
            <td style="border: 1px solid black;">{{data.ngaychieu.ngay_chieu}} </td>
            <td style="border: 1px solid black;"> {{data.gio.gio_chieu}}</td>
            <td style="border: 1px solid black;"> 
              <p v-for="phongs in data.phong">{{phongs.ten_phong}}</p>
              </td>
            <td style="border: 1px solid black;">
              <a class="btn btn-light" @click="xoagio(index)">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>

  </div>
  <div style="text-align: center;">
  <button @click="luu" class="btn btn-success" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;"> <i class="far fa-save"></i> Lưu</button>
  </div>
    </div>

    </template>

<script>
  import Multiselect from 'vue-multiselect'

  // register globally
  Vue.component('multiselect', Multiselect)
  export default {
    props: ['dsphim','phimmoi', 'dsphong','dsngay'],
    // OR register locally
    components: { Multiselect },
    data () {
      return {
        disabled: true,
        thongbao: true,
        value: null,
        options: [],
        ngaychieus:[],
        ngaychieu:null,
        giochieu:null,
        giochieus:[],
        phongchieu:null,
        phongchieus:[],
        data_phongchieu:[]
        
      }
    },
    methods: {
          thanhcong: function(){
      var v = this;
      setTimeout(function () {
                v.thongbao = false;
            }, 3500);
    },
        layngay(id){
            this.ngaychieu=null;
          axios.get('/getngay/'+id)
				.then(response => {
					this.ngaychieus = response.data.result;
				})
        },
        laygio(id){
            this.giochieu=null;
            axios.get('/getgio/'+id)
				.then(response => {
					this.giochieus = response.data.result;
            })
        },
        layphong(){
          this.disabled = false;
        },
        luu: function(){
              	axios.post('/addphong', {
				        phong_chieu: this.data_phongchieu
        })
        .then(Response => {
          window.location.href = "/capnhatthanhcong";
        });
        },
        them: function(){

      this.data_phongchieu.forEach(element => {
        if (
          this.value.id == element.phim_id &&
          this.ngaychieu.id == element.ngay_id &&
          this.giochieu.id == element.gio_id
        ) {
          
          let a = this.data_phongchieu.indexOf(element[1]);
          this.data_phongchieu.splice(a, 1);
          
        } 
      });
              
              this.data_phongchieu.push({
                gio_id:this.giochieu.id, 
                phong:this.phongchieu,
                tenphim: this.value,
                ngaychieu: this.ngaychieu,
                gio: this.giochieu,
                phim_id:this.value.id,
                ngay_id: this.ngaychieu.id,
               
                });
              
        },
        xoagio: function(index) {
      this.data_phongchieu.splice(index, 1);
    },       
    },
    mounted: function(){
        this.options=this.dsphim;
        this.value=this.phimmoi;
        this.ngaychieus=this.dsngay;
        this.phongchieus=this.dsphong;
        this.thanhcong();
		//sự kiện khi load trang
        },
  }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>