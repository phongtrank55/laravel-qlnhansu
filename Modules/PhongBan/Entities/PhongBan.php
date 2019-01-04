<?php

namespace Modules\PhongBan\Entities;

use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
	protected $table = 'phongban';

    protected $fillable = ['MaPhong', 'TenPhong', 'TenVietTat', 'SoDienThoai'];

    public function NhanViens()
    {
        return $this->hasMany('Modules\NhanVien\Entities\NhanVien');
    }
        public function QuaTrinhCongTacs()
    {
        return $this->hasMany('Modules\QuaTrinhCongTac\Entities\QuaTrinhCongTac');
    }
}
