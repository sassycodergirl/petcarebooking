@include('partials.header')

<section class="banner inner-banner container px-4 px-md-5">
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

<section class="product-section">
    <div class="container">
        <div class="row">
            <!-- LEFT SIDEBAR - PARENT CATEGORIES AS TABS -->
            <div class="col-3 col-md-3 col-lg-3 prdct-col-menu">
                <div class="prdct-col-menu-wrap">
                    <h1>Product Categories</h1>
                    <div class="prdct-list">
                        <ul class="nav flex-column nav-pills" id="categoryTabs" role="tablist">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#all" role="tab">
                                    All
                                </a>
                            </li>
                            @foreach($categories as $parent)
                                <li>
                                    <a class="nav-link" data-bs-toggle="pill" href="#cat-{{ $parent->id }}" role="tab">
                                        {{ $parent->name }}
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
                                    <div class="col-6 col-md-4 col-lg-4 col-sm-6">
                                        <div class="product-card-col">
                                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="product-card-img">
                                                @if($subcategory->image)
                                                    <img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
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
                                @endforeach
                            @endforeach
                        </div>
                    </div>

                    {{-- INDIVIDUAL PARENT CATEGORY TABS --}}
                    @foreach($categories as $parent)
                        <div class="tab-pane fade" id="cat-{{ $parent->id }}" role="tabpanel">
                            <div class="row">
                                @forelse($parent->children as $subcategory)
                                    <div class="col-6 col-md-4 col-lg-4 col-sm-6">
                                        <div class="product-card-col">
                                            <a href="{{ route('shop.category', $subcategory->slug) }}" class="product-card-img">
                                                @if($subcategory->image)
                                                    <img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@include('partials.footer')
