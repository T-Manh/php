<?php
class API_Sinhvien extends Controller{
   public function DanhSach(){
       //model
       $sinhvien = $this->model("SinhVienModel");
        $sv = $sinhvien->SinhVien();
        $mang = [];

        while($s = mysqli_fetch_array($sv)){
            array_push($mang, new SinhVien(
                $s["ID"],
                $s["HOTEN"],
                $s["NAMSINH"]));
        }
        echo json_encode($mang);
   }
}
class SinhVien{
    public $ID;
    public $HOTEN;
    public $NAMSINH;

    public function __contruct($id, $hoten, $namsinh){
        $this->ID = $id;
        $this->HoTEN = $hoten;
        $this->NAMSINH = $namsinh;
    }
}
?>