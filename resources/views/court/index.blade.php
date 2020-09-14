@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>court </h1>
			<form action="{{route('court.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Court Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Address</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="address" class="form-control">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Phone</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="phone" class="form-control">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lat</label>
					</div>
					<div class="col-md-5">
						<input type="text" name="lat" class="form-control">
					</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Long</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="long" class="form-control">
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit court </h1>
			<form action="{{route('court.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>court Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Address</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_address" class="form-control" id="edit_address">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Phone</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_phone" class="form-control" id="edit_phone">
					
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lat</label>
				</div>
				<div class="col-md-5">
					<input type="number" name="edit_lat" class="form-control" id="edit_lat">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Long</label>
				</div>
				<div class="col-md-5">
					<input type="number" name="edit_long" class="form-control" id="edit_long">
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="Update">
				</div>
			</form>	
		</div>

		

	<div class="col-md-8 offset-2 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>Court Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>lat</th>
				<th>long</th>
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($courts as $court)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$court->name}}</td>
				<td>{{$court->phone}}</td>
				<td>{{$court->address}}</td>
				<td>{{$court->lat}}</td>
				<td>{{$court->lng}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$court->id}}" data-name = "{{$court->name}}" data-address="{{$court->address}}" data-phone="{{$court->phone}}"  data-lat= "{{$court->lat}}" data-lng="{{$court->lng}}" >Edit</a>
				</td>
				<td>	
                    <form action="{{route('court.destroy',$court->id)}}" method="post">
                        @method('Delete')
                        @csrf
                        <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger">
                     </form>
                </td>
			</tr>
			@endforeach
		</table>
	</div>
		
	</div>
	
</div>

@endsection

@section('script')

	<script type="text/javascript">
		
		$(document).ready(function(){
			$('.add').show();
			$('.edit').hide();
			$('.edit_item').click(function(){
				$('.edit').show();
				$('.add').hide();
				var id = $(this).data('id');
				var name = $(this).data('name');
				var phone = $(this).data('phone');
				var address = $(this).data('address');
				var lat = $(this).data('lat');
				var lng = $(this).data('lng');
				console.log(id,name,address,phone);
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				$('#edit_address').val(address);
				$('#edit_phone').val(phone);
				$('#edit_lat').val(lat);
				$('#edit_long').val(lng);
			})
		})
	</script>

@endsection
