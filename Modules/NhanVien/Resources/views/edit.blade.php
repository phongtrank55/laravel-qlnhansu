@extends('layouts.master')

@section('title', 'Nhân Viên')

@section ('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
			{{$errors->first('MaNhanVien')}}
        </ul>
    </div>
@endif

 --}}

	<form action="{{route('nhanvien.update')}}" id="form-employer" method="POST" class="form-horizontal"  enctype="multipart/form-data">
			 @csrf
			<div class="form-header col-md-12">
				Thông tin tài khoản
			</div>
			<input type="hidden" name="id" value="{{$emp->id}}">
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên đăng nhập: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="Username" value="{{$emp->username}}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Mật khẩu: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<div class="input-group">
						<input type="password" name="Password" class="form-control">
						 <span class="input-group-btn">
							<button type="button" class="btn btn-default" id="btn-eye">
								<i class="fa fa-eye"></i>
							</button>
						</span>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-md-2">Trạng thái:</label>
				<div class="col-md-10">
					<select class="form-control" name="IsActive">
						<option value="1" {{$emp->isActive ? 'selected':''}}>Kích hoạt</option>
						<option value="0" {{!$emp->isActive ? 'selected':''}}>Vô hiệu hóa</option>
					</select>
				</div>
			</div>
			<div class="form-header col-md-12">
				Thông tin cá nhân
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Họ:
					<span 
					class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="Ho" class="form-control" value="{{$emp->ho}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input value="{{$emp->ten}}" type="text" name="Ten" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Mã nhân viên:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input value="{{$emp->maNhanVien}}" type="text" name="MaNhanVien" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ngày sinh:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" value="{{$emp->ngaySinh}}" name="NgaySinh" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Giới tính:
				</label>
				<div class="col-md-10">
					<select type="text" name="GioiTinh" class="form-control">
						<option value="1" {{$emp->gioiTinh == 1 ? 'selected': ''}}>Nam</option>
						<option value="0" {{$emp->gioiTinh == 0 ? 'selected': ''}}>Nữ</option>
						<option value="2" {{$emp->gioiTinh == 2 ? 'selected': ''}}>Khác</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Email:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="Email" value="{{$emp->email}}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Địa chỉ:
				</label>
				<div class="col-md-10">
					<input type="text" name="DiaChi" class="form-control"  value="{{$emp->diaChi}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ảnh:
				</label>
				<div class="col-md-10">
					<img width="100" height="100" src="{{asset("storage/avatar/$emp->avatar")}}">
					<input type="file" name="Avatar">
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
	<script type="text/javascript">
		$(function(){
			// alert($('#btn-eye > i').('class'));

			$('#btn-eye').click(function(){

				type = $('input[name="Password"]').attr('type');
				if(type=='text'){
					$('input[name="Password"]').attr('type', 'password');
					$('#btn-eye i').attr('class', 'fa fa-eye');
				}else{
					$('input[name="Password"]').attr('type', 'text');
					$('#btn-eye i').attr('class', 'fa fa-eye-slash');
				}
			});
			@if($errors->has('MaNhanVien'))
				$('form#form-employer').validate().showErrors({
				 	"MaNhanVien": "{{$errors->first('MaNhanVien')}}"
				});
          	@endif
          	@if($errors->has('Email'))
				$('form#form-employer').validate().showErrors({
				 	"Email": "{{$errors->first('Email')}}"
				});
          	@endif
			@if($errors->has('Username'))
				$('form#form-employer').validate().showErrors({
				 	"Username": "{{$errors->first('Username')}}"
				});
          	@endif

			 $('form#form-employer').validate({ // initialize the plugin

		        rules: {
		            Username: {
		                required: true
		            },

		            MaNhanVien: {
		                required: true,
		              
		            },

		            Avatar: {
		                extension: "jpeg|png|jpg"
		            },
		            Ho: {
		            	required: true
		            },

		            Ten: {
		            	required: true
		            },

		            NgaySinh: {
		            	required: true
		            },
	            	Email: {
		            	required: true,
		            	email:true
		            }
		        },
		        messages: {
				    Ten: "Tên không thể để trống!",
				    Ho: "Họ không thể để trống!",
				    MaNhanVien: "Họ không thể để trống!",
				    NgaySinh: "Ngày sinh không thể để trống!",
				    Username: "Tên đăng nhập không thể để trống!",
				    Email: {
				    	required: "Email không được để trống!",
				     	email: "Không đúng định dạng Email!"
				    },
				    Avatar: "Chỉ cho phép định dạng JPG/PNG !"
				}

		    });
		});
	</script>
@stop