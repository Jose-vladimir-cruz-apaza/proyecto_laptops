@include('Laptops.header')
<div class="container mt-5">	
    <h2 class="text-center mb-4">Crear orden</h2>							
</div>	
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="number" name="total_amount" id="total_amount" class="form-control" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-raised btn-sm">
                    <i class="zmdi zmdi-floppy"></i> Guardar
                </button>
            </p>
        </form>
        
    </div>
</div>

@include('Laptops.footer')