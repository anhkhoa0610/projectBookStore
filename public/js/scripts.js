const suggest = document.querySelector('.suggest');
const input = document.querySelector('.input-search');
let debounceTimer = null;

input.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    suggest.innerHTML = '';
    debounceTimer = setTimeout(() => {
        suggestSearch(this.value);
    }, 300);
});

async function suggestSearch(keyword) {
    if (keyword != '') {
        const url = `/api/index/search/${keyword}`;

        const request = await fetch(url);
        const result = await request.json();
        result.forEach(element => {
            const li = document.createElement('li');
            li.classList.add('list-group-item', 'd-flex', 'flex-row', 'justify-content-between', 'row');
            li.innerHTML = `<div class="col-2">
                                <img src="/images/placeholder.png" alt="" width="50" height="50">
                            </div>
                            <div class="col-10">
                                <h5 class="mb-1">${element.title}</h5>
                                <p class="mb-1">${element.author.author_name}</p>
                                <small>Price: ${element.price}</small>
                            </div>`;
            suggest.append(li);
        });
    }
    var instance = new Mark(suggest);
    instance.mark(keyword);
}

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

async function getCategoryByID(category_id) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/category/${category_id}`;
    const res = await fetch(url);
    const result = await res.json();

    if (res.ok) {
        bookList.innerHTML = '';
        let string = '';
        for (let i = 0; i < result.books.length; i++) {
            const book = result.books[i];
            let categoryBadges = '';
            for (let j = 0; j < book.categories.length; j++) {
                categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
            }

            string += `<a href="" style="text-decoration: none; animation-delay:${0.2 * i}s" class="card">
                            <img src="images/placeholder.png"
                                alt="" width="150" height="200" />
                            <h3>${book.title}</h3>
                            <p class="author">${book.author.author_name}</p>
                            <div class="categories my-2">
                                ${categoryBadges}
                            </div>
                            <div class="summary">
                                <p>${book.summary}</p>
                            </div>
                            <div class="price-row">
                                <span>Giá ebook</span>
                                <span class="price">${book.price}<sup>₫</sup></span>
                            </div>
                            <div class="price-row">
                                <span>Ngày Xuất Bản : ${book.published_date}</span>
                            </div>
                            <button class="add-to-cart">Add to Cart</button>
                        </a>`;
        };
        bookList.innerHTML = string;
        document.querySelector('.pagination').style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    getAllBooks();
});

document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('wishlist-carousel-track');
    const leftBtn = document.getElementById('wishlist-left');
    const rightBtn = document.getElementById('wishlist-right');
    const cards = track.querySelectorAll('.card');
    const visibleCount = 4;
    let currentIndex = 0;

    function updateCarousel() {
        const cardWidth = cards[0].offsetWidth + 20; // card + margin
        track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        leftBtn.disabled = currentIndex === 0;
        rightBtn.disabled = currentIndex > cards.length - visibleCount - 0.5;
    }

    leftBtn.addEventListener('click', function () {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });

    rightBtn.addEventListener('click', function () {
        if (currentIndex < cards.length - visibleCount) {
            currentIndex++;
            updateCarousel();
        }
    });

    updateCarousel();
});

async function getAllBooks(page = 1) {
    const bookList = document.getElementById('book-list');
    const url = `/api/index/all-books?page=${page}`;
    const res = await fetch(url);
    const result = await res.json();

    bookList.innerHTML = '';
    let string = '';
    for (let i = 0; i < result.data.length; i++) {
        const book = result.data[i];

        let categoryBadges = '';
            if (book.categories && book.categories.length > 0) {
                for (let j = 0; j < book.categories.length; j++) {
                    categoryBadges += `<span class="badge bg-secondary me-1">${book.categories[j].category_name}</span>`;
                }
            }
            console.log("category:" .categoryBadges);
        string += `<a href="" style="text-decoration: none; animation-delay: ${i * 0.2}s" class="card">
            <img src="images/placeholder.png"
                alt="" width="150" height="200" />
            <h3>${book.title}</h3>
            <p class="author">${book.author.author_name}</p>
            <div class="categories my-2">
                ${categoryBadges}
            </div>
            <div class="summary">
                <p>${book.summary}</p>
            </div>
            <div class="price-row">
                <span>Giá ebook</span>
                <span class="price">${book.price}<sup>₫</sup></span>
            </div>
            <div class="price-row">
                <span>Ngày Xuất Bản : ${book.published_date}</span>
            </div>
            <button class="add-to-cart">Add to Cart</button>
        </a>`;
    }
    bookList.innerHTML = string;

    // Render pagination controls
    renderPagination(result);
}

function renderPagination(result) {
    let pagination = document.querySelector('.dynamic-paginate');
    if (!pagination) {
        pagination = document.createElement('nav');
        pagination.className = 'dynamic-paginate mt-5 mx-auto';
        document.getElementById('book-list').after(pagination);
    }
    let html = `<ul class="pagination justify-content-center">`;

    // Previous button
    if (result.prev_page_url) {
        html += `<li class="page-item">
                    <button class="page-link" onclick="getAllBooks(${result.current_page - 1})">&laquo; Previous</button>
                 </li>`;
    } else {
        html += `<li class="page-item disabled">
                    <span class="page-link">&laquo; Previous</span>
                 </li>`;
    }

    // Page numbers (show up to 5 pages around current)
    let start = Math.max(1, result.current_page - 2);
    let end = Math.min(result.last_page, result.current_page + 2);
    for (let i = start; i <= end; i++) {
        if (i === result.current_page) {
            html += `<li class="page-item active"><span class="page-link">${i}</span></li>`;
        } else {
            html += `<li class="page-item"><button class="page-link" onclick="getAllBooks(${i})">${i}</button></li>`;
        }
    }

    // Next button
    if (result.next_page_url) {
        html += `<li class="page-item">
                    <button class="page-link" onclick="getAllBooks(${result.current_page + 1})">Next &raquo;</button>
                 </li>`;
    } else {
        html += `<li class="page-item disabled">
                    <span class="page-link">Next &raquo;</span>
                 </li>`;
    }

    html += `</ul>`;
    pagination.innerHTML = html;
}