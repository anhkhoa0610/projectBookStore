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

<style>
.modern-big-title {
    font-size: 3rem;
    font-weight: 900;
    letter-spacing: 0.1em;
    color: #222;
    background: linear-gradient(90deg, #00c6fb 0%, #005bea 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
    text-align: center;
    margin: 40px 0;
    padding: 10px 0;
    border-bottom: 4px solid blue;
    box-shadow: 0 4px 24px rgba(255, 45, 85, 0.15);
}
</style>

<body>
    <nav class="navbar">
        <a class="logo" href="#">
            <img src="{{ asset('images/rsz_logo.png') }}" alt="">
        </a>
        <div class="search-box">
            <input type="text" placeholder="Search books, authors, ISBNs">
            <i class="fas fa-search"></i>
        </div>
        <div class="nav-links">
            <a href="#" class="btn btn-primary"><b>Sign In</b></a>
            <a href="#" class="btn btn-primary"><b>Sign Up</b></a>

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
                                <a class="nav-link" href="new-book">Sách Mới Nhất</a>
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
                    <a href="https://www.youtube.com/"></a>
                    <div class="slide_img"><img src="./img/slideBook1.jpg" alt=""></div>
                    <div class="slide_content">
                    </div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="./img/slideBook2.jpg" alt=""></div>
                    <div class="slide_content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptatum neque, ut optio
                        praesentium architecto eaque corrupti debitis officia quia.
                        Dolorem, voluptatem. Rerum facilis voluptas perferendis quas quis at fugit.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae placeat consequuntur
                        eligendi blanditiis voluptatibus laudantium ut maiores
                        delectus quaerat neque, molestias saepe ullam ad sint voluptatum similique, expedita magnam.
                        Deleniti!
                    </div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="./img/slideBook3.jpg" alt=""></div>
                    <div class="slide_content">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptatum neque, ut optio
                        praesentium architecto eaque corrupti debitis officia quia.
                        Dolorem, voluptatem. Rerum facilis voluptas perferendis quas quis at fugit.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae placeat consequuntur
                        eligendi blanditiis voluptatibus laudantium ut maiores
                        delectus quaerat neque, molestias saepe ullam ad sint voluptatum similique, expedita magnam.
                        Deleniti!
                    </div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="./img/slideBook3.jpg" alt=""></div>
                    <div class="slide_content"></div>
                </div>
                <div class="nav-slide">
                    <div class="slide_img"><img src="./img/slideBook3.jpg" alt=""></div>
                    <div class="slide_content"></div>
                </div>
            </div>

        </div>


    </div>

    <!-- <style>
        #best-seller {
            height: 70%;
            padding: 5px;
            border-top: 5px solid silver;
            border-bottom: 5px solid silver;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12), 0 1.5px 4px rgba(0, 0, 0, 0.10);
        }
    </style> -->

    <section id="best-seller" class="my-5 mx-5">
        <p class="modern-big-title">Best Seller</p>
        <div class="grid">
            @foreach($soldBooks as $book)
                <a href="" style="text-decoration: none;" class="card">
                    <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                        alt="{{ $book->title }}" width="150" height="200" />
                    <h3>{{ $book->title }}</h3>
                    <p class="author">{{ $book->author_id }}</p>
                    <div class="summary">
                        <p>{{ $book->summary }}</p>
                    </div>
                    <div class="price-row">
                        <span>Giá ebook</span>
                        <span class="price">{{ $book->price }}<sup>₫</sup></span>
                    </div>
                    <div class="price-row">
                        <span style="font-weight: bolder">Đã bán: {{ $book->volume_sold }}</span>
                    </div>
                    <div class="price-row">
                        <span>Ngày Xuất Bản : {{ $book->published_date }}</span>
                    </div>
                    <button class="add-to-cart">Add to Cart</button>
                </a>
            @endforeach
        </div>


    </section>

    <section id="best-seller" class="my-5 mx-5">
        <p class="modern-big-title">Newly Updated</p>
        <div class="grid">
            @foreach($newBooks as $book)
                <a href="" style="text-decoration: none;" class="card">
                    <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                        alt="{{ $book->title }}" width="150" height="200" />
                    <h3>{{ $book->title }}</h3>
                    <p class="author">{{ $book->author_id }}</p>
                    <div class="summary">
                        <p>{{ $book->summary }}</p>
                    </div>
                    <div class="price-row">
                        <span>Giá ebook</span>
                        <span class="price">{{ $book->price }}<sup>₫</sup></span>
                    </div>
                    <div class="price-row">
                        <span style="font-weight: bolder">Đã bán: {{ $book->volume_sold }}</span>
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

                </ul>
            </div>
            <div class="category-box">
                <div class="category-title">Danh mục theo xu hướng</div>
                <ul>
                    <li><i class="fas fa-book"></i> Sách bán chạy</li>
                    <li><i class="fas fa-book"></i> Sách mới</li>
                    <li><i class="fas fa-book"></i> Sách được đánh giá cao</li>
                </ul>
            </div>
        </div>

        <style>
            .summary {
                margin-bottom: 10px;
                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                /* Số dòng hiển thị */
                -webkit-box-orient: vertical;
            }

            .card img {
                object-fit: contain;
            }
        </style>

        <div>
            <div class="container d-flex flex-column align-items-center">
                <div class="grid">
                    <!-- Card 1 -->
                    @foreach($books as $book)
                        <a href="" style="text-decoration: none;" class="card">
                            <img src="{{ $book->cover_image ? asset('images/' . $book->cover_image) : asset('images/placeholder.png') }}"
                                alt="{{ $book->title }}" width="150" height="200" />
                            <h3>{{ $book->title }}</h3>
                            <p class="author">{{ $book->author_id }}</p>
                            <div class="summary">
                                <p>{{ $book->summary }}</p>
                            </div>
                            <div class="price-row">
                                <span>Giá ebook</span>
                                <span class="price">{{ $book->price }}<sup>₫</sup></span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </a>
                    @endforeach

                </div>
                <div class="paginate mt-5 mx-auto">
                    {{ $books->links() }}
                </div>
            </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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

    async function getAllCategory() {
        const url = "{{ route('categories-api') }}";
        const res = await fetch(url);
        const result = await res.json();

        console.log(result);

        const categoryList = document.querySelector('.categories-list');

        for (let i = 0; i < result.length; i++) {
            const categoryBox = document.createElement("li");
            categoryBox.innerHTML = `<i class="fas fa-book"></i>
                ${result[i].category_name}
            `;
            categoryList.appendChild(categoryBox);
        }
    }



    getAllCategory();


</script>
<!-- <div class="card">
                        <img src="https://storage.googleapis.com/a1aa/image/ebab378e-46ab-461c-af6b-48caaf9d9410.jpg"
                            alt="Book cover of Tiếng Việt các cở cũng cứng cựa with orange and dark blue geometric shapes"
                            width="150" height="200" />
                        <h3>Tiếng Việt các cở cũng cứng cựa</h3>
                        <p class="author">Lê Minh Quốc</p>
                        <div class="price-row">
                            <span>Giá ebook</span>
                            <span class="price">63,000<sup>₫</sup></span>
                        </div>
                        <button class="add-to-cart">Add to Cart</button>
                    </div>       -->


</html>