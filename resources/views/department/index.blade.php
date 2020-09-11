@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Department </h1>
			<form action="{{route('department.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Department Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Website Link</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="url" class="form-control">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Image</label>
				</div>
				<div class="col-md-5">
					<input type="file" name="image" class="form-control">
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit Department </h1>
			<form action="{{route('department.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Department Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Website Link</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_url" class="form-control" id="edit_url">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Image</label>
				</div>
				<div class="col-md-5">
					<input type="file" name="image" class="form-control">
					
				</div>
				<div class="col-md-4">
					<img src="" id="edit_image" width="150" height="150">
					<input type="hidden" name="old_image" id="edit_image_old">
				</div>
				
				</div>
				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
			</form>	
		</div>

		

	<div class="col-md-8 offset-2 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>Department Name</th>
				<th>Website Link</th>
				<th>Image</th>
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($departments as $department)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$department->name}}</td>
				<td>{{$department->url}}</td>
				<td><img src="{{$department->image}}" width="150" height="150"></td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$department->id}}" data-name = "{{$department->name}}" data-url="{{$department->url}}" data-image="{{$department->image}}"  >Edit</a>
				</td>
				<td>	
                    <form action="{{route('department.destroy',$department->id)}}" method="post">
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
				var url = $(this).data('url');
				var image = $(this).data('image');
				console.log(id,name,url,image);
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				$('#edit_url').val(url);
				$('#edit_image').attr("src",image);
				$('#edit_image_old').val(image);
			})
		})
	</script>

@endsection
