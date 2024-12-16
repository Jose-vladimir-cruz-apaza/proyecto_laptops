@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Categorias</h2>
		<div class="d-flex justify-content-start mb-4">
			<a href="{{ route('categories.create') }}" class="btn btn-primary text-white">Agregar</a>
		</div>				
		<div class="card p-4 shadow-sm">
		  <table class="table">
			<thead class="table-dark">
			  <tr>
				<th scope="col">Id</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripcion</th>
				<th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($categories as $category)
                <tr>
					<td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}">
							<i class="fas fa-edit text-black text-center"></i> 							  
						</a>                        
                    </td>
					<td>						
						<form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" id="delete-form">
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