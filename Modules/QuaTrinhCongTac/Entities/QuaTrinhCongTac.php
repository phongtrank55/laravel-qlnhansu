<?php

namespace Modules\QuaTrinhCongTac\Entities;

use Illuminate\Database\Eloquent\Model;

class QuaTrinhCongTac extends Model
{
	protected $table = 'quatrinhcongtac';

    protected $fillable = ['NhanVienId', 'HinhThucDoiId', 'ChucVuId', 'PhongBanId', 'NgayBatDau', 'NgayKetThuc', 'SoQuyetDinh', 'NgayKyQuyetDinh', 'FileDinhKem', 'GhiChu'];
    
    public function PhongBan()
    {
        // Khóa ngoại phân biệt hoa thường như trong db
    	return $this->belongsTo('Modules\PhongBan\Entities\PhongBan', 'phongBanId');
    }
    public function ChucVu()
    {
        return $this->belongsTo('Modules\ChucVu\Entities\ChucVu', 'chucVuId');
    }
    public function HinhThucDoi()
    {
        return $this->belongsTo('Modules\HinhThucDoi\Entities\HinhThucDoi', 'hinhThucDoiId');
    }
    public function NhanVien()
    {
        return $this->belongsTo('Modules\NhanVien\Entities\NhanVien', 'nhanVienId');
    }
}
