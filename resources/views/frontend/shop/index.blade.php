@include('partials.header')

{{-- Banner Section --}}
<section class="banner inner-banner">
    <div class="js-product-banner">
        @for($i = 0; $i < 5; $i++)
            <div class="product-banner-col">
                <div class="product-banner-image">
                    <img src="{{ asset('images/product-banner.jpg') }}" alt="Product Banner">
                </div>
            </div>
        @endfor
    </div>
</section>


@section('content')
<div class="container">
    <h1 class="mb-4">Shop by Category</h1>

    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-3 mb-4">
                <a href="{{ route('shop.parent', $category->slug) }}" class="card h-100 text-decoration-none">
                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top" alt="{{ $category->name }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection

{{-- Extra CTA Section --}}
<section class="daycare-card">
    <div class="container">
        <div class="daycare-card-wrap">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="daycare-card-cont">
                        <h2>Book Our Daycare - A Safe, Loving Space for Your Pet</h2>
                        <p>Leave your furry friend in trusted hands. Our daycare offers comfort, play, and personalized care while you're away—because they deserve the best, even when you're busy.</p>
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
