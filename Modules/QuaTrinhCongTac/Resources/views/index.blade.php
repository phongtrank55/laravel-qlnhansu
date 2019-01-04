@extends('layouts.master')

@section('title', 'Quá trình công tác')

@section ('content')
{{-- 	<a class="btn btn-primary pull-right" href="{{url('quatrinhcongtac/create')}}">
		<i class="fa fa-plus"></i>	Thêm Nhân Viên
	</a>
 --}}
 	<a class="btn btn-primary pull-right" href="{{route('quatrinhcongtac.create')}}">
		<i class="fa fa-plus"></i>	Thêm Quá trình công tác
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
					<th>Họ tên</th>
					<th>Hình thức đổi</th>
					<th>Phòng ban</th>
					<th>Chức vụ</th>
					<th>Ngày bắt đầu</th>
					<th>Ngày kết thúc</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$currentPage = $quaTrinhCongTacs->currentPage();
					$perPage = $quaTrinhCongTacs->perPage();
					$currentPage=1;
					$index = $perPage*($currentPage-1)+1; 
				 //$index=1; 
				?>
				@foreach($quaTrinhCongTacs as $quaTrinhCongTac)
					<tr>
						<td>{{ $index++ }}</td>
						<td>{{ $quaTrinhCongTac->nhanvien->manhanvien }}</td>
						<td>{{ $quaTrinhCongTac->nhanvien->ho.' '. $quaTrinhCongTac->nhanvien->ten }}</td>
						<td>{{ $quaTrinhCongTac->hinhthucdoi->tenhinhthuc }}</td>
						<td>{{ $quaTrinhCongTac->phongban->tenphong }}</td>
						<td>{{ $quaTrinhCongTac->chucvu->tencv }}</td>
						<td>{{ date('d/m/Y', $quaTrinhCongTac->ngaybatdau) }}</td>
						<td>{{ $quaTrinhCongTac->ngayketthuc ? date('d/m/Y', $quaTrinhCongTac->ngayketthuc) :''}}</td>
						<td>
							<a href="{{ route('quatrinhcongtac.edit', $quaTrinhCongTac->id)}}" class="btn">
									<i class="fa fa-pencil"></i>
							</a>
							<a href="{{ route('quatrinhcongtac.detail', $quaTrinhCongTac->id)}}" class="btn">
									<i class="fa fa-list"></i>
							</a>
							<a data-toggle="modal" href="#modal-delete" class="btn" title="delete" 
								data-id = "{{$quaTrinhCongTac->id}}" 
								data-title = "{{$quaTrinhCongTac->ho.' '. $quaTrinhCongTac->ten}}"
							>
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>


 {{ $quaTrinhCongTacs->links() }}


{{-- Modal --}}

	<div class="modal fade" id="modal-delete">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Cảnh báo</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<form method="post" action="{{route('quatrinhcongtac.delete')}}">
					{{csrf_field()}}
					
					<div class="modal-body">
						<input type="hidden" id="id-quaTrinhCongTacloyer" name="id">
						Bạn có chắc chắn xóa quá trình công tác <span id="name-quaTrinhCongTacloyer"></span> ?
							
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
		modal.find('.modal-body #id-quaTrinhCongTacloyer').val(id);
		modal.find('.modal-body #name-quaTrinhCongTacloyer').text(title);
		
	});
</script> 
@stop