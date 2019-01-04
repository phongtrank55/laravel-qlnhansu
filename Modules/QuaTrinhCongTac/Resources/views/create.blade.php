@extends('layouts.master')

@section('title', 'Quá trình công tác')

@section ('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
			{{$errors->first('MaNhanVien')}}
        </ul>
    </div>
@endif

 --}}

	<form action="{{route('quatrinhcongtac.store')}}" id="form-quatrinhcongtac" method="POST" class="form-horizontal"  enctype="multipart/form-data">
			 @csrf
			<div class="form-group">
				<label class="control-label col-md-2">
					Chọn nhân viên:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<select class="form-control" name="NhanVienId">
						@foreach($nhanviens as $nv)
							<option value="{{$nv->id}}">{{$nv->ho .' '. $nv->ten . ' - ' .$nv->manhanvien}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Chọn chức vụ:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<select class="form-control" name="ChucVuId">
						@foreach($chucvus as $key => $value)
							<option value="{{$key}}">{{$value}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Chọn phòng ban:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<select class="form-control" name="PhongBanId">
						@foreach($phongbans as $key => $value)
							<option value="{{$key}}">{{$value}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Chọn hình thức đổi:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<select class="form-control" name="HinhThucDoiId">
						@foreach($hinhthucdois as $key => $value)
							<option value="{{$key}}">{{$value}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ngày bắt đầu:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" id="datepickerNgayBatDau" name="NgayBatDau" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ngày kết thúc:
				</label>
				<div class="col-md-10">
					<input type="text" id="datepickerNgayKetThuc"  name="NgayKetThuc" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Số ký quyết định:
				</label>
				<div class="col-md-10">
					<input type="text" name="SoQuyetDinh" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ngày ký quyết định:
				</label>
				<div class="col-md-10">
					<input type="text" name="NgayKyQuyetDinh" id="datepickerNgayKyQuyetDinh"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tệp đính kèm:
				</label>
				<div class="col-md-10">
					<input type="file" name="FileDinhKem">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ghi chú:
				</label>
				<div class="col-md-10">
					<input type="text" name="GhiChu" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<button type="submit" class="btn btn-primary">Lưu</button>
				</div>
			</div>
	</form>
@stop

@section('scripts')

	<script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/additional-methods.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('locales/bootstrap-datepicker.vi.min.js') }}"></script>

	<script type="text/javascript">
		$(function(){
		{{-- 	@if($errors->has('Username'))
				$('form#form-quatrinhcongtac').validate().showErrors({
				 	"Username": "{{$errors->first('Username')}}"
				});
          	@endif
         --}}
         	$('#datepickerNgayBatDau').datepicker({
         		'autoclose':true,
         		'format': 'dd/mm/yyyy',
         		'language': 'vi',
         	});
			
			$('#datepickerNgayKetThuc').datepicker({
         		'autoclose':true,
         		'format': 'dd/mm/yyyy',
         		'language': 'vi',
         	});
			
			$('#datepickerNgayKyQuyetDinh').datepicker({
         		'autoclose':true,
         		'format': 'dd/mm/yyyy',
         		'language': 'vi',
         	});
			
			$('form#form-quatrinhcongtac').validate({ // initialize the plugin

		        rules: {
		            NhanVienId: {
		                required: true
		            },
		            PhongBanId: {
		                required: true,
		            },
		            ChucVuId: {
		                required: true,
		            },
		   			HinhThucDoiId: {
		                required: true,
		            },
		            NgayBatDau: {
		                required: true,
		            },
		            
		        },
		        messages: {
				    NhanVienId: "Nhân viên không thể để trống!",
				    PhongBanId: "Phòng ban không thể để trống!",
				    ChucVuId: "Chức vụ không thể để trống!",
				    NgayBatDau: "Ngày bắt đầu không thể để trống!",
				    HinhThucDoiId: "Hình thức đổi đăng nhập không thể để trống!",
				}

		    });
		});
	</script>
@stop