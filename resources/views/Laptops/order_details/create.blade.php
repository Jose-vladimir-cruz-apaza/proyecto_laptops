@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Crear Detalle Ordem</h2>							
	</div>	
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <form action="{{ route('order_details.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="order_id">Order</label>
                    <select name="order_id" id="order_id" class="form-control" required>
                        @foreach ($orders as $order)
                            <option value="{{ $order->id }}">Order #{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_id">Product</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" step="0.01" required>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
            </form>            
        </div>
    </div>

	<!-- Dialog help -->	
@include('Laptops.footer')