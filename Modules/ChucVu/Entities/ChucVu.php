<?php

namespace Modules\ChucVu\Entities;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
	protected $table = 'chucvu';

    public $timestamps = false;
    
    protected $fillable = ['MaCV', 'TenCV', 'TenVietTat'];

    public function NhanViens()
    {
        return $this->hasMany('Modules\NhanVien\Entities\NhanVien');
    }
    public function QuaTrinhCongTacs()
    {
        return $this->hasMany('Modules\QuaTrinhCongTac\Entities\QuaTrinhCongTac');
    }
}
