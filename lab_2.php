<?php
    interface PhepTinh {
        function cong();
        function tru();
        function nhan();
        function chia();
    }
    class TinhToan implements PhepTinh {
        public $a,$b;
        function __construct($a,$b){
            $this->a= $a;
            $this->b= $b;
        }
        function cong(){
            return $this->a+$this->b;
        }
        function tru(){
            return $this->a-$this->b;
        }
        function nhan(){
            return $this->a*$this->b;
        }
        function chia(){
            return $this->a/$this->b;
        }
    }
    $KTPT = new TinhToan(3,8);
    echo "Bài 1: <br>";
    echo "Phép cộng: ".$KTPT->cong()."<br>";
    echo "Phép trừ: ".$KTPT->tru()."<br>";
    echo "Phép nhân: ".$KTPT->nhan()."<br>";
    echo "Phép chia: ".$KTPT->chia()."<br>";
?>
<?php
echo"<br>Bài 2:<br>";
abstract class ConNguoi {
    public $ten,$tuoi,$gioiTinh,$ngaySinh,$canNang,$chieuCao;
    abstract function hienThiThongTin();
}

class VanDongVien extends ConNguoi {
    public $soHuyChuong;
    public $cacMonDaThiDau = [];
    function __construct($ten,$tuoi,$gioiTinh,$ngaySinh,$canNang,$chieuCao,$soHuyChuong,$cacMonDaThiDau)
    {
        $this->ten = $ten;
        $this->tuoi = $tuoi;
        $this->gioiTinh = $gioiTinh;
        $this->ngaySinh = $ngaySinh;
        $this->canNang = $canNang;
        $this->chieuCao = $chieuCao;
        $this->soHuyChuong = $soHuyChuong;
        array_push($this->cacMonDaThiDau, ...$cacMonDaThiDau);
    }
    
    function hienThiThongTin()
    {
        echo "Tên: $this->ten <br>";
        echo "Tuổi: $this->tuoi <br>"; 
        echo "Giới tính: $this->gioiTinh <br> ";
        echo "Ngày sinh: $this->ngaySinh <br> ";
        echo "Cân nặng: $this->canNang kg <br>";
        echo "Chiều cao: $this->chieuCao m<br>";
        echo "Số huy chương: $this->soHuyChuong <br>";
        echo "Các môn đã thi đấu: ";
        foreach ($this->cacMonDaThiDau as $cacMonDaThiDau => $value) {
            echo " <br> - $value";
       }

    }
    public function kiemTraCanNangChieuCao($monThiDau, $soHuyChuongSauKiemTra){
        if($kiemTraCanNang = $this->canNang < $monThiDau->dieuKienCanNang){
            false;
        }else{
            true;
        }
        if($kiemTraChieuCao = $this->chieuCao < $monThiDau->dieuKienChieuCao){
            false;
        }else{
            true;
        }
        
        if ($kiemTraChieuCao && $kiemTraCanNang) {
            $this->soHuyChuongSauKiemTra += $soHuyChuongSauKiemTra;
            array_push($this->cacMonDaThiDau, $monThiDau->tenMTD);

            return "<br>Thỏa mãn điều kiện về chiều cao và cân nặng<br>";
        }
        
        $this->soHuyChuong -= $soHuyChuongSauKiemTra;
        return "<br>Không thỏa mãn điều kiện về chiều cao và cân nặng<br>";
    }
}
$cauThu_DVL = new VanDongVien("Đặng Văn Lâm",29,"Nam","8.13.1993",76,1.88,8,['Bóng đá','Thủ môn','AFC Cup']);
$monThiDau = new MonThiDau('Bóng đá',1.65,60);
echo $cauThu_DVL->hienThiThongTin();
echo $cauThu_DVL->kiemTraCanNangChieuCao($monThiDau, 8);
class MonThiDau {
    public $ten,$dieuKienChieuCao,$dieuKienCanNang;
    public function __construct($tenMTD,$dieuKienChieuCao,$dieuKienCanNang)
     {
          $this->tenMTD = $tenMTD;
          $this->dieuKienChieuCao = $dieuKienChieuCao;
          $this->dieuKienCanNang = $dieuKienCanNang;
     }
}

?>