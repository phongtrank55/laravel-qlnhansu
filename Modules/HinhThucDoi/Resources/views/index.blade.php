@extends('layouts.master')

@section('title', 'Hình thức đổi')

@section ('content')
{{-- 	<a class="btn btn-primary pull-right" href="{{url('hinhthucdoi/create')}}">
		<i class="fa fa-plus"></i>	Thêm Nhân Viên
	</a>
 --}}
 	<a class="btn btn-primary pull-right" href="{{route('hinhthucdoi.create')}}">
		<i class="fa fa-plus"></i>	Thêm hình thức đổi
	</a>

	<div class="clearfix">
	{{-- <h1>{{$id}}</h1> --}}
	</div>
	<br>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tên hình thức</th>
					<th>Ghi chú </th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$currentPage = $hinhThucDois->currentPage();
					$perPage = $hinhThucDois->perPage();
					//$currentPage=1;
					$index = $perPage*($currentPage-1)+1; 
				?>
				@foreach($hinhThucDois as $hinhThucDoi)
					<tr>
						<td>{{ $index++ }}</td>
						<td>{{ $hinhThucDoi->tenHinhThuc }}</td>
						<td>{{ $hinhThucDoi->ghiChu }}</td>
						<td>
							<a href="{{ route('hinhthucdoi.edit', $hinhThucDoi->id)}}" class="btn">
									<i class="fa fa-pencil"></i>
							</a>
							<a data-toggle="modal" href="#modal-delete" class="btn" title="delete" 
								data-id = "{{$hinhThucDoi->id}}" 
								data-title = "{{$hinhThucDoi->tenHinhThuc}}"
							>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


 {{ $hinhThucDois->links() }}


{{-- Modal --}}

	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cảnh báo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post" action="{{route('hinhthucdoi.delete')}}">
					{{csrf_field()}}
					
					<div class="modal-body">
						<input type="hidden" id="id-hinhThucDoi" name="id">
						Bạn có chắc chắn xóa chức vụ <span id="name-hinhThucDoi"></span> ?
							
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
						<button type="submit" class="btn btn-primary">Có</button>
					</div>
				</form>
			</div>
		</div>
	</div>	

{{-- end modal --}}

@stop

@section('scripts')
 <script type="text/javascript">
	
	$('#modal-delete').on('show.bs.modal', function (event) {
		
		var button = $(event.relatedTarget) // Button that triggered the modal
		var title = button.data('title'); // Extract info from data-* attributes
		
		var id = button.data('id');
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);

		{{-- alert('{{route('category.destroy', '') }}/' + id); --}}
		modal.find('.modal-body #id-hinhThucDoi').val(id);
		modal.find('.modal-body #name-hinhThucDoi').text(title);
		
	});
</script> 
@stop