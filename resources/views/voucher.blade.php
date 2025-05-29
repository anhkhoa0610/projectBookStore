<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <title>Bookshop</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        .voucher-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .voucher-card:hover {
            transform: translateY(-6px) scale(1.03);
            box-shadow: 0 8px 24px rgba(184, 28, 28, 0.15);
        }

        .voucher-skeleton {
            background: linear-gradient(120deg, #f3f4f6 40%, #e5e7eb 60%, #f3f4f6 80%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.2s infinite linear;
            border-radius: 16px;
            min-height: 180px;
            margin-bottom: 16px;
            padding: 24px;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }
    </style>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> -->
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
                <div class="dropdown user-dropdown mx-5" style="display: inline-block; position: relative;">
                    <span class="user-name" style="cursor:pointer;">
                        Xin chào <b class="text-primary mx-2">{{ Auth::user()->full_name }}</b>
                        <i class="fas fa-user text-primary"></i>
                    </span>
                    <div class="dropdown-menu"
                        style="display:none; position:absolute; right:0; top:100%; background:#fff; box-shadow:0 2px 8px rgba(0,0,0,0.15); min-width:160px; z-index:100;">
                        <a class="dropdown-item" href="">Profile</a>
                        @if(Auth::user()->role === 'admin')
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Admin dashboard</a>
                        @endif
                        <a class="dropdown-item" href="#wish-list">Wishlist</a>
                        <form action="{{ route('logout') }}" class="dropdown-item ms-4" method="POST">
                            @csrf
                            <button type="submit" style="border: none; background: none; cursor: pointer;">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                <style>

                </style>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary"><b>Sign In</b></a>
                <a href="{{ route('user.createUser') }}" class="btn btn-primary"><b>Sign Up</b></a>
            @endauth
            <div class="cart">
                <a href="{{ route('cart.show') }}" class="cart-icon">
                    <i class="fas fa-shopping-cart"></i>
                    @auth
                        <sup style="font-size: 20px;  color: #0f718a;">
                            {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
                        </sup>
                    @endauth
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
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}#best-seller">Bán Chạy Nhất</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}#new-book">Sách Mới Nhất</a>
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
            <a href="{{ route('voucher.index') }}" class="nav-slides">
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
            </a>

        </div>
    </div>

    <section id="voucher-list" class="my-5 mx-5">
        <p class="modern-big-title" style="font-size: 2rem; font-weight: bold; color: #b91c1c;">
            Limited-Time Vouchers – Shop and Save!
        </p>
        <div class="row g-4" id="voucher-container"></div>
        <div id="voucher-pagination" class="my-3 text-center"></div>
    </section>


    <section id="best-seller" class="my-5 mx-5">
        <p class="modern-big-title" style="font-size: 2rem; font-weight: bold; color: #b91c1c;">Best Seller</p>
        <div class="grid">
            @foreach($soldBooks as $book)
                <div class="card">
                    <a href="{{ route('item.detail', $book->book_id) }}" style="text-decoration: none;">
                        <span class="badge bg-danger new-badge-animated"
                            style="position: absolute; top: 10px; left: 10px; z-index: 2;">
                            Recommended
                        </span>
                        <img src="{{ $book->cover_image ? asset('uploads/' . $book->cover_image) : asset('images/placeholder.png') }}"
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
                    <button class="add-to-cart" data-book-id="{{ $book->book_id }}">Add to
                        Cart</button>
                </div>
            @endforeach

        </div>
        <div class="d-flex mt-4 justify-content-center">
            <a href="{{ route('index') }}#all-books" class="btn btn-outline-primary px-4 py-2">
                See more
            </a>
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
                        <img src=" {{asset('images/logo.png') }}" alt="Logo" />
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

    <!-- Toast Container -->
    <div id="cart-toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
            <div id="cart-toast" class="toast align-items-center text-bg-success border-0" role="alert"
                aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" id="cart-toast-body">
                        Book added to cart successfully!
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            attachAddCartListeners();
        });
    </script>


    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js"></script>
    <script>
        const userId = {{ Auth::check() ? Auth::id() : 'null' }};
        const addCartApiUrl = "{{ route('index-add-cart-api') }}";
    </script>
</body>


</html>