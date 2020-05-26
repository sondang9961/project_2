<div class="sidebar" data-color="black" data-image="../assets/img/full-screen-image-3.jpg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <img src="{{asset('img/logo_bkacad.png')}}" class="simple-text logo-mini" width="94%">
    </div>

	<div class="sidebar-wrapper">
        <div class="user">
			<div class="info">	

				<a data-toggle="collapse" href="#collapseExample" class="collapsed">
					<span>
						Welcome: {{Session::get('ten_giao_vu')}}
                        <b class="caret"></b>
					</span>
                </a>

				<div class="collapse" id="collapseExample">
					<ul class="nav">
						<li>
							<a href="{{route('profile',['ma_giao_vu' => Session::get('ma_giao_vu')])}}">
								<span class="sidebar-normal">Thông tin cá nhân</span>
							</a>
						</li>
						<li>
							<a href="{{route('view_doi_mat_khau',['ma_giao_vu' => Session::get('ma_giao_vu')])}}">
								<span class="sidebar-normal">Đổi mật khẩu</span>
							</a>
						</li>
					</ul>
                </div>
			</div>
        </div>

		<ul class="nav">
			
			<li>
				<a href="{{route('khoa_hoc.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý khóa học</p>
				</a>
			</li>
			<li>
				<a href="{{route('mon_hoc.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý môn học</p>
				</a>
			</li>
			<li>
				<a href="{{route('sach.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý sách</p>
				</a>
			</li>
			<li>
				<a href="{{route('lop.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý lớp</p>
				</a>
			</li>
			<li>
				<a href="{{route('sinh_vien.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý sinh viên</p>
				</a>
			</li>
			<li>
				<a href="{{route('dang_ky_sach.view_all')}}">
					<i class="pe-7s-graph"></i>
					<p>Quản lý đăng ký sách</p>
				</a>
			</li>
			<li>
				<a href="{{route('thong_ke.view_thong_ke_sach')}}">
					<i class="pe-7s-graph"></i>
					<p>Thống kê sách</p>
				</a>
			</li>
			<li>
				<a href="{{route('thong_ke.view_thong_ke_sinh_vien')}}">
					<i class="pe-7s-graph"></i>
					<p>Thống kê sinh viên</p>
				</a>
			</li>
		</ul>
	</div>
</div>