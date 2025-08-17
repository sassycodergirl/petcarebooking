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

<section class="product-section">
    <div class="container">
        <div class="row">
            {{-- LEFT SIDEBAR - PARENT CATEGORIES --}}
            <div class="col-lg-3 prdct-col-menu">
                <div class="prdct-col-menu-wrap">
                    <h1>Product Categories</h1>
                    <div class="prdct-list">
                        <ul>
                            <li class="active">
                                <a href="{{ route('shop.index') }}">All</a>
                            </li>
                            @foreach($categories as $parent)
                                <li>
                                    <a href="{{ route('shop.parent', $parent->slug) }}">
                                        {{ $parent->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- RIGHT CONTENT - CHILD CATEGORIES OF ALL PARENTS --}}
            <div class="col-lg-9 prdct-col-list">
                <div class="row">
                    @foreach($categories as $parent)
                        @foreach($parent->children as $subcategory)
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-card-col">
                                    <a href="{{ route('shop.subcategory', [$parent->slug, $subcategory->slug]) }}" class="product-card-img">
                                        @if($subcategory->image)
                                            <img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->name }}">
                                        @else
                                            <img src="{{ asset('images/default-category.png') }}" alt="{{ $subcategory->name }}">
                                        @endif
                                    </a>
                                    <h3>
                                        <a href="{{ route('shop.subcategory', [$parent->slug, $subcategory->slug]) }}">
                                            {{ $subcategory->name }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="daycare-card">
    <div class="container">
        <div class="daycare-card-wrap">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="daycare-card-cont">
                        <h2>Book Our Daycare - A Safe, Loving Space for Your Pet</h2>
                        <p>Leave your furry friend in trusted hands. Our daycare offers comfort, play, and
                            personalized care while you're away—because they deserve the best, even when you're
                            busy.</p>
                        <div class="banner-cont-button">
                            <a href="#" class="cmn-btn" data-content="Book Day Care"><span>Book Day Care</span></a>
                            <a href="#" class="cmn-btn-border" data-content="Join The Community"><span>Join The
                                    Community</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="daycare-card-img">
                        <div class="daycare-card-img-main">
                            <img src="{{ asset('images/daycare-dg-ct.png') }}" alt="Dog and Cat Together">
                        </div>
                        <img src="{{ asset('images/daycare-dg-ct-ovr.png') }}" class="daycare-dg-ct-ovr" alt="Overlay">
                    </div>
                </div>
            </div>
            <img src="{{ asset('images/daycare-dg-ct-ovr-two.png') }}" class="daycare-dg-ct-ovr-two" alt="">
        </div>
    </div>
</section>

@include('partials.footer')
