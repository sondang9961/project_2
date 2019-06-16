@extends('layer.master')
@section('content')
<center><h1>Quản lý sách</h1></center>
	<div id="main_content">
		<div id="left_content">
			<div><h2>Danh sách các đầu sách</h2></div>
			<table class="table table-striped">
				<tr>
					<th>Mã</th>
					<th>Tên sách</th>
					<th>Tên môn</th>
					<th>Số lượng nhập</th>
					<th>Ngày nhập sách</th>
					<th>Ngày hết hạn đăng ký</th>
					<th>Chức năng</th>
				</tr>
				@foreach ($array_sach as $sach)
				<tr>
					<td></td>
				</tr>
				@endforeach
			</table>
		</div>
		<div id="right_content" >
			<div><h2>Thêm sách</h2></div>
				<div>
					<form action="{{route('sach.process_insert')}}" method="post">
						{{csrf_field()}}
						<div>Tên khóa học</div>
						<div>
							<select name="ma_khoa_hoc">
								<option>--Khóa học--</option>
								@foreach ($array_khoa_hoc as $khoa_hoc)
									<option value="{{$khoa_hoc->ma_khoa_hoc}}">
										{{$khoa_hoc->ten_khoa_hoc}}
									</option>
								@endforeach
							</select>
						</div><br>
						<div>Tên môn</div>
						<div>
							<select name="ma_mon_hoc">
								<option>--Môn học--</option>
								@foreach ($array_mon_hoc as $mon_hoc)
									<option value="{{$mon_hoc->ma_mon_hoc}}">
										{{$mon_hoc->ten_mon_hoc}}
									</option>
								@endforeach
							</select>
						</div><br>
						<div>Tên sách</div>	
						<div><input type="text" name="ten_sach" id="textbox"></div><br>	
						<div>Số lượng</div>	
						<div><input type="number" name="so_luong_nhap" id="textbox"></div><br>	
						<div><input type="button" value="Thêm" id="button"></div>
					</form>
				</div>
		</div>
	</div>
@endsection