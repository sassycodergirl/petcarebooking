@include('partials.header')



<section class="banner inner-banner container-fluid px-4 px-md-5">
      <nav aria-label="breadcrumb" class="my-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">collections</li>
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

<section class="product-section py-4">
    <div class="container-fluid  px-md-5">
        <div class="row">
            <!-- LEFT SIDEBAR - PARENT CATEGORIES AS TABS -->
            <div class="col-3 col-md-3 col-lg-3 prdct-col-menu sticky-product-cat ">
                <div class="prdct-col-menu-wrap">
                    <h1>Collection List</h1>
                    <div class="prdct-list ">
                        <ul class="nav flex-column nav-pills" id="categoryTabs" role="tablist">
                            <li>
                                <a class="nav-link active cat-pill cat-pill-top text-black" data-bs-toggle="pill" href="#all" role="tab">
                                   <img src="{{ asset('images/all.webp') }}" 
                                                alt="" 
                                                class="me-2 cat-img-pill"> 
                                 <div>All</div>
                                </a>
                            </li>
                            @foreach($categories as $parent)
                                <li>
                                    <!-- <a class="nav-link" data-bs-toggle="pill" href="#cat-{{ $parent->id }}" role="tab">
                                        {{ $parent->name }}
                                    </a> -->
                                    <a class="nav-link cat-pill text-black" data-bs-toggle="pill" href="#cat-{{ $parent->id }}" role="tab">
                                        @if($parent->image)
                                            <img src="{{ asset('public/' .$parent->image) }}" 
                                                alt="{{ $parent->name }}" 
                                                class="me-2 cat-img-pill">
                                        @endif
                                        <div>{{ $parent->name }}</div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- RIGHT CONTENT - TAB PANES -->
            <div class="col-9 col-md-9 col-lg-9 prdct-col-list">
                <div class="tab-content" id="categoryTabsContent">

                    {{-- ALL TAB (shows all subcategories from all parents) --}}
                    <div class="tab-pane fade show active" id="all" role="tabpanel">
                        <div class="row">
                            @foreach($categories as $parent)
                                @foreach($parent->children as $subcategory)
                                    <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-2">
                                        <div class="product-card-col p-0">
                                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="product-card-img">
                                                @if($subcategory->image)
                                                    <img src="{{ asset('public/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                                                @else
                                                    <img src="{{ asset('images/default-category.png') }}" alt="{{ $subcategory->name }}">
                                                @endif
                                            </a>
                                            <div class="text-center">
                                                <a class="p-name" href="{{ route('shop.category', $subcategory->slug) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                                 <!-- <div>
                                                    <a href="{{ route('shop.category', $subcategory->slug) }}" class="btn explore-btn">View Products</a>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    <!-- {{-- INDIVIDUAL PARENT CATEGORY TABS --}}
                    @foreach($categories as $parent)
                        <div class="tab-pane fade" id="cat-{{ $parent->id }}" role="tabpanel">
                            <div class="row">
                                @forelse($parent->children as $subcategory)
                                    <div class="col-6 col-md-4 col-lg-4 col-sm-6">
                                        <div class="product-card-col">
                                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="product-card-img">
                                                @if($subcategory->image)
                                                    <img src="{{ asset('public/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                                                @else
                                                    <img src="{{ asset('images/default-category.png') }}" alt="{{ $subcategory->name }}">
                                                @endif
                                            </a>
                                            <h3>
                                                <a href="{{ route('shop.category', $subcategory->slug) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </h3>
                                        </div>
                                    </div>
                                @empty
                                    <p>No subcategories under {{ $parent->name }}.</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach -->

                    {{-- INDIVIDUAL PARENT CATEGORY TABS --}}
                    @foreach($categories as $parent)
                        <div class="tab-pane fade" id="cat-{{ $parent->id }}" role="tabpanel">
                            <div class="row">

                                {{-- First, check if there are any subcategories (children) --}}
                                @if($parent->children->isNotEmpty())
                                    @foreach($parent->children as $subcategory)
                                        <div class="col-6 col-md-3 col-lg-3 col-sm-6 p-2">
                                            <div class="product-card-col p-0">
                                                {{-- Display SUBCATEGORY card --}}
                                                <a href="{{ route('shop.category', $subcategory->slug) }}" class="product-card-img">
                                                    @if($subcategory->image)
                                                        <img src="{{ asset('public/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                                                    @else
                                                        <img src="{{ asset('images/default-category.png') }}" alt="{{ $subcategory->name }}">
                                                    @endif
                                                </a>
                                                <div class="text-center">
                                                    <a class="p-name" href="{{ route('shop.category', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                                                    <!-- <div>
                                                        <a href="{{ route('shop.category', $subcategory->slug) }}" class="btn explore-btn">View Products</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                
                                {{-- If no children, THEN check if there are any products --}}
                                @elseif($parent->products->isNotEmpty())
                                    @foreach($parent->products as $product)
                                        <div class="col-6 col-md-3 col-lg-3 col-sm-6">
                                            <div class="product-card-col p-0">
                                                {{-- Display PRODUCT card (note the different route and variables) --}}
                                                <a href="{{ route('product.show', $product->slug) }}" class="product-card-img">
                                                    @if($product->image)
                                                        <img src="{{ asset('public/' . $product->image) }}" alt="{{ $product->name }}">
                                                    @else
                                                        <img src="{{ asset('images/default-product.png') }}" alt="{{ $product->name }}">
                                                    @endif
                                                </a>
                                                <div class="p-2 p-md-3 text-center">
                                                    <a class="p-name" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                    <div>
                                                        <a href="{{ route('product.show', $product->slug) }}" class="btn explore-btn">Choose Option</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                {{-- If there are no children AND no products, show a message --}}
                                @else
                                    <div class="col-12">
                                        <p>No items found in {{ $parent->name }}.</p>
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
