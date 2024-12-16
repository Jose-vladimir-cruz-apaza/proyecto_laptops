@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Crear Categoria</h2>							
	</div>	
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                @csrf
                @method('PUT')
    
                <!-- Usuario -->
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <input 
                        type="number" 
                        name="user_id" 
                        id="user_id" 
                        class="form-control @error('user_id') is-invalid @enderror" 
                        value="{{ old('user_id', $cart->user_id) }}" 
                        required>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <!-- Producto -->
                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select 
                        name="product_id" 
                        id="product_id" 
                        class="form-control @error('product_id') is-invalid @enderror" 
                        required>
                        @foreach ($products as $product)
                            <option 
                                value="{{ $product->id }}" 
                                {{ $cart->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    
                <!-- Cantidad -->
                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input 
                        type="number" 
                        name="quantity" 
                        id="quantity" 
                        class="form-control @error('quantity') is-invalid @enderror" 
                        value="{{ old('quantity', $cart->quantity) }}" 
                        required>
                    @error('quantity')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
    

                <button type="submit" class="btn btn-info text-white">Actualizar</button>
            </form>                         
        </div>
    </div>
	
@include('Laptops.footer')