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

			<form method="get">

				<div class="col">
					<button type="submit" class="btn btn-primary mb-3 form-control-lg">{{ __('Найти') }}</button>
				</div>

				<h4>{{ __('Модель') }}</h4>

				<select class="form-select" multiple aria-label="Multiple select example" name="model_id[]">
					@foreach ($models as $model)

						@php
							$selected = '';
						@endphp

						@if (@isset($formParams['model_id']))
							
							@foreach ($formParams['model_id'] as $selected)

								@if ($model['id'] == $selected)
									@php
										$selected = 'selected';
									@endphp
									@break
								@endif

							@endforeach
						@endif

						<option {{ $selected }} value="{{ $model['id'] }}">{{ $model['name'] }}</option>

					@endforeach
				</select>
				
				@foreach ($params as $param)
					@php
						$name = false;
						if ($param['id'] == 1) {
							$name = 'color_id';
						}
						if ($param['id'] == 2) {
							$name = 'size_id';
						}
					@endphp
					<h4>{{ __($param['name']) }}</h4>
					<select class="form-select" multiple aria-label="Multiple select example" name="{{ $name }}[]">
						@foreach ($param['options'] as $option)

							@php
								$selected = '';
							@endphp

							@if (@isset($formParams[$name]))
								
								@foreach ($formParams[$name] as $selected)

									@if ($option['id'] == $selected)
										@php
											$selected = 'selected';
										@endphp
										@break
									@endif

								@endforeach
							@endif

							<option {{ $selected }} value="{{ $option['id'] }}">{{ __($option['value']) }}</option>
						@endforeach
					</select>
				@endforeach

			</form>
			
		</div>

		<div class="col-9">

			@if ($products)

				@php
					$open = true;
				@endphp

				<h2>{{ ('Найденные товары') }}</h2>
				<br>

				@foreach ($products as $product)

					@if ($open)
						<div class="row">
						@php
							$open = false;
						@endphp
					@endif

					<div class="col-4">
						<div class="card">
						  <img src="https://placehold.co/100?text=Product+Photo&font=roboto" class="card-img-top" alt="">
						  <div class="card-body">

						  	<ul class="list-group list-group-flush">
						  	    <li class="list-group-item"><b>{{ __('Товар: ') }}</b>{{ $product->product }}</li>
						  	    <li class="list-group-item"><b>{{ __('Цена: ') }}</b>{{ $product->price }}</li>
						  	    <li class="list-group-item"><b>{{ __('Остаток: ') }}</b>{{ $product->amount }}</li>
						  	  </ul>
						  </div>
						</div>
					</div>

					@if ($loop->iteration % 3 == 0 && $loop->iteration != 0)
						</div>
						<br>
						@php
							$open = true;
						@endphp
					@endif
					
				@endforeach

				{{ $products->links() }}


			@else
				<h2>{{ __('Таких товаров не найдено') }}</h2>
			@endif

			@php
				// dd($sql);
				// dd($products);
				// dd($formParams);
			@endphp

		</div>
	</div>
	
</div>

@include('common.footer')