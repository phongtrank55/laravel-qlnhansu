<?php

namespace Modules\NhanVien\Entities;

use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
	protected $table = 'nhanvien';

    protected $fillable = ['Username', 'Password', 'TokenResetPassword', 'IsActive', 'MaNhanVien', 'Ho', 'Ten', 'NgaySinh', 'DiaChi', 'GioiTinh', 'ChucVuID', 'PhongBanID', 'SoDienThoai', 'Avatar', 'QuocTich', 'TonGiao', 'DanToc', 'Email', 'DaNghiViec'];
    protected $hidden =['Password', 'TokenResetPassword'];
    
    public function PhongBan()
    {
        // Khóa ngoại phân biệt hoa thường như trong db
    	return $this->belongsTo('Modules\PhongBan\Entities\PhongBan', 'PhongBanId');
    }
    public function ChucVu()
    {
    	return $this->belongsTo('Modules\ChucVu\Entities\ChucVu', 'chucVuId');
    }
    public function QuaTrinhCongTacs()
    {
        return $this->hasMany('Modules\QuaTrinhCongTac\Entities\QuaTrinhCongTac');
    }

    public static function UpdateDepartment($id){
        $nv = self::findOrFail($id);
        // return $nv;
        // User::where('votes', '>', 100)->update(['status' => 2]);
        $maxStartDate = \Illuminate\Support\Facades\DB::table('quatrinhcongtac')->where('nhanvienid', $id)->max('ngaybatdau');
        // return $maxStartDate;
        if($maxStartDate){
            $ct = \Illuminate\Support\Facades\DB::table('quatrinhcongtac')->select('phongbanid', 'chucvuid')->where([['nhanvienid', $id], ['ngaybatdau', $maxStartDate]])->first();
            // foreach ($cts as $ct) {
                // $cts = $ct; break;
            // }
            // $ct = reset($ct);
            // print_r($ct); die;
            if($ct){
                $nv->PhongBanId = $ct->phongbanid;
                $nv->chucVuId = $ct->chucvuid;
                $nv->update();
                // return $nv;
            }
            
        }
        // return 'error';
    }
}
