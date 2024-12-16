@include('Laptops.header')
<div class="container mt-5">	
    <h2 class="text-center mb-4">Editar orden</h2>							
</div>	
<div class="row">
    <div class="col-xs-12 col-md-10 col-md-offset-1">
        <form action="{{ route('orders.update', $order) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="total_amount">Total Amount</label>
                <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ $order->total_amount }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                    <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success text-white">Update</button>
        </form>        
    </div>
</div>

@include('Laptops.footer')