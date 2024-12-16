@include('Laptops.header')
	<div class="container">	
		<h2 class="text-center ">Crear Categoria</h2>							
	</div>	
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <form action="{{ isset($product) ? route('products.update', $product) : route('products.store') }}" method="POST">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name ?? '' }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $product->description ?? '' }}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{ $product->price ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control 2" value="{{ $product->stock ?? '' }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">{{ isset($product) ? 'Update' : 'Create' }}</button>                
            </form>
            
        </div>
    </div>

	<!-- Dialog help -->	
@include('Laptops.footer')