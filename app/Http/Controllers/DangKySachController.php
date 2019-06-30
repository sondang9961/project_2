<?php
namespace App\Http\Controllers;

use Request;
use App\Helper;
use App\Model\DangKySach;
use App\Model\KhoaHoc;

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// Ignores notices and reports all other kinds... and warnings
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}
class DangKySachController extends Controller
{
	private $folder = 'dang_ky_sach';
	public function view_all()
	{
		$trang = Request::get('trang');

		if(empty($trang)){
			$trang=1;
		}

		$limit = 5;
		$dang_ky_sach = new DangKySach();
		$dang_ky_sach->offset = ($trang - 1)*$limit;
		$dang_ky_sach->limit = $limit;
		$dang_ky_sach->ma_khoa_hoc = Request::get('ma_khoa_hoc');
		$dang_ky_sach->ma_lop = Request::get('ma_lop');
		$dang_ky_sach->ma_mon_hoc = Request::get('ma_mon_hoc');
		$dang_ky_sach->ma_sach = Request::get('ma_sach');
		$array_dang_ky_sach = $dang_ky_sach->get_all();

		$count_trang = ceil($dang_ky_sach->count());

		$khoa_hoc = new KhoaHoc();
		$array_khoa_hoc = $khoa_hoc->get_all();
		return view ("$this->folder.view_all", [
			'array_dang_ky_sach' => $array_dang_ky_sach,
			'array_khoa_hoc' => $array_khoa_hoc,
			'count_trang' => $count_trang,
			'ma_khoa_hoc' => $ma_khoa_hoc,
			'trang' => $trang,
			'dang_ky_sach' => $dang_ky_sach
		]);
	}

	public function process_insert()
	{
		$dang_ky_sach = new DangKySach();
		$dang_ky_sach->ma_sinh_vien = Request::get('ma_sinh_vien');
		$dang_ky_sach->ma_sach = Request::get('ma_sach');
		$dang_ky_sach->ngay_dang_ky = date("Y-m-d");	
		$dang_ky_sach->tinh_trang_nhan_sach = Request::get('tinh_trang_nhan_sach');
		if (Request::get('tinh_trang_nhan_sach') == 1) {
			$dang_ky_sach->ngay_nhan_sach = date("Y-m-d");
		}
		$array_dang_ky_sach = $dang_ky_sach->check_insert();
		if(count($array_dang_ky_sach) == 0){
			$dang_ky_sach->insert();
			return redirect()->route("$this->folder.view_all")->with('success', 'Đã thêm');
		}
		if(count($array_dang_ky_sach) == 1){
			return redirect()->route("$this->folder.view_all")->with('error', 'Sinh viên đã đăng ký rồi!');
		}
			
	}

	public function change_tinh_trang_dang_ky_sach()
	{
		$ma_dang_ky = Request::get('ma_dang_ky');
		$tinh_trang_nhan_sach = Request::get('tinh_trang_nhan_sach');

		switch ($tinh_trang_nhan_sach) {
			case 0:
				$dang_ky_sach = new DangKySach();
				$dang_ky_sach->ma_dang_ky = $ma_dang_ky;
				$dang_ky_sach->tinh_trang_nhan_sach = $tinh_trang_nhan_sach;
				$dang_ky_sach->ngay_nhan_sach = null;
				$dang_ky_sach->updateTinhTrang();
				break;
			case 1:
				$dang_ky_sach = new DangKySach();
				$dang_ky_sach->ma_dang_ky = $ma_dang_ky;
				$dang_ky_sach->tinh_trang_nhan_sach = $tinh_trang_nhan_sach;
				$dang_ky_sach->ngay_nhan_sach = date('Y-m-d');
				$dang_ky_sach->updateTinhTrang();
				break;
		}
		
	}
}
?>