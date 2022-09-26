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
        return 
        "
        ----Thông tin vận động viên----<br>
        Tên: $this->ten <br> 
        Tuổi: $this->tuoi <br> 
        Giới tính: $this->gioiTinh <br> 
        Ngày sinh: $this->ngaySinh <br> 
        Cân nặng: $this->canNang kg <br> 
        Chiều cao: $this->chieuCao m<br> 
        Số huy chương: $this->soHuyChuong <br>";
        echo "Các môn đã thi đấu: ";
        foreach ($this->cacMonDaThiDau as $cacMonDaThiDau => $value) {
            echo " <br> - $value";
       }

    }
    public function kiemTraCanNangChieuCao($monThiDau, $soHuyChuongSauKiemTra){
        if($kiemTraCanNang = $this->canNang < $monThiDau->dieuKienCanNang||$kiemTraChieuCao = $this->chieuCao < $monThiDau->dieuKienChieuCao){
            echo "<br>Không thỏa mãn điều kiện về chiều cao và cân nặng<br>";
            $this->soHuyChuong -= $soHuyChuongSauKiemTra;
        }else{
            return "<br>Thỏa mãn điều kiện về chiều cao và cân nặng<br><br>";
        }
        return "Số huy chương còn lại sau kiểm tra: $this->soHuyChuong";
    }
}
$cauThu_DVL = new VanDongVien("Đặng Văn Lâm",29,"Nam","8.13.1993",76,1.88,8,['Bóng đá','Thủ môn','AFC Cup']);
$monThiDau = new MonThiDau('Bóng đá',1.65,60);
echo $cauThu_DVL->hienThiThongTin();
echo $cauThu_DVL->kiemTraCanNangChieuCao($monThiDau, 8);

$cauThu_NVA = new VanDongVien("Nguyễn Văn A",26,"Nam","5.2.1996",56,1.5,8,['Bóng đá']);
echo $cauThu_NVA->hienThiThongTin();
echo $cauThu_NVA->kiemTraCanNangChieuCao($monThiDau, 5);
class MonThiDau {
    public $tenMTD,$dieuKienChieuCao,$dieuKienCanNang;
    public function __construct($tenMTD,$dieuKienChieuCao,$dieuKienCanNang)
     {
          $this->tenMTD = $tenMTD;
          $this->dieuKienChieuCao = $dieuKienChieuCao;
          $this->dieuKienCanNang = $dieuKienCanNang;
     }
}

?>