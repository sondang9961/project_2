<?php
namespace App\Http\Controllers;

use Request;
use App\Model\ThongKe;
use App\Model\Lop;
use App\Model\Sach;
use App\Model\MonHoc;

class ThongKeController extends Controller
{
	private $folder = 'thong_ke';

	public function view_thong_ke_sinh_vien()
	{
		$lop = new Lop();
		$array_lop = $lop->get_all_lop();

		$sach = new Sach();
		$array_sach = $sach->get_all();

		$thong_ke = new ThongKe();
		$thong_ke->ma_lop = Request::get('ma_lop');
		$thong_ke->ma_sach = Request::get('ma_sach');
		$array_thong_ke_sinh_vien = $thong_ke->thong_ke_sinh_vien();
		// return $array_thong_ke;
		return view("$this->folder.view_thong_ke_sinh_vien",[
			'array_thong_ke_sinh_vien' => $array_thong_ke_sinh_vien,
			'array_lop' => $array_lop,
			'array_sach' => $array_sach,
		]);
	}

	public function view_thong_ke_sach()
	{
		$trang = Request::get('trang');

		if(empty($trang)){
			$trang = 1;
		}
		
		$limit = 5;

		$sach = new Sach();
		$array_sach = $sach->get_all();

		$mon_hoc = new MonHoc();
		$array_mon_hoc= $mon_hoc->get_all();

		$thong_ke = new ThongKe();
		$thong_ke->offset = ($trang - 1)*$limit;
		$thong_ke->limit = $limit;
		$ma_mon_hoc = Request::get('ma_mon_hoc');
		$ngay_nhap_sach = Request::get('ngay_nhap_sach');
		$thong_ke->ma_mon_hoc = $ma_mon_hoc;
		$thong_ke->ngay_nhap_sach = $ngay_nhap_sach;
		$array_thong_ke_sach = $thong_ke->thong_ke_sach();

		$count_trang = ceil($thong_ke->count_sach());
		// return $array_thong_ke;
		return view("$this->folder.view_thong_ke_sach",[
			'array_thong_ke_sach' => $array_thong_ke_sach,
			'array_sach' => $array_sach,
			'array_mon_hoc' => $array_mon_hoc,
			'count_trang' => $count_trang,
			'ngay_nhap_sach' => $ngay_nhap_sach,
			'ma_mon_hoc' => $ma_mon_hoc,
			'trang' => $trang,
			'thong_ke' => $thong_ke
		]);
	}

}