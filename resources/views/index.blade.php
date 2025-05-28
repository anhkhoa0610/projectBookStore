<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <title>Bookshop</title>

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->

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

    <section id="best-seller" class="my-5 mx-5">
        <p class="modern-big-title">Best Seller</p>
        <div class="grid">
            @foreach($soldBooks as $book)
                <a href="" style="text-decoration: none;" class="card">
                <span class="badge bg-danger new-badge-animated"
                        style="position: absolute; top: 10px; left: 10px; z-index: 2;">
                        Recommended
                    </span>    
                <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                        alt="{{ $book->title }}" width="150" height="200" />
                    <h3>{{ $book->title }}</h3>
                    <p class="author">{{ $book->author->author_name }}</p>
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

                    <button class="add-to-cart">Add to Cart</button>
                </a>
            @endforeach
        </div>


    </section>

    <section id="new-book" class="my-5 mx-5">
        <p class="modern-big-title">Newly Updated</p>
        <div class="grid">
            @foreach($newBooks as $book)
                <a href="" style="text-decoration: none; position: relative;" class="card">
                    <span class="badge bg-success new-badge-animated"
                        style="position: absolute; top: 10px; left: 10px; z-index: 2;">
                        New
                    </span>
                    <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                        alt="{{ $book->title }}" width="150" height="200" />
                    <h3>{{ $book->title }}</h3>
                    <p class="author">{{ $book->author->author_name }}</p>
                    <div class="summary">
                        <p>{{ $book->summary }}</p>
                    </div>
                    <div class="price-row">
                        <span>Giá ebook</span>
                        <span class="price">{{ $book->price }}<sup>₫</sup></span>
                    </div>
                    <div class="price-row">
                        <span>Ngày Xuất Bản : {{ $book->published_date }}</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </a>
            @endforeach

        </div>


    </section>

    <div class="content">

        <div class="category-list mt-4">
            <div class="category-box">
                <div class="category-title">Danh mục theo thể loại sách</div>
                <ul class="categories-list">
                    <li onclick="getAllBooks()"><i class="fas fa-book"></i>Tất cả</li>
                    @foreach ($categories as $category)
                        <li onclick="getCategoryByID({{ $category->category_id }})">
                            <i class="fas fa-book"></i>
                            {{ $category->category_name }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="category-box">
                <div class="category-title">Danh mục theo xu hướng</div>
                <ul>
                    <li onclick="getBooksBySold()"><i class="fas fa-book"></i> Sách bán chạy</li>
                    <li onclick="getBooksByDate()"><i class="fas fa-book"></i> Sách mới nhất</li>
                    <li onclick=""><i class="fas fa-book"></i> Sách được đánh giá cao</li>
                </ul>
            </div>
        </div>

        <div>
            <div class="container d-flex flex-column align-items-center">
                <div class="grid" id="book-list">
                    <!-- Card 1 -->


                </div>
                <!-- <div class="paginate mt-5 mx-auto">
                    {{ $books->links() }}
                </div> -->
            </div>

        </div>
    </div>

    @auth
        <section id="wish-list" class="my-5 mx-5">
            <p class="modern-big-title">Wish List</p>
            @if(!$wishlist->isEmpty())
                <div class="wishlist-carousel-container" style="position: relative; max-width: 930px; margin: auto;">
                    <button id="wishlist-left" class="wishlist-carousel-btn"
                        style="position: absolute; left: -40px; top: 40%; z-index: 2;">&#8592;</button>
                    <div class="wishlist-carousel-viewport" style="overflow: hidden;">
                        <div id="wishlist-carousel-track" class="wishlist-carousel-track"
                            style="display: flex; transition: transform 0.4s;">
                            <!-- Place your 5+ wishlist cards here -->
                            @foreach($wishlist as $book)
                                <a href="" class="card" style="text-decoration: none;min-width: 300px; margin: 20px 10px;">
                                    <img src="{{ $book->cover_image ? asset('uploads/' . $book->cover_image) : asset('images/placeholder.png') }}"
                                        width="150" height="200" />
                                    <h3>{{ $book->title }}</h3>
                                    <p class="author">{{ $book->author->author_name }}</p>
                                    <div class="summary">
                                        <p>{{ $book->summary }}</p>
                                    </div>
                                    <div class="price-row">
                                        <span>Giá ebook</span>
                                        <span class="price">{{ $book->price }}<sup>₫</sup></span>
                                    </div>
                                    <button class="add-to-cart">Add to Cart</button>
                                </a>
                                <!-- ...other book info... -->

                            @endforeach
                            <!-- Repeat the above <a> for each wishlist item (add as many as you want) -->
                        </div>
                    </div>
                    <button id="wishlist-right" class="wishlist-carousel-btn"
                        style="position: absolute; right: -50px; top: 40%; z-index: 2;">&#8594;</button>
                </div>
            @else
                <p class="text-center">Your wish list is empty. Wish some !!</p>
            @endif
        </section>
    @endauth

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/mark.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>