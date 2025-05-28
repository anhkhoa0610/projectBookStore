<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <title>Bookshop</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

       
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    <nav class="navbar">
        <a class="logo" href="#">
            <img src="{{ asset('images/rsz_logo.png') }}" alt="">
        </a>
        <div class="search-box">
            <form class="d-flex position-relative" role="search" action="">
                <input class="form-control me-2 input-search" type="search" placeholder="Search" aria-label="Search"
                    name="q">
                <i class="fas fa-search mt-2 me-1" style="font-size: 1rem;"></i>

                <ul class="list-group suggest position-absolute start-0 end-0 top-100 bg-white" style="z-index: 10;">

                </ul>
            </form>
        </div>
        <div class="nav-links">
            @auth
                <span class="user-name mx-5">Xin chào <b class="text-primary">{{ Auth::user()->full_name }}</b></span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger"><b>Log Out</b></button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary"><b>Sign In</b></a>
                <a href="{{ route('user.createUser') }}" class="btn btn-primary"><b>Sign Up</b></a>
            @endauth
            <div class="cart">
                <a href="" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>

    <div>

        <body>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="collapsibleNavbar">
                        <ul class="navbar-nav ">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#best-seller">Bán Chạy Nhất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#new-book">Sách Mới Nhất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tài Khoản</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </body>
    </div>


    <div>
        <div class="nav-slider mt-5">
            <div class="nav-slides">
                <div class="nav-slide">
                    <div class="slide_img"><img src="{{ asset('images/ngoaivan.png') }}" alt=""></div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="{{ asset('images/muasamkhongtienmat.png') }}" alt=""></div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="{{ asset('images/hotpick.png') }}" alt=""></div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="{{ asset('images/thuctinh.png') }}" alt=""></div>
                </div>
            </div>

        </div>
    </div>



    <div class="container">
        <!-- Left side -->
        <div class="card left cardLeft">
            <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Book img" class="main-img" width="280"
                height="400" />

            <div class="btn-group">
                <button type="button" class="btn-cart">
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                </button>

            </div>

            <div class="btn-group">
                <div class="btn-group">
                    <button id="wishlist-btn" class="btn-cart" style="color: {{ $bookWishList ? '#f0b90b' : '' }};"
                        data-in-wishlist="{{ $bookWishList ? '1' : '0' }}">
                        <i class="{{ $bookWishList ? 'fas' : 'far' }} fa-star"></i>
                        <span
                            id="wishlist-text">{{ $bookWishList ? 'Remove from wish list' : 'Add to wish list' }}</span>
                    </button>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const btn = document.getElementById('wishlist-btn');
                    if (!btn) return;
                    btn.addEventListener('click', function () {
                        fetch('{{ route('wishlist.toggle') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ book_id: {{ $book->book_id }} })
                        })
                            .then(res => res.json())
                            .then(data => {
                                if (data.status === 'added') {
                                    btn.style.color = '#f0b90b';
                                    btn.querySelector('i').className = 'fas fa-star';
                                    document.getElementById('wishlist-text').textContent = 'Remove from wish list';
                                    btn.setAttribute('data-in-wishlist', '1');
                                } else if (data.status === 'removed') {
                                    btn.style.color = '';
                                    btn.querySelector('i').className = 'far fa-star';
                                    document.getElementById('wishlist-text').textContent = 'Add to wish list';
                                    btn.setAttribute('data-in-wishlist', '0');
                                }
                            });
                    });
                });
            </script>

            <div class="details-grid">
                <strong>Thông tin chi tiết:</strong>
                <br>

                <div class="label">Mã sách:</div>
                <div class="value">{{$book->book_id }}</div>
                <div class="label">Tên Nhà Cung Cấp:</div>
                <div class="value">
                    <p style=" font-weight: bold">{{$book->publisher->publisher_name}}</p>
                </div>
                <div class="label">Tác giả:</div>
                <div class="value">{{ $book->author->author_name }}</div>
                <div class="label">rating:</div>

                <div class="">
                    @if($book->reviews->avg('rating'))
                        <span class="rating">
                            @for ($i = 0; $i < floor($book->reviews->avg('rating')); $i++)
                                <i class="fas fa-star text-warning"></i>

                            @endfor
                        </span>
                    @else
                        <span class="rating">No Reviews</span>
                    @endif
                </div>
            </div>
        </div>
        <!-- Right side -->
        <div class="card right">
            <div>
                <h1 class="title">{{ $book->title}}</h1>
                <div class="info-row">
                    <div>
                        <p> Nhà cung cấp:</p>
                        <p style=" font-weight: bold">{{$book->publisher->publisher_name}}</p>
                    </div>

                </div>
                <div class="info-row">
                    <div>
                        Tác giả: <strong>{{ $book->author->author_name }}</strong>
                    </div>
                </div>
                <div class="info-row">
                    Danh mục:
                    <div>
                        @foreach ($book->categories as $category)
                            <span class="badge bg-secondary">{{ $category->category_name }}</span>
                        @endforeach
                    </div>

                </div>

            </div>


            <div class="price-row">
                <div class="price-current" id="price-current">
                    {{ $book->price }}<span>đ</span>
                </div>
                <!-- <div class="price-old" aria-label="Old price 118,000 đồng">118.000</div>
                <div class="price-discount" aria-label="30 percent discount">-30%</div> -->
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const input = document.getElementById('quantity-input');
                    const btnMinus = document.getElementById('decrease-btn');
                    const btnPlus = document.getElementById('increase-btn');
                    const priceCurrent = document.getElementById('price-current');
                    const min = 1;
                    const max = 99;

                    // Lưu giá gốc (chuyển về số)
                    const basePrice = document.querySelector('.price-current').textContent.replace(/\D/g, '');

                    // Hàm định dạng lại giá
                    function formatPrice(price) {
                        return price.toLocaleString('vi-VN') + ' đ';
                    }

                    // Hàm cập nhật giá
                    function updatePrice() {
                        const quantity = parseInt(input.value, 10);
                        priceCurrent.textContent = formatPrice(basePrice * quantity);
                    }

                    btnMinus.addEventListener('click', function () {
                        let value = parseInt(input.value, 10);
                        if (value > min) {
                            input.value = value - 1;
                            updatePrice();
                        }
                    });

                    btnPlus.addEventListener('click', function () {
                        let value = parseInt(input.value, 10);
                        if (value < max) {
                            input.value = value + 1;
                            updatePrice();
                        }
                    });

                    // Khởi tạo giá đúng khi load trang
                    updatePrice();
                });
            </script>


            <div class="stock-info">
                kho sách còn:
            </div>
            <div class="stock-info">
                Đã bán: {{ $book->volume_sold }}
            </div>


            <div class="shipping-info">
                <div><strong>Thông tin vận chuyển</strong></div>
                <div class="shipping-address">
                    @auth
                        <p>Giao hàng đến: </p>
                        <p style=" font-weight: bold">{{ Auth::user()->address }}</p>
                    @else
                        <span>Vui lòng đăng nhập để xem địa chỉ giao hàng</span>
                    @endauth
                </div>


                <!-- <div class="related-offers">
                    <span>Ưu đãi liên quan</span>
                    <a href="#">Xem thêm <i class="fas fa-chevron-right"></i></a>
                </div> -->

                <div class="quantity" aria-label="Quantity selector">
                    <label for="quantity-input">Số lượng:</label>
                    <div class="quantity-controls">
                        <button type="button" aria-label="Decrease quantity" id="decrease-btn">−</button>
                        <input id="quantity-input" type="text" value="1" readonly />
                        <button type="button" aria-label="Increase quantity" id="increase-btn">+</button>
                    </div>
                </div>
            </div>


            <div class="card">
                <h2>Mô tả sách:</h2>

                <div id="content">
                    <p>
                        {{ $book->description }}
                    </p>
                    <div id="fade"></div>
                </div>

                <button id="toggle">Xem thêm</button>
            </div>

            <script>
                const toggleBtn = document.getElementById("toggle");
                const content = document.getElementById("content");
                const fade = document.getElementById("fade");
                let expanded = false;

                toggleBtn.addEventListener("click", () => {
                    expanded = !expanded;
                    content.style.maxHeight = expanded ? "1000px" : "130px";
                    fade.style.display = expanded ? "none" : "block";
                    toggleBtn.textContent = expanded ? "Thu gọn" : "Xem thêm";
                });
            </script>

        </div>
    </div>

    <!-- review container  -->
    <div class="review-container">
        <div class="review-header-top">
            <h3>Đánh giá sản phẩm</h3>
           @auth
             <button class="write-review-btn" onclick="toggleReviewForm()">
             <i class="fas fa-pen"></i> Viết đánh giá
             </button>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="write-review-btn" style="text-decoration: none;" >
                <i class="fas fa-pen"></i> <b>Đăng nhập để viết đánh giá</b>
            </a>
            @endguest
        </div>

        <!-- form review -->
        <div id="review-form" class="review-form-modal" style="display: none;">
            <div class="review-form-content">
                <h4>VIẾT ĐÁNH GIÁ SẢN PHẨM</h4>

                <div class="stars" id="review-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="far fa-star star" data-value="{{ $i }}"></i>
                    @endfor
                </div>
                <input type="hidden" name="rating" id="rating-value" value="0">

                <div class="form-group">
                   
                    <input type="text"
                     placeholder="Nhập tên sẽ hiển thị khi đánh giá"
                      name="display_name"
                      id="display-name"
                      value="@auth{{ Auth::user()->full_name }}@endauth"
                     @auth readonly @endauth
                    >
                </div>

                <textarea id="comment-text" placeholder="Nhập nhận xét của bạn về sản phẩm"></textarea>

                <div class="form-actions">
                    <button onclick="toggleReviewForm()">Hủy</button>
                    <button class="submit-btn" onclick="submitReview({{ $book->book_id }})" >Gửi nhận xét</button>
                </div>
            </div>
        </div>

        <!-- form review script -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const stars = document.querySelectorAll('#review-stars .star');
                const ratingInput = document.getElementById('rating-value');
                let currentRating = 0;

                stars.forEach(star => {
                    star.addEventListener('mouseover', function () {
                        const val = parseInt(this.getAttribute('data-value'));
                        highlightStars(val);
                    });
                    star.addEventListener('mouseout', function () {
                        highlightStars(currentRating);
                    });
                    star.addEventListener('click', function () {
                        currentRating = parseInt(this.getAttribute('data-value'));
                        ratingInput.value = currentRating;
                        highlightStars(currentRating);
                    });
                });

                function highlightStars(rating) {
                    stars.forEach(star => {
                        if (parseInt(star.getAttribute('data-value')) <= rating) {
                            star.classList.remove('far');
                            star.classList.add('fas', 'text-warning');
                        } else {
                            star.classList.remove('fas', 'text-warning');
                            star.classList.add('far');
                        }
                    });
                }
            });


            function submitReview(bookId) {
                const rating = document.getElementById('rating-value').value;
                const comment = document.getElementById('comment-text').value;
                const url = "{{ route('reviews.store') }}";

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8',
                        'Accept': 'Application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        book_id: bookId,
                        rating: rating,
                        comment: comment
                    })
                })
                .then(res => res.json())
                .then(data => {
                    toggleReviewForm(); 
                    location.reload(); 
                })
                .catch(err => {
                    console.error(err);
                });
            }
        </script>

        <div class="review-summary">
        </div>

        <div class="tab-bar">
            <span class="active">Mới nhất</span>
        </div>

        <div class="review-list">
            @foreach ($book->reviews->reverse() as $review)

                <div class="review-item">
                    <div class="review-header">
                        <strong>{{ $review->user ? $review->user->full_name : 'Ẩn danh' }}</strong>
                        <div>{{ $review->date_review }}</div>
                    </div>
                    <div class="review-stars">
                        <div class="">
                            @if($review->rating > 0)
                                <span class="rating">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="fas fa-star text-warning"></i>
                                    @endfor
                                </span>
                            @else
                                <span class="rating">No Reviews</span>
                            @endif
                        </div>
                    </div>
                    <div class="review-content">
                        
                        @if(Auth::user()->id == $review->user_id)
                        <p>{{ $review->comment }} </p>
                        <a href="" style="margin-left:10px;" ><i class="fas fa-pen" ></i></a>
                        <a href=""  style="margin-left:10px;" ><i class="fas fa-trash" ></i></a>
                        @else
                        <p>{{ $review->comment }} </p>
                    @endif
                    </div>
                    <div class="review-footer">
                       
                </div>
            @endforeach

        </div>
    </div>


    <script>
        function toggleReviewForm() {
            const form = document.getElementById("review-form");
            form.style.display = (form.style.display === "none" || form.style.display === "") ? "block" : "none";
        }
    </script>


    <section id="new-book" class="my-5 mx-5">
        <p class="modern-big-title text-center mb-4">Same Genre</p>
        <div class="grid">
            @foreach($relatedBooks as $book)
                <div class="card">
                    <a href="{{ route('item.detail', $book->book_id) }}" style="text-decoration: none;">
                        <span class="badge bg-danger new-badge-animated"
                            style="position: absolute; top: 10px; left: 10px; z-index: 2;">
                            Recommended
                        </span>
                        <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                            alt="{{ $book->title }}" width="150" height="200" />
                        <h3>{{ $book->title }}</h3>
                        <p class="author">{{ $book->author->author_name }}</p>
                        <div class="">
                            @if($book->reviews->avg('rating'))
                                <span class="rating">
                                    @for ($i = 0; $i < floor($book->reviews->avg('rating')); $i++)
                                        <i class="fas fa-star text-warning"></i>

                                    @endfor
                                </span>
                            @else
                                <span class="rating">No Reviews</span>
                            @endif
                        </div>
                        <div class="summary">
                            <p>{{ $book->summary }}</p>
                        </div>
                        <div>
                            @foreach ($book->categories as $category)
                                <span class="badge bg-secondary">{{ $category->category_name }}</span>
                            @endforeach
                        </div>
                        <div class="price-row">
                            <span>Giá ebook</span>
                            <span class="price">{{ $book->price }}<sup>₫</sup></span>
                        </div>
                        <div class="price-row">
                            <span style="font-weight: bolder">Đã bán: {{ $book->volume_sold }}</span>
                        </div>

                    </a>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            @endforeach
        </div>
    </section>
    <section id="new-book" class="my-5 mx-5">
        <p class="modern-big-title text-center mb-4">Same Author</p>
        <div class="grid">
            @foreach($relatedAuthorBooks as $book)
                <div class="card">
                    <a href="{{ route('item.detail', $book->book_id) }}" style="text-decoration: none;">
                        <span class="badge bg-danger new-badge-animated"
                            style="position: absolute; top: 10px; left: 10px; z-index: 2;">
                            Recommended
                        </span>
                        <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                            alt="{{ $book->title }}" width="150" height="200" />
                        <h3>{{ $book->title }}</h3>
                        <p class="author">{{ $book->author->author_name }}</p>
                        <div class="">
                            @if($book->reviews->avg('rating'))
                                <span class="rating">
                                    @for ($i = 0; $i < floor($book->reviews->avg('rating')); $i++)
                                        <i class="fas fa-star text-warning"></i>

                                    @endfor
                                </span>
                            @else
                                <span class="rating">No Reviews</span>
                            @endif
                        </div>
                        <div class="summary">
                            <p>{{ $book->summary }}</p>
                        </div>
                        <div>
                            @foreach ($book->categories as $category)
                                <span class="badge bg-secondary">{{ $category->category_name }}</span>
                            @endforeach
                        </div>
                        <div class="price-row">
                            <span>Giá ebook</span>
                            <span class="price">{{ $book->price }}<sup>₫</sup></span>
                        </div>
                        <div class="price-row">
                            <span style="font-weight: bolder">Đã bán: {{ $book->volume_sold }}</span>
                        </div>

                    </a>
                    <button class="add-to-cart">Add to Cart</button>
                </div>
            @endforeach
        </div>
    </section>




    <div>
        <footer class="footer">
            <div class="footer-container">

                <div class="footer-column">
                    <h4>BookShop</h4>
                    <p style="color: yellow;">★★★★★</p>
                    <p>TrustScore 5 | 0 reviews</p>
                    <div class="logo">
                        <img src="./images/logo.png" alt="Logo" />
                    </div>
                </div>


                <div class="footer-column">
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Support / Help</a></li>
                        <li><a href="#">Ebook FAQ</a></li>
                        <li><a href="#">Become an Affiliate</a></li>
                        <li><a href="#">Gift Cards</a></li>
                        <li><a href="#">Bookshop.io for Authors</a></li>
                        <li><a href="#">Bookshop.io for Bookstores</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Returns and Refund Policy</a></li>
                    </ul>
                </div>


                <div class="footer-column">
                    <h4 style="text-align: center;">Follow us</h4>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                        <a href="#"><i class="fab fa-tiktok"></i></a>
                    </div>
                    <div class="payment-methods">
                        <p style="margin-bottom: 2px;">Payments Accepted</p>
                        <img src="{{ asset('images/visa.png') }}" alt="Visa" />
                        <img src="{{ asset('images/mastercard.png') }}" alt="MasterCard" />
                        <img src="{{ asset('images/discover.png') }}" alt="discoverCard" />
                    </div>
                </div>
                <!-- Dòng dưới cùng -->
                <div class="footer-bottom">
                    <p>&copy; 2025 TDC</p>
                    <div class="footer-links">
                        <a href="#">Terms of Use</a>
                        <a href="#">Digital Terms of Use</a>
                        <a href="#">Privacy Notice</a>
                        <a href="#">Accessibility Notice</a>
                    </div>
                </div>
        </footer>
    </div>



</body>
<script src="{{ asset('js/scripts.js') }}"></script>
<script>

    document.addEventListener("DOMContentLoaded", function () {
        let index = 0;
        const slides = document.querySelectorAll(".nav-slide");
        const slidesContainer = document.querySelector(".nav-slides");
        const totalSlides = slides.length;
        function autoSlide() {
            index = (index + 1) % totalSlides;
            slidesContainer.style.transform = `translateX(-${index * 100}vw)`;
        }

        setInterval(autoSlide, 3000);
    });


</script>


</html>