@extends('backtemplate')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="add">
			<h1>Detail </h1>
			<form action="{{route('detail.store')}}" method="post" enctype="multipart/form-data">
				@csrf

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Detail</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="name" class="form-control">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Chapter</label>
				</div>
				<div class="col-md-5">
					<select name="chapter_id" class="form-control">
						<option selected disabled>Select Law</option>
						@foreach($chapters as $chapter)
							<option value="{{$chapter->id}}">{{$chapter->chapter_no}}</option>
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
			<h1> Edit detail </h1>
			<form action="{{route('detail.update',1)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<input type="hidden" name="edit_id" id="edit_id">
				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Detail</label>
				</div>
				<div class="col-md-5">
					<input type="text" name="edit_name" class="form-control" id="edit_name">
				</div>

				</div>

				<div class="row mt-5">
					<div class="col-md-3 ">
					<label>Chapter</label>
				</div>
				<div class="col-md-5">
					<select name="edit_chapter_id" class="form-control" id="edit_chapter_id">
						<option selected disabled>Select Chapter</option>
						@foreach($chapters as $chapter)
							<option value="{{$chapter->id}}">{{$chapter->chapter_no}}</option>
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
				<th>Detail</th>
				<th>law</th>
				
				<th colspan="2">Action</th>
			</tr>
			@php $i = 1; @endphp
			@foreach($details as $detail)
			<tr>
				<td>{{$i++}}</td>
				<td>{{$detail->name}}</td>
				<td>{{$detail->chapter->chapter_no}}</td>
				<td>
					<a href="#" class="btn btn-secondary  edit_item " data-id="{{$detail->id}}" data-name = "{{$detail->name}}" data-chapter_id="{{$detail->chapter_id}}">Edit</a>
				</td>
				<td>	
                    <form action="{{route('detail.destroy',$detail->id)}}" method="post">
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
				var detail_no = $(this).data('detail_no');
				var law_id     = $(this).data('law_id');

				
				console.log(id,detail_no,law_id);
				$('#edit_id').val(id);
				$('#edit_detail_no').val(detail_no);
				$('#edit_law_id').val(law_id);
				
			})
		})
	</script>

@endsection
