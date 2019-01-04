@extends('layouts.master')

@section('title', 'Nhân Viên')

@section ('content')
{{-- 	<a class="btn btn-primary pull-right" href="{{url('nhanvien/create')}}">
		<i class="fa fa-plus"></i>	Thêm Nhân Viên
	</a>
 --}}
 	<a class="btn btn-primary pull-right" href="{{route('nhanvien.create')}}">
		<i class="fa fa-plus"></i>	Thêm Nhân Viên
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
					<th>Mã NV</th>
					<th>Họ </th>
					<th>Tên </th>
					<th>Ngày Sinh</th>
					<th>Giới tính</th>
					<th>Chức vụ</th>
					<th>Phòng ban</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$currentPage = $emps->currentPage();
					$perPage = $emps->perPage();
					$currentPage=1;
					$index = $perPage*($currentPage-1)+1; 
				 //$index=1; 
				?>
				@foreach($emps as $emp)
					<tr>
						<td>{{ $index++ }}</td>
						<td>{{ $emp->maNhanVien }}</td>
						<td>{{ $emp->ho }}</td>
						<td>{{ $emp->ten }}</td>
						<td>{{ $emp->ngaySinh }}</td>
						<td>{{ $emp->gioiTinh? 'Nam' : 'Nữ' }}</td>
						<td>{{ $emp->chucvu ? $emp->chucvu->tencv : ''}}</td>
						<td>{{ $emp->phongban ? $emp->phongban->tenphong : '' }}</td>
						<td>
							<a href="{{ route('nhanvien.edit', $emp->id)}}" class="btn">
									<i class="fa fa-pencil"></i>
							</a>
							<a href="{{ route('nhanvien.detail', $emp->id)}}" class="btn">
									<i class="fa fa-list"></i>
							</a>
							<a data-toggle="modal" href="#modal-delete" class="btn" title="delete" 
								data-id = "{{$emp->id}}" 
								data-title = "{{$emp->ho.' '. $emp->ten}}"
							>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


 {{ $emps->links() }}


{{-- Modal --}}

	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cảnh báo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post" action="{{route('nhanvien.delete')}}">
					{{csrf_field()}}
					
					<div class="modal-body">
						<input type="hidden" id="id-employer" name="id">
						Bạn có chắc chắn xóa nhân viên <span id="name-employer"></span> ?
							
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
		// alert(id);
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this);

		{{-- alert('{{route('category.destroy', '') }}/' + id); --}}
		modal.find('.modal-body #id-employer').val(id);
		modal.find('.modal-body #name-employer').text(title);
		
	});
</script> 
@stop