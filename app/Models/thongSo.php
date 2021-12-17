<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thongSo extends Model
{
    use HasFactory;

    protected $table = 'thongsokithuat';
    protected $fillable = ['id', 'id_product','dai_rong_cao','dongCo',
    'chieuDaiCS','khoangSangGam','dungTichNL',
    'mucTieuThuNL','congSuatMax','moMemXoan','hopSo','danDong','content'];
    
}
