@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Lawyer </h1>
			<form action="{{route('lawyer.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lawyer Name</label>
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
					<label>Position</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="position" class="form-control">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lawyer No</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="lawyer_no" class="form-control">
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit Lawyer </h1>
			<form action="{{route('lawyer.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lawyer Name</label>
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
					<label>Position</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_position" class="form-control" id="edit_position">
					
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Lawyer No</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_lawyer_no" class="form-control" id="edit_lawyer_no">
					
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="Update">
				</div>
			</form>	
		</div>

		

	<div class="col-md-10 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>lawyer Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Position</th>
				<th>Lawyer Number</th>
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($lawyers as $lawyer)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$lawyer->name}}</td>
				<td>{{$lawyer->phone}}</td>
				<td>{{$lawyer->address}}</td>
				<td>{{$lawyer->position}}</td>
				<td>{{$lawyer->lawyer_no}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$lawyer->id}}" data-name = "{{$lawyer->name}}" data-address="{{$lawyer->address}}" data-phone="{{$lawyer->phone}}"  data-lawyer_no="{{$lawyer->lawyer_no}}" data-position="{{$lawyer->position}}">Edit</a>
				</td>
				<td>	
                    <form action="{{route('lawyer.destroy',$lawyer->id)}}" method="post">
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
				var position = $(this).data('position');
				var lawyer_no = $(this).data('lawyer_no');
				console.log(id,name,address,phone);
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				$('#edit_address').val(address);
				$('#edit_phone').val(phone);
				$('#edit_position').val(position);
				$('#edit_lawyer_no').val(lawyer_no);
			})
		})
	</script>

@endsection
