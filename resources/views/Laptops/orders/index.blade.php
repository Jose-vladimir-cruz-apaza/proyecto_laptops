@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Ordenes</h2>
		<div class="d-flex justify-content-start mb-4">
			<a href="{{ route('orders.create') }}" class="btn btn-primary text-white">Agregar</a>
		</div>				
		<div class="card p-4 shadow-sm">
		  <table class="table">
			<thead class="table-dark">
			  <tr>
				<th scope="col">Id</th>
				<th scope="col">Usuario</th>
				<th scope="col">Monto total</th>
				<th scope="col">Estado</th>
                <th scope="col">Editar</th>
				<th scope="col">Eliminar</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
                <tr>
					<td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_amount }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('orders.edit', $order) }}">
							<i class="fas fa-edit text-black text-center"></i> 							  
						</a>                        
                    </td>
					<td>						
						<form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;" id="delete-form">
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