@extends('layouts.master')

@section('title', 'Quá trình công tác')

@section ('content')

		<div class="row">
			<label class="control-label col-md-2">Mã nhân viên: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->nhanvien->manhanvien }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Họ tên nhân viên: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->nhanvien->ho.' '. $quaTrinhCongTac->nhanvien->ten }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Phòng ban: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->phongban->tenphong }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Chức vụ: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->chucvu->tencv }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Hình thức đổi: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->hinhthucdoi->tenhinhthuc }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Ngày bắt đầu: </label>
			<label class="control-label col-md-10">{{ date('d/m/Y', $quaTrinhCongTac->ngaybatdau) }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Ngày kết thúc: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->ngayketthuc ? date('d/m/Y', $quaTrinhCongTac->ngayketthuc) : ''}}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Số quyết định: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->soquyetdinh }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Ngày ký quyết định: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->ngaykyQuyetDinh }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">File đính kèm: </label>
			<label class="control-label col-md-10"></label>
		</div>
		<div class="row">
			<label class="control-label col-md-2">Ghi chú: </label>
			<label class="control-label col-md-10">{{ $quaTrinhCongTac->ghichu }}</label>
		</div>
		

		<div class="row">
			<a href="{{route('quatrinhcongtac.edit', $quaTrinhCongTac->id)}}" class="btn btn-primary">
				<i class="fa fa-pencil"> </i> Sửa
			</a> 
			<a href="{{route('quatrinhcongtac.index')}}" class="btn btn-default">
			 	<i class="fa fa-reply"></i> Trở về
			</a> 
		</div>

		
	</div>
</div>

@stop