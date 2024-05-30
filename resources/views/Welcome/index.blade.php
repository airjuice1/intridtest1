@include('common.header', ['title' => 'Товары'])

<div class="container">
	
	<div class="row">
		<div class="col">
			<h1>{{ __('Товары') }}</h1>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-3">

			<form method="post">

				@csrf

				<div class="col">
					<button type="submit" class="btn btn-primary mb-3 form-control-lg">{{ __('Найти') }}</button>
				</div>

				<h4>{{ __('Модель') }}</h4>
				<select class="form-select" multiple aria-label="Multiple select example" name="model_id[]">
					@foreach ($models as $model)
						<option value="{{ $model['id'] }}">{{ $model['name'] }}</option>
					@endforeach
				</select>
				
				@foreach ($params as $param)
					@php
						$name = false;
						if ($param['id'] == 1) $name = 'color_id[]';
						if ($param['id'] == 2) $name = 'size_id[]';
					@endphp
					<h4>{{ __($param['name']) }}</h4>
					<select class="form-select" multiple aria-label="Multiple select example" name="{{ $name }}">
						@foreach ($param['options'] as $option)
							<option value="{{ $option['id'] }}">{{ __($option['value']) }}</option>
						@endforeach
					</select>
				@endforeach

			</form>
			
		</div>

		<div class="col-9"></div>
	</div>
	
</div>

@include('common.footer')