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
					<button type="submit" class="btn btn-primary mb-3 form-control-lg">{{ __('Найти')}}</button>
				</div>

				<h4>{{ __('Модель') }}</h4>
				<select class="form-select" multiple aria-label="Multiple select example" name="model_id[]">
					@foreach ($models as $m)
						<option value="{{ $m['id'] }}">{{ $m['name'] }}</option>
					@endforeach
				</select>

				<br>

				@foreach ($params as $p)
					@php
						$name = false;
						if ($p['id'] == 1) $name = 'color_id[]';
						if ($p['id'] == 2) $name = 'size_id[]';
					@endphp
					<h4>{{ __($p['name']) }}</h4>
					<select class="form-select" multiple aria-label="Multiple select example" name="{{ $name }}">
						@foreach ($p['options'] as $o)
							<option value="{{ $o['id'] }}">{{ __($o['value']) }}</option>
						@endforeach
					</select>
				@endforeach

			</form>
			
		</div>

		<div class="col-9"></div>
	</div>
	
</div>

@include('common.footer')