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
        <div class="col-md-3">
              <h5 class="mb-4">{{ $category->name }}</h5>
        </div>
        <div class="col-md-9">
            <!-- Filter Pills -->
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
        </div>
    </div>

    

    <div class="row">
        <!-- Sidebar with siblings (other subcategories of parent) -->
        <div class="col-md-3">
            @if($category->parent)
                <!-- <h4 class="mb-3">{{ $category->parent->name }}</h4> -->
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
          

            <div id="productsGrid">
                @include('frontend.shop.partials.products-grid', ['products' => $products])
            </div>
        </div>
    </div>
</div>



@include('partials.footer')
