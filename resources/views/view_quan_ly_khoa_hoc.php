<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<style type="text/css">
	#right_content { width: 50%; margin-left: 160px;}
	#textbox {border-radius: 8px ; width: 200px}
	#button {color: white; background-color: #484646; width: 90px; height: 30px; border-radius: 40px}
</style>
</head>
<body style="background: url(../Images/background_2.jpg); height: 100%;background-repeat: no-repeat;">
	<center><h1>Quản lý khóa học</h1></center>
	<table width="100%">
		<tr valign="top">
			<td>
				<div id="left_content">
					<div><h2>Danh sách khóa học</h2></div>
					<table border="1">
						<tr>
							<th>Mã</th>
							<th>Tên khóa học</th>
							<th>Chức năng</th>
						</tr>
					</table>
				</div>
			</td>
			<td>
				<div id="right_content" >
					<div><h2>Thêm khóa học</h2></div>
						<div>
							<form>
								<div>Tên khóa học</div>	
								<div><input type="text" name="ten_khoa_hoc" id="textbox"></div><br>
								<div><input type="button" value="Thêm" id="button"></div>
							</form>
						</div>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>