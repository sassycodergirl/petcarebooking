@include('partials.header')
@php
    $breadcrumbs = [];
    $current = $category;
    while($current) {
        $breadcrumbs[] = $current;
        $current = $current->parent;
    }
    $breadcrumbs = array_reverse($breadcrumbs);
@endphp
<section class="banner inner-banner container-fluid px-md-5">
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
            @foreach($breadcrumbs as $crumb)
                @if($loop->last)
                    <li class="breadcrumb-item active" aria-current="page">{{ $crumb->name }}</li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ route('shop.category', $crumb->slug) }}">{{ $crumb->name }}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
    <div class="js-product-banner">
        <div class="product-banner-col">
            <div class="product-banner-image">
                <img src="{{ asset('images/shop-banner.webp') }}" alt="">
            </div>
        </div>
        
    </div>
</section>

<div class="container-fluid py-5 px-md-5">

<div class="row">
        <div class="col-3 col-md-3">
              <h5 class="mb-4">Explore {{ $category->name }}</h5>
       
        </div>
        <div class="col-9 col-md-9">
              <!-- Filter Pills -->
                @if($category->is_food)
                    <div class="mb-4">
                        <h5>Filter by:</h5>
                        <div class="btn-group" role="group" aria-label="Attributes">
                            @foreach(\App\Models\Attribute::all() as $attribute)
                                <!-- <input type="checkbox" class="filter-attribute" value="{{ $attribute->id }}" id="attr-{{ $attribute->id }}">
                                <label for="attr-{{ $attribute->id }}" class="btn btn-outline-primary">
                                    {{ $attribute->name }}
                                </label> -->

                                <label class="switch">
                                    <input type="checkbox" class="filter-attribute" value="{{ $attribute->id }}" id="attr-{{ $attribute->id }}">
                                    <span class="slider"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif
        </div>
    </div>

  

    <div class="row">
        <!-- Sidebar with parent & subcategories -->
      <!-- Sidebar with categories -->
        <div class="col-3 col-md-3 sticky-product-cat">
            <!-- <h4 class="mb-3">{{ $category->parent ? $category->parent->name : $category->name }}</h4> -->
            <ul class="list-group prdct-list">
                {{-- Always show parent category as first item --}}
                @if($category->parent)
                    <li class="cat-pill cat-pill-top {{ request()->url() == route('shop.category', $category->parent->slug) ? 'active' : '' }}">
                        <a href="{{ route('shop.category', $category->parent->slug) }}" class="{{ request()->url() == route('shop.category', $category->parent->slug) ? 'text-white' : '' }}">
                        @if($category->parent->image)
                            <img src="{{ asset($category->parent->image) }}" alt="" class="me-2" style="width: 25px; height: 25px; object-fit: cover; border-radius: 4px;">
                        @endif  
                        <div> All {{ $category->parent->name }}</div>
                        </a>
                    </li>
                @endif

                @if($category->parent)
                    {{-- If this is a child category, show all siblings sorted by name --}}
                    @foreach($category->parent->children->sortBy('name') as $sibling)
                        <li class="cat-pill text-black {{ $sibling->id === $category->id ? 'active' : '' }}">
                            <a href="{{ route('shop.category', $sibling->slug) }}" class="{{ $sibling->id === $category->id ? 'text-white' : '' }}">
                                @if($sibling->image)
                                    <img src="{{ asset($sibling->image) }}" alt="" class="me-2" style="width: 25px; height: 25px; object-fit: cover; border-radius: 4px;">
                                @endif    
                                <div>{{ $sibling->name }}</div>
                            </a>
                        </li>
                    @endforeach
                @elseif($subcategories->count())
                    {{-- If this is a parent category, show "All" + subcategories sorted by name --}}
                    <li class="cat-pill at-pill-top text-black {{ request()->url() == route('shop.category', $category->slug) ? 'active' : '' }}">
                        <a href="{{ route('shop.category', $category->slug) }}" class="{{ request()->url() == route('shop.category', $category->slug) ? 'text-white' : '' }}">
                            @if($category->image)
                                <img src="{{ asset($category->image) }}" alt="" class="me-2" style="width: 25px; height: 25px; object-fit: cover; border-radius: 4px;">
                            @endif
                            <div>All {{ $category->name }}</div>
                        </a>
                    </li>
                    @foreach($subcategories->sortBy('name') as $subcategory)
                        <li class="cat-pill text-black {{ request()->url() == route('shop.category', $subcategory->slug) ? 'active' : '' }}">
                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="{{ request()->url() == route('shop.category', $subcategory->slug) ? 'text-white' : '' }}">
                                @if($subcategory->image)
                                    <img src="{{ asset($subcategory->image) }}" alt="" class="me-2" style="width: 25px; height: 25px; object-fit: cover; border-radius: 4px;">
                                @endif
                                <div> {{ $subcategory->name }}</div>
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>


        </div>


        <!-- Products list -->
        <div class="col-9 col-md-9">
           

            <div id="productsGrid">
                @if($products->count())
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-md-3 mb-4 new-product pb-0">
                                <div class="product-card-col p-0 shadow-sm">
                                    @if($product->image)
                                    <a href="{{ route('product.show', $product->slug) }}" class="product-card-img p-0">
                                    <div class="product-img h-100">

                                        <img src="{{$product->image }}" class="img-fluid h-100" alt="{{ $product->name }}">
                                        @if($product->stock_quantity <= 0 || !$product->status)
                                            <div class="out-of-stock-banner">Out of Stock</div>
                                        @endif
                                    </div>
                                    </a>
                                    @endif
                                    <div class="card-body text-center">
                                        <h3><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a></h3>
                                        <div class="">
                                            <!-- <p class="card-text">₹{{ $product->price }}</p> -->
                                            <p class="card-text">
                                                @if ($product->variants_count > 0 && $product->variants_min_price !== null)
                                                    {{-- Product has variants, show the lowest price --}}
                                                    From ₹{{ number_format($product->variants_min_price) }}
                                                @else
                                                    {{-- Product has no variants, show base price --}}
                                                    ₹{{ number_format($product->price) }}
                                                @endif
                                            </p>

                                                <!-- @if($product->has_variants)
                                                    <a href="{{ route('product.show', $product->slug) }}" class="choose-option">
                                                        Choose Option
                                                    </a>
                                                @else
                                                    <button class="add-to-bag cd-button"
                                                            data-id="{{ $product->id }}"
                                                            data-name="{{ $product->name }}"
                                                            data-price="{{ $product->price }}"
                                                            data-image="{{ asset('public/' . $product->image) }}">
                                                        <img class="d-none d-md-block" src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart
                                                    </button>
                                                @endif -->
                                                   @if($product->stock_quantity <= 0 || !$product->status)
                                                        <button class="btn btn-secondary" disabled>Out of Stock</button>
                                                    @elseif($product->has_variants)
                                                        <a href="{{ route('product.show', $product->slug) }}" class="choose-option">
                                                            Choose Option
                                                        </a>
                                                    @else
                                                        <button class="add-to-bag cd-button"
                                                                data-id="{{ $product->id }}"
                                                                data-name="{{ $product->name }}"
                                                                data-price="{{ $product->price }}"
                                                                data-image="{{ asset('public/' . $product->image) }}">
                                                            <img class="d-none d-md-block" src="{{ asset('images/bag-icon.svg') }}" alt=""> Add to Cart
                                                        </button>
                                                    @endif
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

        let url = "{{ url('/collections') }}/" + categorySlug + "?attributes=" + selectedAttributes.join(',');
        fetch(url, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(res => res.text())
        .then(html => {
            document.getElementById('productsGrid').innerHTML = html;
        });
    });
});
</script>



