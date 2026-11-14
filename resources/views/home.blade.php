
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopZone - Top Up Game</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <a href="{{ route('home') }}" class="logo">
            TOP<span>ZONE</span>
        </a>

        <nav class="nav-menu">
            <a href="#beranda" class="active">Beranda</a>
            <a href="#game">Daftar Game</a>
            <a href="#tentang">Tentang Kami</a>
        </nav>

        <div class="nav-actions">
            <a href="#" class="btn-login">Masuk</a>
            <a href="#" class="btn-register">Daftar</a>
        </div>
    </header>

    <!-- HERO CAROUSEL -->
    <section class="hero" id="beranda">
        <div class="carousel">

            <div class="carousel-track">

                <article class="slide">
                    <img src="{{ asset('images/banner-1.jpg') }}"
                         alt="Banner Free Fire">
                    <div class="hero-content">
                        <span class="hero-label">TOP UP GAME TERPERCAYA</span>
                        <h1>Top Up Game<br>Jadi Lebih Mudah!</h1>
                        <p>
                            Top up game favoritmu dengan proses mudah,
                            cepat, dan praktis.
                        </p>
                        <a href="#game" class="btn-primary">
                            Mulai Top Up →
                        </a>
                    </div>
                </article>

                <article class="slide">
                    <img src="{{ asset('images/banner-2.jpg') }}"
                         alt="Banner Mobile Legends">
                    <div class="hero-content">
                        <span class="hero-label">ISI DIAMOND TANPA RIBET</span>
                        <h1>Push Rank<br>Tanpa Hambatan!</h1>
                        <p>
                            Temukan kebutuhan top up game favoritmu
                            dalam satu tempat.
                        </p>
                        <a href="#game" class="btn-primary">
                            Lihat Game →
                        </a>
                    </div>
                </article>

                <article class="slide">
                    <img src="{{ asset('images/banner-3.jpg') }}"
                         alt="Banner PUBG Mobile">
                    <div class="hero-content">
                        <span class="hero-label">SAATNYA NAIK LEVEL</span>
                        <h1>Gaming Lebih<br>Seru Bersama Kami!</h1>
                        <p>
                            Pilih game, tentukan paket, dan siapkan
                            dirimu untuk bermain.
                        </p>
                        <a href="#game" class="btn-primary">
                            Top Up Sekarang →
                        </a>
                    </div>
                </article>

            </div>

            <button class="carousel-btn prev"
                    aria-label="Banner sebelumnya">&#10094;</button>

            <button class="carousel-btn next"
                    aria-label="Banner berikutnya">&#10095;</button>

            <div class="carousel-dots"></div>
        </div>
    </section>

    <!-- MAIN -->
    <main class="main-content" id="game">

        <section class="welcome">
            <span class="section-label">GAME CENTER</span>
            <h2>Pilih Game Favoritmu</h2>
            <p>
                Semua kebutuhan top up game favoritmu ada di sini.
            </p>
        </section>

        <section class="game-grid">

            <!-- FREE FIRE -->
            <a href="{{ url('/topup') }}"
               class="game-card">
                <div class="game-image">
                    <img src="{{ asset('images/free-fire.jpg') }}"
                         alt="Free Fire">
                    <span class="game-badge">POPULER</span>
                </div>

                <div class="game-info">
                    <h3>Free Fire</h3>
                    <p>Diamond Free Fire</p>
                    <div class="game-footer">
                        <span>Top up sekarang</span>
                        <span class="arrow">→</span>
                    </div>
                </div>
            </a>

            <!-- MOBILE LEGENDS -->
            <a href="{{ url('/topup') }}"
               class="game-card">
                <div class="game-image">
                    <img src="{{ asset('images/mobile-legends.jpg') }}"
                         alt="Mobile Legends">
                </div>

                <div class="game-info">
                    <h3>Mobile Legends</h3>
                    <p>Diamond MLBB</p>
                    <div class="game-footer">
                        <span>Top up sekarang</span>
                        <span class="arrow">→</span>
                    </div>
                </div>
            </a>

            <!-- PUBG MOBILE -->
            <a href="{{ url('/topup') }}"
               class="game-card">
                <div class="game-image">
                    <img src="{{ asset('images/pubg-mobile.jpg') }}"
                         alt="PUBG Mobile">
                </div>

                <div class="game-info">
                    <h3>PUBG Mobile</h3>
                    <p>UC PUBG Mobile</p>
                    <div class="game-footer">
                        <span>Top up sekarang</span>
                        <span class="arrow">→</span>
                    </div>
                </div>
            </a>

        </section>

        <!-- BENEFIT -->
        <section class="benefit-grid" id="tentang">
            <div class="benefit-card">
                <div class="benefit-icon">⚡</div>
                <h3>Proses Cepat</h3>
                <p>Proses pemesanan yang praktis dan mudah.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🛡️</div>
                <h3>Transaksi Aman</h3>
                <p>Bangun sistem transaksi yang aman dan tepercaya.</p>
            </div>

            <div class="benefit-card">
                <div class="benefit-icon">🎮</div>
                <h3>Banyak Pilihan</h3>
                <p>Pilih game favoritmu dalam satu platform.</p>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <a href="{{ route('home') }}" class="logo">
            TOP<span>ZONE</span>
        </a>
        <p>© {{ date('Y') }} TopZone. All rights reserved.</p>
    </footer>

    <!-- CAROUSEL JAVASCRIPT -->
    <script>
        const carousel = document.querySelector('.carousel');
        const track = document.querySelector('.carousel-track');
        const slides = document.querySelectorAll('.slide');
        const dotsContainer = document.querySelector('.carousel-dots');

        const prevBtn = document.querySelector('.prev');
        const nextBtn = document.querySelector('.next');

        let currentIndex = 0;
        let autoSlide;

        // Membuat indikator sesuai jumlah banner
        slides.forEach((slide, index) => {
            const dot = document.createElement('button');

            dot.classList.add('dot');
            dot.setAttribute('aria-label', `Banner ${index + 1}`);

            dot.addEventListener('click', () => {
                showSlide(index);
                restartAutoSlide();
            });

            dotsContainer.appendChild(dot);
        });

        const dots = document.querySelectorAll('.dot');

        function showSlide(index) {
            currentIndex = (index + slides.length) % slides.length;

            track.style.transform =
                `translateX(-${currentIndex * 100}%)`;

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentIndex);
            });
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        function startAutoSlide() {
            autoSlide = setInterval(nextSlide, 5000);
        }

        function restartAutoSlide() {
            clearInterval(autoSlide);
            startAutoSlide();
        }

        nextBtn.addEventListener('click', () => {
            nextSlide();
            restartAutoSlide();
        });

        prevBtn.addEventListener('click', () => {
            prevSlide();
            restartAutoSlide();
        });

        // Berhenti sementara saat mouse berada di banner
        carousel.addEventListener('mouseenter', () => {
            clearInterval(autoSlide);
        });

        carousel.addEventListener('mouseleave', () => {
            restartAutoSlide();
        });

        showSlide(0);
        startAutoSlide();
    </script>

</body>
</html>
