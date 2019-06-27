<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class KhoaHoc extends Model
{
	public $table = 'khoa_hoc';
	public function get_all()
	{
		$array_khoa_hoc= DB::select ("select * from $this->table order by ma_khoa_hoc desc");
		return $array_khoa_hoc;
	}

	public function insert()
	{
		DB::insert("insert into $this->table(ten_khoa_hoc) values (?)", [$this->ten_khoa_hoc]);
	}

	public function get_one()
	{
		$array_khoa_hoc= DB::select ("select * from $this->table where ma_khoa_hoc = ? limit 1", [$this->ma_khoa_hoc]);
		return $array_khoa_hoc[0];
	}

	public function updateKhoaHoc()
	{
		DB::update("update $this->table set ten_khoa_hoc = ? where ma_khoa_hoc = ?",[$this->ten_khoa_hoc, $this->ma_khoa_hoc]);
	}
	
}