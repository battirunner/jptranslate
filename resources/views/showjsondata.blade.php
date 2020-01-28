<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V04</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 table200 ver1 m-b-110">
					<h5>Sorted By English</h5>
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">English</th>
                                    <th class="cell100 column1">Japanese</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                                <form action="{{route('createnewjson')}}" method="POST" >
								@csrf
								@foreach ($json_sorted as $key=>$jp)
									<tr class="row100 body">
										<td class="cell100 column1"><input type="text" name="en[]" class="check1" value="{{$key}}"></td>
										<td class="cell100 column1"><input type="text" name="jp[]" class="check1" value="{{$jp}}" ></td>
										{{-- <td class="cell100 column1"><input type="text" name="en[]"></td>
										<td class="cell100 column1"><input type="text" name="jp[]"></td> --}}
											{{-- <td class="cell100 column5"><button type="submit" class="btn btn-primary" >Submit</button></td> --}}
									</tr>
								@endforeach
								<input type="hidden" value="{{$id}}" name="id">
                                <tr class="row100 body">
                                    <td class="cell100 column1" >
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </td>
								</tr>

                                <div class="checkbox">
                                   
                                    
                                    {{-- <label class="checkbox_1"><input type="checkbox" value="">Option 3</label>
                                    <label class="checkbox_1"><input type="checkbox" value="">Option 2</label>
                                    <label class="checkbox_1"><input type="checkbox" value="">Option 3</label> --}}
									<label class="checkbox_1"><input type="text" value="" placeholder="search key" name="searchkey" id="searchkey1"></label>
									<button class="btn btn-danger pull-right" onclick="search(1)" type="button" >Search </button>
                                </div>
                                </form>
							</tbody>
						</table>
					</div>
				</div>
				<div class="table100 table200 ver1 m-b-110">
					<h5>Sorted By Jp</h5>
					<div class="table100-head">
						<table>
							<thead>

								<tr class="row100 head">
									<th class="cell100 column1">English</th>
                                    <th class="cell100 column1">Japanese</th>
								</tr>
							</thead>
						</table>
					</div>
					<div class="table100-body js-pscroll">
						<table>
							<tbody>
                                <form action="{{route('createnewjson')}}" method="POST" >
								@csrf
								@foreach ($json_reverse_sorted as $key=>$jp)
									<tr class="row100 body">
										<td class="cell100 column1"><input type="text" name="en[]" class="check2" value="{{$key}}"></td>
										<td class="cell100 column1"><input type="text" name="jp[]" class="check2" value="{{$jp}}" ></td>
										{{-- <td class="cell100 column1"><input type="text" name="en[]"></td>
										<td class="cell100 column1"><input type="text" name="jp[]"></td> --}}
											{{-- <td class="cell100 column5"><button type="submit" class="btn btn-primary" >Submit</button></td> --}}
									</tr>
								@endforeach
								<input type="hidden" value="{{$id}}" name="id">
                                <tr class="row100 body">
                                    <td class="cell100 column1" >
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </td>
								</tr>
                                <div class="checkbox">
                                   
                                    
                                    {{-- <label class="checkbox_1"><input type="checkbox" value="">Option 3</label>
                                    <label class="checkbox_1"><input type="checkbox" value="">Option 2</label>
                                    <label class="checkbox_1"><input type="checkbox" value="">Option 3</label> --}}
									<label class="checkbox_1"><input type="text" value="" placeholder="search key" name="" id="searchkey2"> </label>
									<button class="btn btn-danger pull-right" onclick="search(2)" type="button" >Search </button>
                                </div>
                                </form>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/bootstrap/js/popper.js"></script>
	<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		// $('.js-pscroll').each(function(){
		// 	var ps = new PerfectScrollbar(this);

		// 	$(window).on('resize', function(){
		// 		ps.update();
		// 	})
		// });
			
		
	</script>
<!--===============================================================================================-->
	<script src="/assets/js/main.js"></script>

	<script>
	function search(type)
	{
		// alert("chekku shimasu");
		// return false;
		var key = document.getElementById('searchkey'+type);
		var all = document.getElementsByClassName('check'+type);
		for(i = 0; all[i]!=null; i++)
		{
				all[i].style="";
		}
		// var Cells = all.getElementsByTagName("td");
		for(i = 0; all[i]!=null; i++)
		{
			if(all[i].value.indexOf(key.value) == 0)
				all[i].style="background-color: rgb(172, 172, 172)";
		}
		// console.log(all[1].style = "background-color: red");

	}
	</script>

</body>
</html>