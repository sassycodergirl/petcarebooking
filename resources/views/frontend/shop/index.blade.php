@include('partials.header')

{{-- Banner Section --}}
<section class="banner inner-banner">
    <div class="js-product-banner">
        {{-- You can later make this dynamic (CMS / DB banners), for now keeping static --}}
        @for($i = 0; $i < 5; $i++)
            <div class="product-banner-col">
                <div class="product-banner-image">
                    <img src="{{ asset('images/product-banner.jpg') }}" alt="Product Banner">
                </div>
            </div>
        @endfor
    </div>
</section>

{{-- Product Section --}}
<section class="product-section">
    <div class="container">
        <div class="row">
            
            {{-- Sidebar Categories --}}
            <div class="col-lg-3 prdct-col-menu">
                <div class="prdct-col-menu-wrap">
                    <h1>Product Categories</h1>
                    <div class="prdct-list">
                        <ul>
                            <li class="{{ !isset($category) ? 'active' : '' }}">
                                <a href="{{ route('shop.index') }}">All</a>
                            </li>
                            @foreach($categories as $cat)
                                <li class="{{ isset($category) && $category->id === $cat->id ? 'active' : '' }}">
                                    <a href="{{ route('shop.category', $cat->slug) }}">{{ $cat->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Product Grid --}}
            <div class="col-lg-9 prdct-col-list">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="product-card-col">
                                <a href="{{ route('product.show', $product->slug) }}" class="product-card-img">
                                    <img src="{{ asset($product->thumbnail ?? 'images/placeholder.png') }}" 
                                         alt="{{ $product->name }}">
                                </a>
                                <h3>
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p>
                                    @if($product->old_price)
                                        <del>₹{{ number_format($product->old_price) }}</del>
                                    @endif
                                    ₹{{ number_format($product->price) }}
                                </p>
                                <button class="add-to-bag cd-button">
                                    <img src="{{ asset('images/bag-icon.svg') }}" alt="Bag">
                                    Add to Bag
                                </button>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">No products found.</p>
                    @endforelse
                </div>

                {{-- Pagination --}}
                <div class="pagination">
                   {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Extra CTA Section (Daycare) --}}
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
                            <a href="#" class="cmn-btn"><span>Book Day Care</span></a>
                            <a href="#" class="cmn-btn-border"><span>Join The Community</span></a>
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
