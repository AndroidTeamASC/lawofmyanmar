@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Region </h1>
			<form action="{{route('region.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Region Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>
				
				
				
				<div class="col-md-2">
					<input type="submit" value="ADD">
				</div>	
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit region </h1>
			<form action="{{route('region.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>region Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>
				
				
				
				<div class="col-md-2">
					<input type="submit" value="Update">
				</div>

				</div>
			</form>	
		</div>

		

	<div class="col-md-10 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>Region Name</th>
				
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($regions as $region)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$region->name}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$region->id}}" data-name = "{{$region->name}}">Edit</a>
				</td>
				<td>	
                    <form action="{{route('region.destroy',$region->id)}}" method="post">
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
				
				console.log(id,name);
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				
			})
		})
	</script>

@endsection
