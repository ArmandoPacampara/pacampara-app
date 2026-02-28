<h1>Product List</h1>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['category'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">No products found in the list.</td>
            </tr>
        @endforelse
    </tbody>
</table>
