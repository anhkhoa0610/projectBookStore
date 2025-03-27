<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Nav Slider</title>
    <style>
        .nav-slider {
            overflow: hidden;
        }
        .nav-slides {
            width: max-content;
            display: flex ;
            flex-wrap: nowrap;
            transition: transform 1s ease-in-out;
            position: relative;
        }
        .nav-slide {
             height: 40vh;
             display: flex;
             width: 100vw;
        }
        .nav-slide .slide_img {
             width: 25%;
             background-color: blanchedalmond;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .nav-slide .slide_img  img{
           width: 90%;
           height: 90%;
           margin: auto;
           box-shadow: 5px 5px rgba(153, 101, 64,.5) ;
        }
        .nav-slide .slide_content {
             width: 75%;
             background: gold;
        }
    </style>
    
</head>
<body>

    <div class="nav-slider">
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
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptatum neque, ut optio praesentium architecto eaque corrupti debitis officia quia.
                     Dolorem, voluptatem. Rerum facilis voluptas perferendis quas quis at fugit.
                     Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae placeat consequuntur eligendi blanditiis voluptatibus laudantium ut maiores
                      delectus quaerat neque, molestias saepe ullam ad sint voluptatum similique, expedita magnam. Deleniti!
                </div>
            </div>
            <div class="nav-slide">
                <div class="slide_img"><img src="./img/slideBook3.jpg" alt=""></div>
                <div class="slide_content">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Non voluptatum neque, ut optio praesentium architecto eaque corrupti debitis officia quia.
                    Dolorem, voluptatem. Rerum facilis voluptas perferendis quas quis at fugit.
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae placeat consequuntur eligendi blanditiis voluptatibus laudantium ut maiores
                     delectus quaerat neque, molestias saepe ullam ad sint voluptatum similique, expedita magnam. Deleniti!
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
    
</body>
</html>
