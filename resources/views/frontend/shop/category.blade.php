@include('partials.header')

<section class="banner inner-banner">
    <div class="js-product-banner">
        <div class="product-banner-col">
            <div class="product-banner-image">
                <img src="{{ asset('images/product-banner.jpg') }}" alt="">
            </div>
        </div>
        <div class="product-banner-col">
            <div class="product-banner-image">
                <img src="{{ asset('images/product-banner.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>

<div class="container py-5">

    <!-- Filter Pills -->
    @if($category->is_food)
        <div class="mb-4">
            <h5>Filter by:</h5>
            <div class="btn-group" role="group" aria-label="Attributes">
                @foreach(\App\Models\Attribute::all() as $attribute)
                    <input type="checkbox" class="filter-attribute" value="{{ $attribute->id }}" id="attr-{{ $attribute->id }}">
                    <label for="attr-{{ $attribute->id }}" class="btn btn-outline-primary">
                        {{ $attribute->name }}
                    </label>
                @endforeach
            </div>
        </div>
    @endif

    <div class="row">
        <!-- Sidebar with parent & subcategories -->
        <div class="col-md-3">
            <h4 class="mb-3">{{ $category->name }}</h4>
            <ul class="list-group">
                @if($subcategories->count())
                    <li class="list-group-item {{ request()->url() == route('shop.category', $category->slug) ? 'active' : '' }}">
                        <a href="{{ route('shop.category', $category->slug) }}" class="{{ request()->url() == route('shop.category', $category->slug) ? 'text-white' : '' }}">
                            All {{ $category->name }}
                        </a>
                    </li>
                    @foreach($subcategories as $subcategory)
                        <li class="list-group-item {{ request()->url() == route('shop.category', $subcategory->slug) ? 'active' : '' }}">
                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="{{ request()->url() == route('shop.category', $subcategory->slug) ? 'text-white' : '' }}">
                                {{ $subcategory->name }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <!-- Products list -->
        <div class="col-md-9">
            <h2 class="mb-4">Explore {{ $category->name }}</h2>

            <div id="productsGrid">
                @if($products->count())
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                    @endif
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">₹{{ $product->price }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                @else
                    <p>No products available in this category.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@include('partials.footer')

<script>
document.querySelectorAll('.filter-attribute').forEach(el => {
    el.addEventListener('change', function() {
        let selectedAttributes = Array.from(document.querySelectorAll('.filter-attribute:checked'))
                                    .map(el => el.value);

        let categorySlug = "{{ $category->slug }}";

        fetch(`/collections/${categorySlug}?attributes=${selectedAttributes.join(',')}`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('productsGrid').innerHTML = html;
        });
    });
});
</script>
