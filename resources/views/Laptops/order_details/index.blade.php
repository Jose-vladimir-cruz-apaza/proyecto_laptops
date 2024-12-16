@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Ordenes</h2>
		<div class="d-flex justify-content-start mb-4">
			<a href="{{ route('order_details.create') }}" class="btn btn-primary text-white">Agregar</a>
		</div>				
		<div class="card p-4 shadow-sm">
		  <table class="table">
			<thead class="table-dark">
			  <tr>
				<th scope="col">Id</th>
				<th scope="col">Orden ID</th>
				<th scope="col">Producto</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Precio</th>
				<th scope="col">Total</th>
                <th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($orderDetails as $detail)
                <tr>
					<td>{{ $detail->id }}</td>
                    <td>{{ $detail->order_id }}</td>
                    <td>{{ $detail->product->name }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->price }}</td>
                    <td>{{ $detail->total }}</td>
                    <td>
                        <a href="{{ route('order_details.edit', $detail) }}">
							<i class="fas fa-edit text-black text-center"></i> 							  
						</a>                        
                    </td>
					<td>						
						<form action="{{ route('order_details.destroy', $detail) }}" method="POST" style="display:inline;" id="delete-form">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-link p-0 border-0" onclick="return confirm('¿Estas seguro?')">
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