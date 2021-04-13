<ul class="product-wrapper">
    @foreach ($products as $product)
        @if($product->alcohol != 0)
            @include('users.components.productUsage--alcohol')
        @else
            @include('users.components.productUsage--calories')
        @endif
    @endforeach
</ul>