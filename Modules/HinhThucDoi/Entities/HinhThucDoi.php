<?php

namespace Modules\HinhThucDoi\Entities;

use Illuminate\Database\Eloquent\Model;

class HinhThucDoi extends Model
{
	protected $table = 'hinhthucdoi';

    public $timestamps = false;
    
    protected $fillable = ['TenHinhThuc', 'GhiChu'];

    public function QuaTrinhCongTacs()
    {
        return $this->hasMany('Modules\QuaTrinhCongTac\Entities\QuaTrinhCongTac');
    }
}
