@extends('layouts.master')

@section('title', 'Nhân Viên')

@section ('content')

<div class="row">
	<div class="col-md-3">
		<img src="{{asset("storage/avatar/$emp->avatar")}}" style="width: 100%">
	</div>
	<div class="col-md-9">
		<div class="row">
			<label class="control-label col-md-3"> Tên đăng nhập: </label>
			<label class="control-label col-9">{{ $emp->username }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Trạng thái: </label>
			<label class="control-label col-9">{{ $emp->isActive ? 'Đang hoạt động' : 'Không hoạt động' }}</label>
		</div>
		
		<div class="row">
			<label class="control-label col-md-3"> Họ: </label>
			<label class="control-label col-9">{{ $emp->ho }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Tên: </label>
			<label class="control-label col-9">{{ $emp->ten }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Mã nhân viên: </label>
			<label class="control-label col-9">{{ $emp->maNhanVien }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Giới tính: </label>
			<label class="control-label col-9">{{ $emp->gioiTinh ? 'Nam' : 'Nữ' }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Ngày sinh: </label>
			<label class="control-label col-9">{{ $emp->ngaySinh }}</label>
		</div>

		<div class="row">
			<label class="control-label col-md-3"> Phòng ban: </label>
			<label class="control-label col-9">{{ 'ppp' }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Chức vụ: </label>
			<label class="control-label col-9">{{ 'chuc vu'}}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Email: </label>
			<label class="control-label col-9">{{ $emp->email }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Địa chỉ: </label>
			<label class="control-label col-9">{{ $emp->diaChi }}</label>
		</div>

		<div class="row">
			<label class="control-label col-md-3"> Quốc tịch: </label>
			<label class="control-label col-9">{{ $emp->quocTich }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Tôn giáo: </label>
			<label class="control-label col-9">{{ $emp->tonGiao }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> Hôn nhân: </label>
			<label class="control-label col-9">{{ $emp->honNhan ? 'Đã kết hôn' : 'Chưa kết hôn' }}</label>
		</div>
		<div class="row">
			<label class="control-label col-md-3"> CMND: </label>
			<label class="control-label col-9">{{ $emp->CMND }}</label>
		</div>

		<div class="row">
			<label class="control-label col-md-3"> Đã nghỉ việc: </label>
			<label class="control-label col-9">{{ $emp->DaNghiViec ? 'Đã nghỉ' : 'Không' }}</label>
		</div>

		<div class="row">
			<a href="{{route('nhanvien.edit', $emp->id)}}" class="btn btn-primary">
				<i class="fa fa-pencil"> </i> Sửa
			</a> 
			<a href="{{route('nhanvien.index')}}" class="btn btn-default">
			 	<i class="fa fa-reply"></i> Trở về
			</a> 
		</div>

		
	</div>
</div>

@stop