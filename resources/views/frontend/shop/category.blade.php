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
<section class="banner inner-banner container">
      <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}">Home</a></li>
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
        <div class="col-md-3">
              <h5 class="mb-4">Explore {{ $category->name }}</h5>
       
        </div>
        <div class="col-md-9">
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
           

            <div id="productsGrid">
                @if($products->count())
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    @if($product->image)
                                    <div class="product-img">
                                        <img src="{{ asset('public/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                                    </div>
                                    @endif
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">₹{{ $product->price }}</p>
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
