<style>
    /* custom page styles */
    .products-container {
        max-width: 900px;
        margin: 0 auto;
    }
    .products-container h1 {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #444;
    }
    .products-container .card {
        border-radius: 8px;
    }
    .products-container table th,
    .products-container table td {
        vertical-align: middle;
    }
    .products-container .badge {
        font-size: 0.9rem;
    }
    /* table specific styles */
    .products-container table {
        border-collapse: separate;
        border-spacing: 0;
    }
    .products-container table thead th {
        background-color: #343a40;
        color: #fff;
        letter-spacing: 0.5px;
    }
    .products-container table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .products-container table tbody tr:hover {
        background-color: #e2e6ea;
    }
    .products-container table td, .products-container table th {
        padding: 0.75rem 1rem;
    }
    .products-container table {
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .tasks-title {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        color: #333;
    }
    /* task list styling */
    .tasks-list {
        max-width: 900px;
        margin: 1rem auto 2rem;
    }
    .tasks-list .list-group-item {
        display: flex;
        align-items: center;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        margin-bottom: 0.5rem;
        transition: background-color 0.2s;
    }
    .tasks-list .list-group-item:hover {
        background-color: #f1f3f5;
    }
    .tasks-list .list-group-item::before {
        content: '\2713'; /* checkmark */
        font-size: 0.9rem;
        color: #28a745;
        margin-right: 0.75rem;
    }
</style>

<div class="container mt-5 products-container">
    <h1 class="mb-4 text-center">Products</h1>
    
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    @php $lastProductKey = null; @endphp

                    @foreach($products as $productKey => $product)
                        <tr>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td><span class="badge bg-primary text-white">{{ ucfirst($product['category']) }}</span></td>
                        </tr>

                        @php
                            $lastProductKey = $productKey;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<h1 class="mt-5">Tasks</h1>
<ul class="list-group">
    @foreach ($tasks as $task)
        <li class="list-group-item">{{ $task }}</li>
    @endforeach
</ul>

<p>Global Variables:</p>
<p>{{ $sharedVariable }}</p>

<p>Product Key: {{ $lastProductKey }}</p>