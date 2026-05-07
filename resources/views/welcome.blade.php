<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SIPUS - Sistem Pengajuan Surat Online</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
        <style>
            :root {
                --corporate-navy: #1a3a52;
                --corporate-teal: #17a2b8;
                --corporate-orange: #fd7e14;
                --corporate-light: #f8f9fa;
                --text-dark: #1a1a1a;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: var(--text-dark);
                line-height: 1.6;
            }

            /* Navbar */
            .navbar {
                background-color: var(--corporate-navy);
                padding: 1rem 0;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            }

            .navbar-brand {
                font-size: 1.3rem;
                font-weight: 700;
                color: white !important;
            }

            .navbar-brand i {
                color: var(--corporate-orange);
                margin-right: 0.5rem;
            }

            .nav-link {
                color: rgba(255,255,255,0.85) !important;
                margin: 0 1rem;
                font-weight: 500;
                transition: all 0.3s ease;
            }

            .nav-link:hover {
                color: var(--corporate-orange) !important;
            }

            /* Hero Section */
            .hero {
                background: linear-gradient(135deg, var(--corporate-navy) 0%, #0f2a3e 100%);
                color: white;
                padding: 6rem 0;
                position: relative;
                overflow: hidden;
            }

            .hero::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -5%;
                width: 600px;
                height: 600px;
                background: rgba(253, 126, 20, 0.05);
                border-radius: 50%;
            }

            .hero::after {
                content: '';
                position: absolute;
                bottom: -30%;
                left: 0;
                width: 400px;
                height: 400px;
                background: rgba(23, 162, 184, 0.05);
                border-radius: 50%;
            }

            .hero-content {
                position: relative;
                z-index: 2;
                max-width: 700px;
            }

            .hero h1 {
                font-size: 3rem;
                font-weight: 800;
                margin-bottom: 1rem;
                letter-spacing: -1px;
            }

            .hero h1 i {
                color: var(--corporate-orange);
                margin-right: 0.5rem;
            }

            .hero p {
                font-size: 1.2rem;
                opacity: 0.95;
                margin-bottom: 2rem;
                line-height: 1.8;
            }

            /* Benefits Section */
            .benefits {
                padding: 5rem 0;
                background-color: var(--corporate-light);
            }

            .benefits h2 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 3rem;
                color: var(--corporate-navy);
            }

            .benefit-item {
                display: flex;
                gap: 2rem;
                margin-bottom: 2rem;
                padding: 2rem;
                background: white;
                border-radius: 12px;
                box-shadow: 0 2px 12px rgba(0,0,0,0.06);
                transition: all 0.3s ease;
            }

            .benefit-item:hover {
                transform: translateX(8px);
                box-shadow: 0 8px 24px rgba(23, 162, 184, 0.15);
            }

            .benefit-icon {
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, var(--corporate-teal) 0%, var(--corporate-navy) 100%);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: white;
                flex-shrink: 0;
            }

            .benefit-content h3 {
                font-size: 1.3rem;
                font-weight: 700;
                color: var(--corporate-navy);
                margin-bottom: 0.5rem;
            }

            .benefit-content p {
                color: #666;
                margin: 0;
            }

            /* Features Grid */
            .features {
                padding: 5rem 0;
            }

            .features h2 {
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 3rem;
                color: var(--corporate-navy);
                text-align: center;
            }

            .feature-card {
                background: white;
                border-radius: 12px;
                padding: 2rem;
                text-align: center;
                box-shadow: 0 2px 12px rgba(0,0,0,0.06);
                transition: all 0.3s ease;
                border-top: 3px solid transparent;
                height: 100%;
            }

            .feature-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 32px rgba(0,0,0,0.12);
                border-top-color: var(--corporate-teal);
            }

            .feature-icon {
                width: 70px;
                height: 70px;
                margin: 0 auto 1.5rem;
                background: linear-gradient(135deg, var(--corporate-teal) 0%, var(--corporate-navy) 100%);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 2rem;
                color: white;
            }

            .feature-card h5 {
                color: var(--corporate-navy);
                font-weight: 700;
                margin-bottom: 1rem;
            }

            .feature-card p {
                color: #666;
                margin: 0;
            }

            /* CTA Section */
            .cta-section {
                background: linear-gradient(135deg, var(--corporate-navy) 0%, #0f2a3e 100%);
                color: white;
                padding: 4rem 0;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .cta-section::before {
                content: '';
                position: absolute;
                top: 0;
                right: -10%;
                width: 400px;
                height: 400px;
                background: rgba(253, 126, 20, 0.05);
                border-radius: 50%;
            }

            .cta-content {
                position: relative;
                z-index: 2;
            }

            .cta-section h2 {
                font-size: 2rem;
                margin-bottom: 1.5rem;
                font-weight: 700;
            }

            .cta-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 2rem;
            }

            .btn-cta {
                padding: 0.9rem 2.5rem;
                font-size: 1rem;
                border-radius: 8px;
                font-weight: 600;
                transition: all 0.3s ease;
                border: 2px solid transparent;
            }

            .btn-cta-primary {
                background-color: var(--corporate-orange);
                color: white;
            }

            .btn-cta-primary:hover {
                background-color: #e86800;
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(253, 126, 20, 0.3);
                color: white;
            }

            .btn-cta-secondary {
                background-color: transparent;
                color: white;
                border-color: white;
            }

            .btn-cta-secondary:hover {
                background-color: white;
                color: var(--corporate-navy);
                transform: translateY(-2px);
            }

            /* Footer */
            footer {
                background-color: var(--corporate-navy);
                color: white;
                padding: 2rem 0;
                text-align: center;
                margin-top: 3rem;
            }

            footer p {
                margin: 0;
                opacity: 0.9;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero h1 {
                    font-size: 2rem;
                }

                .hero p {
                    font-size: 1rem;
                }

                .benefits h2,
                .features h2 {
                    font-size: 1.8rem;
                }

                .benefit-item {
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    gap: 1rem;
                }

                .cta-buttons {
                    flex-direction: column;
                }

                .btn-cta {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <i class="bi bi-building"></i>SIPUS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Fitur</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register">Daftar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-content">
                    <h1><i class="bi bi-file-earmark-check"></i>SIPUS</h1>
                    <p>Sistem Pengajuan Surat Online yang dirancang untuk memudahkan masyarakat dalam mengajukan dokumen administratif secara cepat, aman, dan transparan.</p>
                    <a href="register" class="btn btn-cta btn-cta-primary">
                        <i class="bi bi-arrow-right me-2"></i>Mulai Sekarang
                    </a>
                </div>
            </div>
        </section>

        <!-- Benefits Section -->
        <section class="benefits">
            <div class="container">
                <h2>Mengapa Memilih SIPUS?</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-lightning-charge"></i>
                            </div>
                            <div class="benefit-content">
                                <h3>Proses Cepat</h3>
                                <p>Pengajuan surat dapat diproses dalam waktu singkat tanpa harus datang ke kantor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div class="benefit-content">
                                <h3>Aman & Terpercaya</h3>
                                <p>Data Anda dilindungi dengan enkripsi tingkat enterprise dan server yang aman.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-eye"></i>
                            </div>
                            <div class="benefit-content">
                                <h3>Transparan</h3>
                                <p>Pantau status pengajuan Anda secara real-time kapan saja, di mana saja.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="benefit-item">
                            <div class="benefit-icon">
                                <i class="bi bi-cloud-check"></i>
                            </div>
                            <div class="benefit-content">
                                <h3>Berbasis Cloud</h3>
                                <p>Akses dari perangkat apa pun tanpa perlu instalasi software tambahan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="features">
            <div class="container">
                <h2>Layanan Utama</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-file-text"></i>
                            </div>
                            <h5>Pengajuan Surat</h5>
                            <p>Ajukan berbagai jenis surat seperti surat domisili, usaha, dan surat keterangan lainnya dengan mudah dan cepat.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-chat-left-text"></i>
                            </div>
                            <h5>Dukungan Pelayanan</h5>
                            <p>Hubungi tim support kami untuk bantuan teknis atau pertanyaan seputar proses pengajuan surat.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="feature-card">
                            <div class="feature-icon">
                                <i class="bi bi-clock-history"></i>
                            </div>
                            <h5>Tracking Realtime</h5>
                            <p>Pantau perkembangan pengajuan Anda dari awal hingga surat siap diambil dengan notifikasi otomatis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2>Siap Mengajukan Surat?</h2>
                    <p style="font-size: 1.1rem; opacity: 0.95; margin-bottom: 0;">Daftar sekarang dan nikmati kemudahan pelayanan digital</p>
                    <div class="cta-buttons">
                        <a href="register" class="btn btn-cta btn-cta-primary">
                            <i class="bi bi-person-plus me-2"></i>Daftar Gratis
                        </a>
                        <a href="login" class="btn btn-cta btn-cta-secondary">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Saya Sudah Daftar
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <p><strong>SIPUS</strong> © 2026 — Sistem Pengajuan Surat Online Pemerintah</p>
                <p style="font-size: 0.9rem; margin-top: 0.5rem;">Memudahkan akses layanan administrasi pemerintah untuk semua masyarakat</p>
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
