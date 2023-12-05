<?php

class TaiKhoanController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function xuLyDangKy($tenTaiKhoan, $matKhau, $tenKhachHang, $sdt, $thanhPho, $quan, $phuong, $duong) {
        // Check if the username or phone number already exists
        if ($this->model->kiemTraTenTaiKhoanTonTai($tenTaiKhoan)) {
            echo "Tên tài khoản đã tồn tại. Chọn tên khác.";
            return;
        }

        if ($this->model->kiemTraSoDienThoaiTonTai($sdt)) {
            echo "Số điện thoại đã được đăng ký. Sử dụng số khác.";
            return;
        }

        // Continue with the registration
        $this->model->dangKyTaiKhoan($tenTaiKhoan, $matKhau, $tenKhachHang, $sdt, '', '', '', $thanhPho, $quan, $phuong, $duong);
    }
}

?>

