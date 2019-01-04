@extends('layouts.master')

@section('title', 'Chức vụ')

@section ('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
			{{$errors->first('MaCV')}}
        </ul>
    </div>
@endif

 --}}

	<form action="{{route('chucvu.store')}}" id="form-position" method="POST" class="form-horizontal" >
			@csrf
			<div class="form-group">
				<label class="control-label col-md-2">
					Mã chức vụ:
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="MaCV" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên chức vụ: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="TenCV" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên viết tắt: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="TenVietTat" class="form-control">
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

			@if($errors->has('TenCV'))
				$('form#form-position').validate().showErrors({
				 	"TenCV": "{{$errors->first('TenCV')}}"
				});
          	@endif
          	@if($errors->has('MaCV'))
				$('form#form-position').validate().showErrors({
				 	"MaCV": "{{$errors->first('MaCV')}}"
				});
          	@endif
          	@if($errors->has('TenVietTat'))
				$('form#form-position').validate().showErrors({
				 	"TenVietTat": "{{$errors->first('TenVietTat')}}"
				});
          	@endif


			 $('form#form-position').validate({ // initialize the plugin

		        rules: {
		            TenCV: {
		                required: true
		            },

		            MaCV: {
		                required: true,
		              
		            },

		         	TenVietTat: {
		            	required: true,
		            }
		        },
		        messages: {
				    MaCV: "Mã chức vụ không thể để trống!",
				    TenCV: "Tên chức vụ không thể để trống!",
				    TenVietTat: "Tên viết tắt không được để trống!"
				}

		    });
		});
	</script>
@stop