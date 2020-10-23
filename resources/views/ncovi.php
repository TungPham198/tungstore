<!DOCTYPE html>
<html>
<head>
	<title>Virus Ncovid</title>
	<!-- <script src="jquery-3.4.1.js"></script> -->
	<script
		src="https://code.jquery.com/jquery-3.4.1.js"
		integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$.ajax({
				url: 'https://ncovi.huynhhieu.com/api.php?code=external',
				type: 'GET',
				dataType: 'json',
			})
			.done(function(datas) {
				console.log(datas);
				var time = datas.updated+"";
				var tg = "Tình hình dịch bệnh cập nhật vào ngày: "+time.slice(6, 8)+"/"+time.slice(4, 6)+"/"+time.slice(0,4)+"-"+time.slice(8, 10)+":"+time.slice(10, 12)+":"+time.slice(12, 14);
				$('#time').html(tg);
				var ncovids = datas.data;
				ncovids.sort(function (a, b) {
					return a.cases.replace(',','') - b.cases.replace(',','');
				});
				ncovids.reverse();
				console.log(ncovids);
				var table = '<tr><th>STT</th><th>Quốc gia</th><th>Số ca nhiễm</th><th>Ca tử vong</th><th>Ca hồi phục</th></tr>';
				var tg_cases=0;
				var tg_deaths=0;
				var tg_recovered=0;
				var vn_cases=0;
				var vn_deaths=0;
				var vn_recovered=0;
				$.each(ncovids,function(index, value) {
					table+='<tr><td>'+(index+1)+'</td>';
					table+='<td>'+value.country+'</td>';
					table+='<td>'+value.cases+'</td>';
					table+='<td>'+value.deaths+'</td>';
					table+='<td>'+value.recovered+'</td></tr>';
					tg_cases+=Number(value.cases.replace(',',''));tg_deaths+=Number(value.deaths.replace(',',''));tg_recovered+=Number(value.recovered.replace(',',''));
					if(value.country=='Vietnam'){
						$('#vn_cases').html(value.cases);
						$('#vn_deaths').html(value.deaths);
						$('#vn_recovered').html(value.recovered);
						vn_cases=value.cases;
						vn_deaths=value.deaths;
						vn_recovered=value.recovered;
					}
					// console.log(value.country);
				});
				$('#tg_cases').html(tg_cases);
				$('#tg_deaths').html(tg_deaths);
				$('#tg_recovered').html(tg_recovered);
				$('#table').html(table);
				alert("Số ca nhiễn tại việt nam: "+vn_cases+
				"\nSố ca tử vong: "+vn_deaths+
				"\nSố ca hồi phục: "+vn_recovered);
				alert("Số ca nhiễn trên thế giới: "+tg_cases+
				"\nSố ca tử vong: "+tg_deaths+
				"\nSố ca hồi phục: "+tg_recovered);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				console.log("complete");
			});

			
		});
	</script>
	<style type="text/css">
		th{
			background: #adb1bb;
			position: sticky;
			top: 0px;
		}
	</style>
</head>
<body style="padding:5%;font-family: Tahoma;">
	<h3 id="time" class="text-center"></h3>
	<div class="row">
		<table class="col-sm-6 text-center table table-bordered table-hover" style="margin-right: 2%;" >
			<tr>
				<th colspan="2">Việt nam</th>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca nhiễm</td>
				<td id="vn_cases">0</td>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca tử vong</td>
				<td id="vn_deaths">0</td>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca khỏi bệnh</td>
				<td id="vn_recovered">0</td>
			</tr>
		</table>
		<table class="col text-center table table-bordered table-hover" style="margin-left: 2%;">
			<tr>
				<th colspan="2">Thế giới</th>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca nhiễm</td>
				<td id="tg_cases">0</td>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca tử vong</td>
				<td id="tg_deaths">0</td>
			</tr>
			<tr>
				<td style="width: 50%;">Số ca khỏi bệnh</td>
				<td id="tg_recovered">0</td>
			</tr>
		</table>
	</div>
	<div class="row">
		<table id="table" class="col text-center table table-bordered table-hover table-striped" ></table>
	</div>
	<h5  style='color:#000000; text-align: center;  margin-top: 5px;'>Designed by: <a href="https://www.facebook.com/tungpham198">Phạm Đình Tùng</a></h5>
</body>
</html>