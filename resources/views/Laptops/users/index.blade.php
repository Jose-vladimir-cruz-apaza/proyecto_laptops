@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Usuarios</h2>
		<div class="d-flex justify-content-start mb-4">
			<a href="{{ route('register') }}" class="btn btn-primary text-white">Agregar</a>
		</div>				
		<div class="card p-4 shadow-sm">
		  <table class="table">
			<thead class="table-dark">
			  <tr>
                <th>Id</th>
				<th>Nombre</th>
                <th>Email</th>
			  </tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
           		@endforeach
			  
			</tbody>
		  </table>
		</div>
	  </div>		
@include('Laptops.footer')