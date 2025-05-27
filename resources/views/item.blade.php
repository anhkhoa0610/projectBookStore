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
        @import url('https://fonts.googleapis.com/css2?family=Inter&display=swap');

        .container {
            max-width: 1024px;
            margin: 0 auto;
            padding: 24px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 768px) {
            .container {
                grid-template-columns: 320px 1fr;
            }
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 16px;
            display: flex;
            flex-direction: column;
        }

        /* Left side */
        .left img.main-img {
            width: 290px;
            height: 400px;
            object-fit: cover;
            border-radius: 8px;

            margin-bottom: 16px;
        }

        .cardLeft {
            height: 800px;
        }

        .thumbnails {
            display: flex;
            gap: 8px;
            margin-bottom: 16px;
        }

        .thumbnails img {
            width: 60px;
            height: 80px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            object-fit: cover;
            cursor: pointer;
        }

        .thumbnails .more {
            width: 64px;
            height: 80px;
            background-color: #222222;
            color: white;
            font-weight: 600;
            font-size: 18px;
            border-radius: 6px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            user-select: none;
        }

        .btn-group {
            display: flex;
            gap: 8px;
            margin-bottom: 24px;
        }

        .btn-cart {
            flex: 1;
            border: 1px solid #b91c1c;
            color: #b91c1c;
            background: transparent;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 16px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-color 0.2s ease;
        }

        .btn-cart:hover {
            background-color: #fee2e2;
        }

        .btn-buy {
            flex: 1;
            background-color: #b91c1c;
            color: white;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 16px;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s ease;
        }

        .btn-buy:hover {
            background-color: #7f1d1d;
        }

        .policy-list {
            font-size: 13px;
            color: #222222;
            font-weight: 400;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .policy-list strong {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }

        .policy-item {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            user-select: none;
            color: #222222;
        }

        .policy-item i {
            color: #b91c1c;
            min-width: 18px;
            text-align: center;
        }

        .policy-item .arrow {
            margin-left: auto;
            color: #9ca3af;
        }

        /* Right side */
        .right {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .title {
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .info-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            font-size: 13px;
            color: #222222;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .info-row>div {
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            align-items: center;
        }

        .info-row a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .info-row a:hover {
            text-decoration: underline;
        }

        .info-row strong {
            font-weight: 600;
        }

        .rating-sold {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 12px;
            color: #9ca3af;
            user-select: none;
        }

        .stars {
            display: flex;
            gap: 2px;
            color: #d1d5db;
        }

        .stars i {
            font-style: normal;
        }

        .stars .filled {
            color: #f0b90b;
        }

        .flash-sale-container {
            display: flex;
            align-items: center;
            border: 2px solid #f87171;
            border-radius: 0.5rem;
            background: linear-gradient(to right, #f87171, #fca5a5);
            padding: 0.5rem 1rem;
            width: 600px;
        }

        .flash-sale-text {
            color: white;
            font-weight: 800;
            font-size: 1.125rem;
            letter-spacing: -0.02em;
            user-select: none;
        }

        .flash-sale-text .lightning {
            color: #facc15;

        }

        .timer {
            display: flex;
            gap: 0.5rem;
            background: white;
            border-radius: 0.375rem;
            padding: 0.25rem 0.5rem;
            margin-left: 0.75rem;
        }

        .timer span {
            background: black;
            color: white;
            font-weight: 600;
            font-size: 0.75rem;
            border-radius: 0.375rem;
            padding: 0.125rem 0.5rem;
            user-select: none;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 1.25rem;
        }

        .progress-container {
            margin-left: 1rem;
            position: relative;
            height: 1.25rem;
            background: white;
            border-radius: 50px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: end;
            padding-right: 0.25rem;
            user-select: none;
            width: 150px;
            position: absolute;
            right: 30px;
        }

        .progress-bar {
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 20%;
            background-color: #f87171;
            border-radius: 9999px;
            z-index: 0;

        }

        .progress-text {
            position: relative;
            color: #f87171;
            font-weight: 600;
            font-size: 0.75rem;
            z-index: 10;

        }

        .price-row {
            display: flex;
            margin-bottom: 8px;
            position: relative;
        }

        .price-current {
            font-size: 24px;
            font-weight: 600;
            color: #b91c1c;
            display: flex;
            gap: 4px;
            position: absolute;
        }



        .price-old {
            font-size: 14px;
            font-weight: 600;
            color: #9ca3af;
            text-decoration: line-through;
            position: absolute;
            right: 385px;
            bottom: -29px;
        }

        .price-discount {
            background-color: #b91c1c;
            color: white;
            font-size: 12px;
            font-weight: 600;
            border-radius: 6px;
            padding: 2px 8px;
            user-select: none;
            height: 20px;
            line-height: 16px;
            position: absolute;
            right: 335px;
            bottom: -29px;
        }

        .stock-info {
            background-color: #dbeafe;
            color: #2563eb;
            font-size: 13px;
            font-weight: 400;
            border-radius: 6px;
            padding: 6px 12px;
            width: max-content;
            user-select: none;
            margin-bottom: 8px;
        }

        /* Shipping info */
        .shipping-info {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .shipping-info strong {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .shipping-address {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 4px;
            font-size: 13px;
            color: #222222;
        }

        .shipping-address strong {
            font-weight: 600;
        }

        .shipping-address a {
            margin-left: auto;
            color: #2563eb;
            font-weight: 400;
            text-decoration: none;
            cursor: pointer;
        }

        .shipping-address a:hover {
            text-decoration: underline;
        }

        .shipping-standard {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 13px;
            color: #222222;
        }

        .shipping-standard i {
            color: #16a34a;
            min-width: 18px;
            text-align: center;
        }

        .shipping-date {
            padding-left: 26px;
            font-size: 13px;
            color: #4b5563;
            user-select: none;
        }

        .related-offers {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 13px;
            color: #222222;
        }

        .related-offers a {
            color: #2563eb;
            font-weight: 400;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
        }

        .related-offers a:hover {
            text-decoration: underline;
        }

        .related-offers a i {
            font-size: 12px;
        }

        .offer-list {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            padding-bottom: 4px;
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }

        .offer-list::-webkit-scrollbar {
            display: none;
        }

        .offer-item {
            display: flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 6px 8px;
            min-width: 120px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            user-select: none;
            white-space: nowrap;
            background-color: white;
        }

        .offer-item.yellow i {
            color: #fbbf24;
        }

        .offer-item.blue {
            border-color: #3b82f6;
            background-color: #eff6ff;
            color: #2563eb;
        }

        .offer-item.blue i {
            color: #3b82f6;
        }

        /* Quantity selector */
        .quantity {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            font-size: 14px;
            user-select: none;
        }

        .quantity label {
            min-width: 80px;
        }

        .quantity-controls {
            display: flex;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            width: 110px;
            height: 32px;
            overflow: hidden;
        }

        .quantity-controls button {
            width: 32px;
            height: 100%;
            border: none;
            background: transparent;
            color: #4b5563;
            font-size: 20px;
            font-weight: 400;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: color 0.2s ease;
        }

        .quantity-controls button:hover {
            color: #111827;
        }

        .quantity-controls input {
            width: 46px;
            border: none;
            outline: none;
            text-align: center;
            font-weight: 400;
            font-size: 14px;
            cursor: default;
            user-select: none;
        }

        /* Detailed info */
        .details {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 16px;
            font-size: 14px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .details strong {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .details-grid {
            display: grid;
            grid-template-columns: 120px 1fr;
            gap: 20px;
            font-size: 13px;
            color: #4b5563;

        }

        .details-grid .label {
            font-weight: 400;
        }

        .details-grid .value {
            font-weight: 600;
            color: #454444;

        }

        .details-grid a {
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
        }

        .details-grid a:hover {
            text-decoration: underline;
        }

        .card {
            max-width: 500px;
            margin: 0 auto;
            background-color: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .card p {
            color: #374151;
            line-height: 1.6;
        }

        #content {
            max-height: 130px;
            overflow: hidden;
            position: relative;
            transition: max-height 0.3s ease;
        }

        #fade {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: linear-gradient(to top, white, transparent);
        }

        #toggle {
            color: #2563eb;
            margin-top: 12px;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            font-size: 14px;
        }

        #toggle:hover {
            text-decoration: underline;
        }
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
            <img src="{{ asset('uploads/' . $book->cover_image) }}"
                alt="Book img" class="main-img"
                width="280" height="400" />

            <div class="btn-group">
                <button type="button" class="btn-cart">
                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng
                </button>

            </div>

            <div class="details-grid">
                <strong>Thông tin chi tiết:</strong>
                <br>
                <div class="label">Mã sách:</div>
                <div class="value">{{$book->book_id }}</div>
                <div class="label">Tên Nhà Cung Cấp:</div>
                <div class="value"><p style=" font-weight: bold" >{{$book->publisher->publisher_name}}</p></div>
                <div class="label">Tác giả:</div>
                <div class="value">{{ $book->author->author_name }}</div>
               
            </div>
        </div>
        <!-- Right side -->
        <div class="card right">
            <div>
                <h1 class="title">{{ $book->title}}</h1>
                <div class="info-row">
                    <div>
                       <p> Nhà cung cấp:</p>
                        <p  style=" font-weight: bold" >{{$book->publisher->publisher_name}}</p>
                    </div>
                   
                </div>
                <div class="info-row">
                    <div>
                        Tác giả: <strong>{{ $book->author->author_name }}</strong>
                    </div>
                </div>
                <div class="info-row">
                    Danh mục: 
                    @foreach ($book->categories as $category)
                        {{ $category->category_name }}/
                    @endforeach
                    
                </div>

            </div>


            <div class="price-row">
                <div class="price-current" id="price-current">
                    20000 <span>đ</span>
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
                    <p style=" font-weight: bold" >{{ Auth::user()->address }}</p>
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