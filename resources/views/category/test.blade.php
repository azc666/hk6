<h2> {{ $category->cat_name }} </h2>

@if ($category->products->count())
    @foreach($category->products as $product)
        <div class="product">
            <h3> {{ $product->prod_name }} </h3>
            <p>${{ number_format($product->price,2) }}</p>
        </div>
    @endforeach
@endif