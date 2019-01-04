@extends('layouts.master')

@section('title', 'Phòng ban')

@section ('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
			{{$errors->first('MaPhong')}}
        </ul>
    </div>
@endif

 --}}

	<form action="{{route('phongban.update')}}" id="form-department" method="POST" class="form-horizontal" >
			 @csrf
			 <input type="hidden" name="id" value="{{$dep->id}}">
			<div class="form-group">
				<label class="control-label col-md-2">
					Mã phòng:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="MaPhong" value="{{$dep->MaPhong}}" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên phòng: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="TenPhong" class="form-control"  value="{{$dep->TenPhong}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên viết tắt: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="TenVietTat" class="form-control"  value="{{$dep->TenVietTat}}">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Số điện thoại:
				</label>
				<div class="col-md-10">
					<input type="text" name="SoDienThoai" class="form-control"  value="{{$dep->SoDienThoai}}">
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

			@if($errors->has('TenPhong'))
				$('form#form-department').validate().showErrors({
				 	"TenPhong": "{{$errors->first('TenPhong')}}"
				});
          	@endif
          	@if($errors->has('MaPhong'))
				$('form#form-department').validate().showErrors({
				 	"MaPhong": "{{$errors->first('MaPhong')}}"
				});
          	@endif
          	@if($errors->has('TenVietTat'))
				$('form#form-department').validate().showErrors({
				 	"TenVietTat": "{{$errors->first('TenVietTat')}}"
				});
          	@endif


			 $('form#form-department').validate({ // initialize the plugin

		        rules: {
		            TenPhong: {
		                required: true
		            },

		             MaPhong: {
		                required: true,
		              
		            },

		         	TenVietTat: {
		            	required: true,
		            }
		        },
		        messages: {
				    MaPhong: "Mã phòng không thể để trống!",
				    TenPhong: "Tên phòng không thể để trống!",
				    TenVietTat: "Tên viết tắt không được để trống!"
				}

		    });
		});
	</script>
@stop