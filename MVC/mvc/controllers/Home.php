<?php
class Home extends Controller{
    function List(){
        //model
        $manh = $this->model("SinhVienModel");
        //view
        $this->view("giaodien1", ["Page"=>"list", "SV" =>$manh->SinhVien()]);
    }
    function Detail($id){
        //model
        $manh = $this->model("SinhVienModel");
        //view
        $this->view("giaodien1", ["Page"=>"detail",
        "SV" => $manh->SinhVien()
    ]);
    }
}
?>