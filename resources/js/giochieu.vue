<template>
  <div id="khung">
    <p class="tieude">CẬP NHẬT GIỜ CHIẾU</p>
    <div v-if="thongbao" class="alert alert-success thongbao"><strong>Thành công!</strong> Cập nhật phim và ngày chiếu thành công</div>
    <div>
      <H2 class="giochieu">Phim</H2>
      <multiselect
        v-model="value"
        :options="options"
        placeholder="Chọn Phim"
        label="ten_phim"
        track-by="id"
        @input="layngay(value.id)"
      ></multiselect>
      <br>
      <h2 class="giochieu">Ngày chiếu</h2>
      <multiselect
        v-model="ngaychieu"
        :options="ngaychieus"
        placeholder="Chọn ngày chiếu"
        label="ngay_chieu"
        track-by="id"
        @input="checkbox()"
      ></multiselect>
      <br>
      
      <div>
        <h2 class="giochieu">Giờ chiếu</h2>
        <div class="row">
        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="9h" checked type="checkbox" value="9 giờ 00" v-model="chongio" :disabled=disable>
            <div class="checkbox-checkmark"></div>
          </div>
          <label 
            for="9h"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >9 giờ 00</label>
        </div>
        

        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="11h" checked type="checkbox" value="11 giờ 00" v-model="chongio" :disabled=disable>
            <div class="checkbox-checkmark"></div>
          </div>
          <label
            for="11h"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >11 giờ 00</label>
        </div>
        </div>
         <br>

        <div class="row">
        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="13h30" checked type="checkbox" value="13 giờ 30" v-model="chongio" :disabled=disable>
            <div class="checkbox-checkmark"></div>
          </div>
          <label
            for="13h30"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >13 giờ 30</label>
        </div>

        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="15h00" checked type="checkbox" value="15 giờ 00" v-model="chongio" :disabled=disable>
            <div class="checkbox-checkmark"></div>
          </div>
          <label
            for="15h00"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >15 giờ 00</label>
        </div>
        </div>
         <br>

        <div class="row">
        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="17h00" checked type="checkbox" value="17 giờ 00" v-model="chongio" :disabled=disable>
            <div class="checkbox-checkmark"></div>
          </div>
          <label
            for="17h00"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >17 giờ 00</label>
        </div>

        <div class="col-6 col-md-6 checkbox small">
          <div class="checkbox-container">
            <input id="21h30" checked type="checkbox" value="21 giờ 30" v-model="chongio" :disabled=disable >
            <div class="checkbox-checkmark"></div>
          </div>
          <label
            for="21h30"
            style="font-family: 'Times New Roman', Times, serif;font-size: 18px; font-weight: bold;"
          >21 giờ 30</label>
        </div>
        </div>
         <br>
      </div>

      <button @click="them" class="btn btn-danger" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">Thêm</button>
      <br>
      <br>
      <div class="label" style="text-align: center;">Chi tiết</div>

       <table
        class="table table-bordered table-striped dataTable"
        role="grid"
        style="margin-top: 20px; border: 2px solid black;"
      >
        <thead style="text-align: center; border: 1px solid black;">
          <tr role="row" >
            <th style="text-align: center; border: 1px solid black;">Tên Phim</th>
            <th style="text-align: center; border: 1px solid black;">Ngày chiếu</th>
            <th style="text-align: center; border: 1px solid black;">Giờ chiếu</th>
            <th style="text-align: center; border: 1px solid black;">Xóa</th>
    
          </tr>
        </thead>
        <tbody >
          <tr v-for="(data, index) in data_giochieu" >
            <td style="text-align: center; border: 1px solid black;">{{data.tenphim}} </td>
            <td style="text-align: center; border: 1px solid black;">{{data.ngay_chieu}} </td>
            <td style="text-align: center; border: 1px solid black;"> 
              <p v-for="gio in data.gio">{{gio}}</p>
              </td>
            <td style="text-align: center; border: 1px solid black;">
              <a class="btn btn-light" @click="xoagio(index)">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="vitriluu">
         <button @click="luu" class="btn btn-success" style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">Tiếp Theo <i class="fas fa-arrow-alt-circle-right"></i></button>
      </div>
    </div>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

// register globally
Vue.component("multiselect", Multiselect);
export default {
  props: ["dsphim", "phimmoi", "dsngay"],
  // OR register locally
  components: { Multiselect },
  data() {
    return {
      disable: true,
      thongbao: true,
      giochieu: false,
      chongio: [],
      value: null,
      options: [],
      ngaychieus: [],
      ngaychieu: null,
      data_giochieu: []
    };
  },
  methods: {
    thanhcong: function(){
      var v = this;
      setTimeout(function () {
                v.thongbao = false;
            }, 3500);
    },
    checkbox(){
      this.disable= false;
    },
    layngay(id) {
      this.giochon = true;
      this.ngaychieu = null;
      axios.get("/getngay/" + id).then(response => {
        this.ngaychieus = response.data.result;
      });
    },

    luu: function() {
      if(this.chongio.length == 0){
        alert("Bạn chưa nhập giờ chiếu")
      }else {
      if(this.chongio.Length = 0){}
      axios
        .post("/addgio", {
          gio_chieu: this.data_giochieu
        })
        .then(response => {
          window.location.href = "/addphong/" + response.data.result.phim_id;
        });
      }
    },

    them: function() {
      // Kiểm tra nếu ngày chiếu đã được chọn khi nhập giờ, sẽ nhập giờ chiếu đè vào
      this.giochon = true;
      var err = null;
      this.data_giochieu.forEach(element => {
        if (
          this.value.id == element.phim_id &&
          this.ngaychieu.id == element.ngay_id
        ) {
          
          let a = this.data_giochieu.indexOf(element[1]);
          this.data_giochieu.splice(a, 1);
          
        } 
      });
      this.data_giochieu.push({
        tenphim: this.value.ten_phim,
        ngay_chieu: this.ngaychieu.ngay_chieu,
        ngay_id: this.ngaychieu.id,
        gio: this.chongio,
        phim_id:this.value.id
      });
      // Đẩy ngay_id và toàn bộ mảng chọn giờ vào mảng data_giochieu
    },
    xoagio: function(index) {
      this.data_giochieu.splice(index, 1);
    },
  },
  mounted: function() {
    this.options = this.dsphim;
    this.value = this.phimmoi;
    this.ngaychieus = this.dsngay;
    this.thanhcong();
    //sự kiện khi load trang
  }
};
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

