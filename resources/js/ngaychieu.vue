<template>
  <div enctype="multipart/form-data" id="khung">
    <p class="tieude">CẬP NHẬT PHIM</p>
    <div class="row">
      <label class="col-sm-3 label">Tên phim</label>
      <input type="text" v-model="ten_phim" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Hình ảnh</label>

      <i class="fa fa-paperclip"></i>
      <p style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">Chọn hình ảnh</p>
      <input
        class="col-sm-6"
        type="file"
        id="file"
        ref="file"
        style="font-family: 'Times New Roman', Times, serif; font-size: 16px;"
      >
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Thể loại</label>
      <input type="text" v-model="the_loai" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Hãng</label>
      <input type="text" v-model="hang" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Quốc gia</label>
      <input type="text" v-model="quoc_gia" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Thời Lượng</label>
      <input type="text" v-model="thoi_luong" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Ngôn Ngữ</label>
      <input type="text" v-model="ngon_ngu" class="col-sm-6">
    </div>
    <br>
    <div class="row">
      <label class="col-sm-3 label">Ngày Chiếu</label>
      <input type="date" v-model="nhapngay" class="col-sm-6">
      <button
        @click="truyen"
        class="btn btn-danger col-sm-2"
        style="font-family: 'Times New Roman', Times, serif; font-size: 18px;"
      >Nhập Ngày</button>

      <table
        class="table table-bordered table-striped dataTable"
        role="grid"
        style="margin-top: 20px;"
      >
        <thead>
          <tr role="row">
            <th>Danh Sách ngày chiếu</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(ngaychieu,index) in ngaychieus">
            <td>{{ngaychieu}}</td>
            <td>
              <a class="btn btn-light" @click="xoangay(index)">
                <i class="fas fa-trash"></i>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div style="text-align: center">
      <button
        @click="luu"
        class="btn btn-success"
        style="font-family: 'Times New Roman', Times, serif; font-size: 18px;"
      >
        Tiếp Theo
        <i class="fas fa-arrow-alt-circle-right"></i>
      </button>
    </div>
    <br>
    <br>
    <!-- <button type="submit" id="onsubmit" > Tiếp </button> -->
  </div>
</template>


<script>
export default {
  // components:{},
  // props:[//*truyenbien*//],
  data: function() {
    return {
      nhapngay: null,
      ngaychieus: [],
      ten_phim: null,
      the_loai: null,
      hang: null,
      quoc_gia: null,
      thoi_luong: null,
      ngon_ngu: null,
      image: ""
    };
  },
  methods: {
    truyen: function() {
      var temp = 0;
      if (this.nhapngay != null && this.nhapngay != "") {
        this.ngaychieus.forEach(element => {
          if (element != this.nhapngay) {
            temp++;
            if (temp == this.ngaychieus.length) {
              this.ngaychieus.push(this.nhapngay);
            }
          }
        });
        if (this.ngaychieus.length == 0) {
          this.ngaychieus.push(this.nhapngay);
        }
      }
    },
    luu: function() {
      console.log(this.ngaychieus);
      if (this.ten_phim == null || this.ten_phim == "") {
        alert("Chưa nhập tên phim");
      } else {
        if (this.ngaychieus.length == 0) {
          alert("Chưa nhập ngày chiếu");
        } else {
          axios
            .post("/addphim", {
              ngaychieus: this.ngaychieus,
              phim: {
                ten_phim: this.ten_phim,
                the_loai: this.the_loai,
                hang: this.hang,
                quoc_gia: this.quoc_gia,
                thoi_luong: this.thoi_luong,
                ngon_ngu: this.ngon_ngu
              }
            })
            .then(response => {
              let formData = new FormData();
              formData.append("file", this.$refs.file.files[0]);
              axios
                .post("/addanh/" + response.data.result.id, formData, {
                  headers: {
                    "Content-Type": "multipart/form-data"
                  }
                })
                .then(eee => {
                  window.location.href = "/addgio/" + eee.data.result.id;
                });
            });
        }
      }
    },
    xoangay: function(index) {
      this.ngaychieus.splice(index, 1);
    }
  }
};
</script>
