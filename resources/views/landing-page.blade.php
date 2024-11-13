<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 BOGOR | Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo-smkn4.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #0B2239;
            --accent: #4ECDC4;
            --text-light: #F7F9FC;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        /* Header/Navigation */
        .navbar {
            background: transparent;
            padding: 1.5rem 0;
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(11, 34, 57, 0.95);
            padding: 1rem 0;
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 1rem;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #0B2239 0%, #1E3A8A 100%);
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding-top: 80px;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('/assets/images/pattern.png');
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            color: white;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Stats Section */
        .stats-section {
            padding: 5rem 0;
            background: white;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 1.1rem;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 5rem 0;
            background: var(--text-light);
        }

        .gallery-card {
            border-radius: 15px;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .gallery-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .gallery-card:hover img {
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 2rem;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
        }

        /* News Section */
        .news-section {
            padding: 5rem 0;
        }

        .news-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .news-card:hover {
            transform: translateY(-10px);
        }

        /* Principal's Welcome Section */
        .welcome-section {
            padding: 5rem 0;
            background: var(--text-light);
        }

        .welcome-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .welcome-content h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .welcome-content p {
            font-size: 1.1rem;
            color: #666;
        }

        /* Contact Section */
        .contact-section {
            padding: 5rem 0;
            background: var(--primary);
            color: white;
        }

        .contact-info {
            padding: 2rem;
            border-radius: 15px;
            background: rgba(255,255,255,0.1);
        }

        /* Footer */
        footer {
            background: var(--primary);
            color: white;
            padding: 3rem 0 1rem;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 1rem;
            transition: transform 0.3s ease;
        }

        .social-icons a:hover {
            transform: translateY(-5px);
        }

        /* Custom Button */
        .btn-custom {
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background: var(--accent);
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background: #3dbdb5;
            transform: translateY(-3px);
        }

        .gallery-card {
            position: relative;
        }

        .gallery-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
        }

        .prev-btn, .next-btn {
            background: rgba(0,0,0,0.5);
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            cursor: pointer;
        }

        .prev-btn:hover, .next-btn:hover {
            background: rgba(0,0,0,0.8);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white d-flex align-items-center" href="#">
                <img src="/assets/images/logoSMKN4.svg" alt="SMKN 4 BOGOR" height="40" class="me-2">
                <span>SMK Negeri 4 Bogor</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#home" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="#welcome" class="nav-link">Sambutan</a></li>
                    <li class="nav-item"><a href="#gallery" class="nav-link">Galeri</a></li>
                    <li class="nav-item"><a href="#news" class="nav-link">Berita</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Kontak</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1 class="mb-4">Selamat Datang di SMKN 4 BOGOR</h1>
                <p class="mb-5">AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji</p>
                <a href="#welcome" class="btn btn-custom btn-primary-custom">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Principal's Welcome Section -->
    <section id="welcome" class="welcome-section">
        <div class="container">
            <div class="welcome-content">
                <h2>Sambutan Kepala Sekolah</h2>
                <p>Selamat datang di website resmi SMK Negeri 4 Bogor. Kami berkomitmen untuk memberikan pendidikan terbaik dan membentuk generasi yang berakhlak mulia, berilmu, dan terampil. Kami berharap website ini dapat menjadi sarana informasi dan komunikasi yang efektif bagi seluruh warga sekolah dan masyarakat luas.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">1500+</div>
                        <div class="stat-label">Siswa Aktif</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Guru Profesional</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-number">6</div>
                        <div class="stat-label">Program Keahlian</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-section">
        <div class="container">
            <h2 class="text-center mb-5">Galeri Kegiatan</h2>
            <div class="row">
                @if($galleries->isNotEmpty())
                    @foreach($galleries as $gallery)
                        <div class="col-md-4 mb-4">
                            <div class="gallery-card">
                                @if($gallery->fotos->isNotEmpty())
                                    <div class="gallery-images">
                                        @foreach($gallery->fotos as $foto)
                                            <img src="{{ asset('storage/' . $foto->file) }}" 
                                                 alt="{{ $foto->judul }}"
                                                 class="img-fluid {{ !$loop->first ? 'd-none' : '' }}"
                                                 style="height: 250px; object-fit: cover;">
                                        @endforeach
                                    </div>
                                    @if($gallery->fotos->count() > 1)
                                        <div class="gallery-controls">
                                            <button class="prev-btn">&lt;</button>
                                            <button class="next-btn">&gt;</button>
                                        </div>
                                    @endif
                                @else
                                    <img src="{{ asset('storage/default.jpg') }}" 
                                         alt="Default Image"
                                         class="img-fluid"
                                         style="height: 250px; object-fit: cover;">
                                @endif
                                <div class="gallery-overlay">
                                    <h5>{{ $gallery->post->judul ?? 'No Title' }}</h5>
                                    <p>{{ Str::limit($gallery->post->isi ?? 'No Content', 100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <p>Tidak ada galeri tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="news-section">
        <div class="container">
            <h2 class="text-center mb-5">Berita Terkini</h2>
            <div class="row">
                @foreach($latestNewsPosts as $news)
                    <div class="col-md-4 mb-4">
                        <div class="news-card">
                            @php
                                $foto = optional($news->galery)->fotos->first();
                            @endphp
                            
                            @if($foto)
                                <img src="{{ asset('storage/' . $foto->file) }}" 
                                     class="card-img-top" 
                                     alt="{{ $news->judul }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('storage/default.jpg') }}" 
                                     class="card-img-top" 
                                     alt="{{ $news->judul }}"
                                     style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $news->judul }}</h5>
                                <p class="card-text">{{ Str::limit($news->isi, 100) }}</p>
                                <a href="#" class="btn btn-custom btn-primary-custom btn-sm">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">Hubungi Kami</h2>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt me-2"></i> Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
                        <p><i class="fas fa-phone me-2"></i> +62 123 456 789</p>
                        <p><i class="fas fa-envelope me-2"></i> info@smkn4bogor.sch.id</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map-container">
                        <iframe src="https://maps.google.com/maps?width=100%&height=300&hl=en&q=smkn%204%20bogor&t=&z=14&ie=UTF8&iwloc=B&output=embed"
                                width="100%" height="300" frameborder="0" style="border-radius: 15px;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4">
                    <h5 class="mb-3">SMKN 4 BOGOR</h5>
                    <p>KR4BAT (Kejuruan Empat Hebat)<br>AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji</p>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#welcome">Sambutan</a></li>
                        <li><a href="#gallery">Galeri</a></li>
                        <li><a href="#news">Berita</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-3">Social Media</h5>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center pt-4 border-top">
                <small>&copy; 2024 SMKN 4 Bogor. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const galleries = document.querySelectorAll('.gallery-card');
            
            galleries.forEach(gallery => {
                const images = gallery.querySelectorAll('.gallery-images img');
                const prevBtn = gallery.querySelector('.prev-btn');
                const nextBtn = gallery.querySelector('.next-btn');
                let currentIndex = 0;

                if (prevBtn && nextBtn) {
                    prevBtn.addEventListener('click', () => {
                        images[currentIndex].classList.add('d-none');
                        currentIndex = (currentIndex - 1 + images.length) % images.length;
                        images[currentIndex].classList.remove('d-none');
                    });

                    nextBtn.addEventListener('click', () => {
                        images[currentIndex].classList.add('d-none');
                        currentIndex = (currentIndex + 1) % images.length;
                        images[currentIndex].classList.remove('d-none');
                    });
                }
            });
        });
    </script>
</body>
</html>
