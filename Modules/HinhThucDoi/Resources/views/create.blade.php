@extends('layouts.master')

@section('title', 'Hình thức đổi')

@section ('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
			{{$errors->first('MaCV')}}
        </ul>
    </div>
@endif

 --}}

	<form action="{{route('hinhthucdoi.store')}}" id="form-hinhThucDoi" method="POST" class="form-horizontal" >
			@csrf
			<div class="form-group">
				<label class="control-label col-md-2">
					Tên hình thức: 
					<span class="require-field">(*)</span>
				</label>
				<div class="col-md-10">
					<input type="text" name="TenHinhThuc" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-2">
					Ghi chú
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
	<script type="text/javascript">
		$(function(){
			// alert($('#btn-eye > i').('class'));

			@if($errors->has('TenHinhThuc'))
				$('form#form-hinhThucDoi').validate().showErrors({
				 	"TenHinhThuc": "{{$errors->first('TenHinhThuc')}}"
				});
          	@endif

			 $('form#form-hinhThucDoi').validate({ // initialize the plugin

		        rules: {
		            TenHinhThuc: {
		                required: true
		            },
		        },
		        messages: {
				    TenHinhThuc: "Tên hình thức không thể để trống!",
				    
				}

		    });
		});
	</script>
@stop