@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Productos</h2>
		<div class="d-flex justify-content-start mb-4">
			<a href="{{ route('products.create') }}" class="btn btn-primary text-white">Agregar</a>
		</div>				
		<div class="card p-4 shadow-sm">
		  <table class="table">
			<thead class="table-dark">
			  <tr>
				<th scope="col">Id</th>
				<th scope="col">Categoria</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($products as $product)
                <tr>
					<td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}">
							<i class="fas fa-edit text-black text-center"></i> 							  
						</a>                        
                    </td>
					<td>						
						<form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" id="delete-form">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-link p-0 border-0" onclick="return confirm('Are you sure?')">
								<i class="fas fa-trash text-danger"></i>
							</button>
						</form>
					</td>
                </tr>
           		@endforeach
			  
			</tbody>
		  </table>
		</div>
	  </div>	
	<!-- Dialog help -->	
@include('Laptops.footer')