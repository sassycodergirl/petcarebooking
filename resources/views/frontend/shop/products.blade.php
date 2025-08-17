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
    <div class="row">
        <!-- Sidebar with siblings (other subcategories of parent) -->
        <div class="col-md-3">
            @if($category->parent)
                <h4 class="mb-3">{{ $category->parent->name }}</h4>
                <ul class="list-group">
                    @foreach($category->parent->children as $sibling)
                        <li class="list-group-item {{ $sibling->id === $category->id ? 'active' : '' }}">
                            <a href="{{ route('shop.category', $sibling->slug) }}" class="{{ $sibling->id === $category->id ? 'text-white' : '' }}">
                                {{ $sibling->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Products list -->
        <div class="col-md-9">
            <h2 class="mb-4">{{ $category->name }}</h2>

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



@include('partials.footer')