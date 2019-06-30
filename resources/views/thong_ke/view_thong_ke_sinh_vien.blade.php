@extends('layer.master')
@push('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
	<div id="main_content">	
		<div id="thong_ke_sinh_vien" >
			<div><h2>Thống kê sinh viên chưa đăng ký sách</h2></div>
			<form>
				<table>
					<tr>
						<td>
							<div style="margin-right: 3rem ">Tên lớp
								<select name="ma_lop" class="form-control" style="width: 14rem" id="search_lop">
									<option selected disabled>--Tên lớp--</option>
									@foreach ($array_lop as $lop)
										<option value="{{$lop->ma_lop}}">
											{{$lop->ten_lop}}
										</option>
									@endforeach
								</select>
							</div>
						</td>
						<td>
							<div style="margin-right: 3rem ">Tên sách
								<select name="ma_sach" class="form-control" style="width: 14rem" id="searchSach" disabled>
									<option selected disabled="">--Tên sách--</option>
								</select>
							</div>
						</td>
						<td valign="bottom">
							<input type="submit" value="Xem" id="button">
						</td>
					</tr>
				</table>
			</form><br>
			<table class="table table-striped">
				<tr>
					<th>Mã</th>
					<th>Tên sinh viên</th>
					<th>Lớp</th>
				</tr>
				@if (isset($array_thong_ke_sinh_vien))
					@foreach ($array_thong_ke_sinh_vien as $thong_ke)
						<tr>
							<td>{{$thong_ke->ma_sinh_vien}}</td>
							<td>{{$thong_ke->ten_sinh_vien}}</td>
							<td>{{$thong_ke->ten_lop}}</td>
						</tr>
					@endforeach
				@endif
			</table>
		</div>
	</div>

@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#search_lop").select2();
		$("#search_lop").change(function(){
			$("#searchSach").val(null).trigger('change');
			$("#searchSach").attr("disabled", false);
		})
		$("#searchSach").select2({
			ajax: {
				url: '{{route('get_sach_by_lop')}}',
				dataType: 'json',
				data: function() {
					ma_lop = $("#search_lop").val();
					return {
						ma_lop: ma_lop
					}
				},
				processResults: function (data){
					return {
						results: $.map(data, function(item) {
							return  {
								text: item.ten_sach,
								id: item.ma_sach
							}
						})
					};
				}
			}
		});		
	});
</script>
@endpush