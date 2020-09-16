@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Chapter </h1>
			<form action="{{route('chapter.store')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Chapter No</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="chapter_no" class="form-control">
				</div>

				</div>
			

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Section</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="section" class="form-control">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law</label>
				</div>
				<div class="col-md-5">
					<select name="law_id" class="form-control">
						<option selected disabled>Select Law</option>
						@foreach($laws as $law)
							<option value="{{$law->id}}">{{$law->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>
				
				
				
				<div class="col-md-2">
					<input type="submit" value="ADD">
				</div>	
			</form>	
		</div>
		<div class="edit">
			<h1> Edit chapter </h1>
			<form action="{{route('chapter.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Chapter No</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_chapter_no" class="form-control" id="edit_chapter_no">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>name</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" id="edit_name" class="form-control">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Section</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_section" class="form-control" id="edit_section">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Law</label>
				</div>
				<div class="col-md-5">
					<select name="edit_law_id" class="form-control" id="edit_law_id">
						<option selected disabled>Select Law</option>
						@foreach($laws as $law)
							<option value="{{$law->id}}">{{$law->name}}</option>
						@endforeach
					</select>
				</div>
				
				</div>
				
				
				
				<div class="col-md-2">
					<input type="submit" value="Update">
				</div>

				
			</form>	
		</div>

		

	<div class="col-md-10 mt-5">

		<table class="table table-dark table-sm">
			<tr>
				<th>NO.</th>
				<th>chapter No</th>
				<th>Name</th>
				<th>law</th>
				<th>Section</th>
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($chapters as $chapter)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$chapter->chapter_no}}</td>
				<td>{{$chapter->name}}</td>
				<td>{{$chapter->law->name}}</td>
				<td>{{$chapter->section}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$chapter->id}}" data-chapter_no = "{{$chapter->chapter_no}}" data-law_id="{{$chapter->law_id}}" data-section="{{$chapter->section}}" data-name="{{$chapter->name}}">Edit</a>
				</td>
				<td>	
                    <form action="{{route('chapter.destroy',$chapter->id)}}" method="post">
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
				var chapter_no = $(this).data('chapter_no');
				var law_id     = $(this).data('law_id');
				var section    = $(this).data('section');
				var name 	   = $(this).data('name')	

				
				console.log(id,chapter_no,law_id);
				$('#edit_id').val(id);
				$('#edit_chapter_no').val(chapter_no);
				$('#edit_section').val(section);
				$('#edit_law_id').val(law_id);
				$('#edit_name').val(name);
				
			})
		})
	</script>

@endsection
