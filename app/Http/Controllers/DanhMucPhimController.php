<?php

namespace App\Http\Controllers;
use App\Phim;
use App\NgayChieu;
use App\GioChieu;
use App\PhongChieu;
use App\DanhMucPhong;
use Illuminate\Http\Request;

class DanhMucPhimController extends Controller
{
    public function ShowFormAddPhim(){
		return view('Phim.Add');
    }
    public function AddPhim(Request $request){          // Hàm có chức năng thêm phim và ngày vào cơ sở dữ liệu
    $phim = $request->get('phim');
    $luuphim=Phim::query()->create($phim);  
      $ngaychieu=$request->get('ngaychieus');
      foreach($ngaychieu as $item){
        NgayChieu:: query()->create([
          'phim_id'=>$luuphim->id,
          'ngay_chieu'=>$item,
        ]);
      };
      return response()->json([
        'message'=>"success",
        'result'=>$luuphim,
      ],200,[]);
    }

    public function addAnh(Request $request,$id){ // Hàm update đường dẫn ảnh vào csdl bảng phims
      $info = $request->all();
      $file = $info['file'];
      $phim = Phim::query()->findOrFail($id);
      if (!empty($file)) {
          $file_id = time();
          $fileName = $file_id . '-' . $file->getClientOriginalName();
          $file->storeAs('public/upload/', $fileName);
      }
      $phim->update([
        'anh_dai_dien'=>'storage/upload/' . $fileName
      ]);
      return response()->json([
        'message'=>"success",
        'result'=>$phim,
      ],200,[]);
    }

    public function ShowFormAddGio($id){   // Hàm có chức năng lấy ra toàn bộ phim và phim mới nhập truyền sang bản nhập giờ
      $data=Phim::query()->where('id',$id)->first();
      $ngay=NgayChieu::query()->where('phim_id',$id)->get();
      $phims=Phim::query()->get();
        return view('Gio.add', [
          'listphim'=>$phims,
          'phimmoi'=>$data,
          'listngay'=>$ngay,
          ]);
    }
    public function getNgay($id){           // Hàm có chức năng lấy ra danh sách ngày chiếu của phim
      $ngay=NgayChieu::query()->where('phim_id',$id)->get();
      return response()->json([
        'message'=>"success",
        'result'=>$ngay,
      ],200,[]);
    }
    public function Addgio(Request $request){    // Hàm có chức năng đẩy giờ chiếu và id ngày chiếu lên bảng cơ sở dữ liệu GioChieu
      $giochieus =  $request->get('gio_chieu');
      foreach($giochieus as $item){
        $phim=NgayChieu::query()->where('id',$item['ngay_id'])->first();
        foreach($item['gio'] as $gio){
           GioChieu::query()->create([
            'ngay_chieu_id'=>$item['ngay_id'],
            'gio_chieu'=>$gio
          ]);
        }
      };
      return response()->json([
        'message'=>"success",
        'result'=>$phim,
      ],200,[]);
    }
    public function ShowFormAddPhong($id){
      $data =  Phim:: query()->where('id', $id)->first();
      $ngays= NgayChieu::query()->where('phim_id',$id)->get();
      $phims= Phim:: query()->get();
      $phongs= DanhMucPhong:: query()->get();
      return view('Phong.add', [
        'phimmoi'=>$data,
        'listphim'=>$phims,
        'listphong'=>$phongs,
        'listngay'=>$ngays
      ]);
    }
    public function getGio($id){
      $gios=GioChieu::query()->where('ngay_chieu_id',$id)->get();
      return response()->json([
        'message'=>"success",
        'result'=>$gios,
      ],200,[]);
    }
    public function AddPhong(Request $request){
      $phongchieu = $request->get('phong_chieu');
      foreach($phongchieu as $item){
          foreach($item['phong'] as $id){
            PhongChieu:: query()->create([
              'gio_chieu_id'=>$item['gio_id'],
              'phong_chieu_id'=>$id['id']
            ]);
          }
      }
    }
    public function showPhim(Request $request){
      $dsphim = Phim::query()->get();
      return view('LuaChon.phim', ['dsphim'=>$dsphim]);
    }
}
