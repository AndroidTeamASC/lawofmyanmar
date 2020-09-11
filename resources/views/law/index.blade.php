@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Law </h1>
			<form action="{{route('law.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>law Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Type</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="type" class="form-control">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law Number</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="law_no" class="form-control">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>main</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="main" class="form-control">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Publishded Date</label>
				</div>
				<div class="col-md-5">
					<input type="date" name="published_date" class="form-control">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Release Date</label>
				</div>
				<div class="col-md-5">
					<input type="date" name="release_date" class="form-control">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Department</label>
				</div>
				<div class="col-md-5">
					<select name="department" class="form-control">
						<option selected disabled>Select Department</option>
						@foreach($departments as $department)
						<option value="{{$department->id}}">{{$department->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law type</label>
				</div>
				<div class="col-md-5">
					<select name="law_type" class="form-control">
						<option selected disabled>Select Law Type</option>
						@foreach($law_types as $law_type)
						<option value="{{$law_type->id}}">{{$law_type->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Region</label>
				</div>
				<div class="col-md-5">
					<select name="region" class="form-control">
						<option selected disabled>Select Region</option>
						@foreach($regions as $region)
						<option value="{{$region->id}}">{{$region->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>
				

				
				
				<div class="col-md-3">
					<input type="submit" value="ADD">
				</div>
			</form>	
		</div>
		<div class="edit">
			<h1> Edit Law </h1>
			<form action="{{route('law.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>law Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>
				
				</div>
				
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Type</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_type" class="form-control" id="edit_type">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law Number</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="law_no" class="form-control" id="edit_law_no">
				</div>
				
				</div>
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>main</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_main" class="form-control" id="edit_main">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Publishded Date</label>
				</div>
				<div class="col-md-5">
					<input type="date" name="edit_published_date" class="form-control" id="edit_published_date">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Release Date</label>
				</div>
				<div class="col-md-5">
					<input type="date" name="edit_release_date" class="form-control" id="edit_release_date">
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Department</label>
				</div>
				<div class="col-md-5">
					<select name="edit_department_id" id="edit_department_id">
						<option selected disabled>Select Department</option>
						@foreach($departments as $department)
						<option value="{{$department->id}}">{{$department->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law type</label>
				</div>
				<div class="col-md-5">
					<select name="edit_law_type_id" id="edit_law_type_id">
						<option selected disabled>Select Law Type</option>
						@foreach($law_types as $law_type)
						<option value="{{$law_type->id}}">{{$law_type->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Region</label>
				</div>
				<div class="col-md-5">
					<select name="edit_region" id="edit_region">
						<option selected disabled>Select Region</option>
						@foreach($regions as $region)
						<option value="{{$region->id}}">{{$region->name}}</option>
						@endforeach
					</select>
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
				<th>law Name</th>
				<th>Type</th>
				<th>main</th>
				<th>Published Date</th>
				<th>Release Date</th>
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($laws as $law)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$law->name}}</td>
				<td>{{$law->type}}</td>
				<td>{{$law->main}}</td>
				<td>{{$law->published_date}}</td>
				<td>{{$law->release_date}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$law->id}}" data-name = "{{$law->name}}" data-type="{{$law->type}}" data-main="{{$law->main}}"  data-published_date="{{$law->published_date}}" data-release_date="{{$law->release_date}}" data-department_id="{{$law->department_id}}" data-law_type_id="{{$law->law_type_id}}" data-region_id = "{{$law->region_id}}" 
						data-Law_no="{{$law->law_no}}">Edit</a>
				</td>
				<td>	
                    <form action="{{route('law.destroy',$law->id)}}" method="post">
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
				var type = $(this).data('type');
				var main = $(this).data('main');
				var published_date = $(this).data('published_date');
				var release_date = $(this).data('release_date');
				var department_id = $(this).data('department_id');
				var law_type_id = $(this).data('law_type_id');
				var region_id = $(this).data('region_id');
				var law_no = $(this).data('law_no')
				console.log(id,name,department_id);
				$('#edit_id').val(id);
				$('#edit_name').val(name);
				$('#edit_type').val(type);
				$('#edit_main').val(main);
				$('#edit_published_date').val(published_date);
				$('#edit_release_date').val(release_date);
				$('#edit_department_id').val(department_id);
				$('#edit_law_type_id').val(law_type_id);
				$('#edit_region_id').val(region_id);
				$('#edit_law_no')
			})
		})
	</script>

@endsection
