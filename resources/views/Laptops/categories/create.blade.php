@include('Laptops.header')
	<div class="container mt-5">	
		<h2 class="text-center mb-4">Crear Categoria</h2>							
	</div>	
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group label-floating">
                    <label for="name" class="control-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
            
                <div class="form-group label-floating">
                    <label for="description" class="control-label">Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>                                        
                <p class="text-center">
                    <button type="submit" class="btn btn-info btn-raised btn-sm">
                        <i class="zmdi zmdi-floppy"></i> Save
                    </button>
                </p>
            </form>
            
        </div>
    </div>

	<!-- Dialog help -->	
@include('Laptops.footer')