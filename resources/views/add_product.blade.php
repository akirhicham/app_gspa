<x-layout>

    <form action="{{ route('create_product') }}" method="post" class="container mt-4">
        @csrf
    
        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product:</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        @error('product_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="weight_quantity" class="form-label">Weight/Quantity:</label>
            <input type="number" name="weight_quantity" id="weight_quantity" class="form-control" step="0.01" required>
        </div>
        @error('weight_quantity')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <div class="mb-3">
            <label for="expiration_date" class="form-label">Expiration Date:</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" required>
        </div>
        @error('expiration_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    <div class="text-md-center">
        <button type="submit" class="btn btn-primary">Add Product</button>
    </div>
    </form>
   <!-- Display  stock products -->
   @if (count($stockEntries) > 0)
   <div class="container mt-4">
       <h2>Stock</h2>
       <table class="table">
           <thead>
               <tr>
                   <th scope="col">Product</th>
                   <th scope="col">Weight/Quantity</th>
                   <th scope="col">Expiration Date</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($stockEntries as $entry)
                   <tr>
                       <td>{{ $entry->product->name }}</td>
                       <td>{{ $entry->weight_quantity }}</td>
                       <td>{{ $entry->expiration_date }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
@endif
</x-layout>
