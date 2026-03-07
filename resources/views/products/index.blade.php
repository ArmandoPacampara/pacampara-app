<x-layout>
    <x-slot:heading>
        Products
    </x-slot:heading>

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
                                <td>
                                    <span class="badge bg-primary text-white">
                                        {{ ucfirst($product['category']) }}
                                    </span>
                                </td>
                            </tr>

                            @php
                                $lastProductKey = $productKey;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tasks -->
        <h1 class="mt-5">Tasks</h1>
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item">{{ $task }}</li>
            @endforeach
        </ul>

        <p class="mt-3">Global Variables:</p>
        <p>{{ $sharedVariable }}</p>

        <p>Product Key: {{ $lastProductKey }}</p>
    </div>
</x-layout>