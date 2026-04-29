<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses - Platform Pembelajaran Online</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 20px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            background: rgba(99, 102, 241, 0.95);
            backdrop-filter: blur(10px);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            font-size: 24px;
            font-weight: 700;
        }

        .logo svg {
            width: 32px;
            height: 32px;
        }

        nav {
            display: flex;
            gap: 35px;
            align-items: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        nav a:hover {
            opacity: 0.8;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
            margin-left: 20px;
        }

        .btn-join {
            background: linear-gradient(135deg, #FF9A56, #FF6B6B);
            color: white;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .btn-join:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 154, 86, 0.4);
        }

        .btn-login {
            background: transparent;
            color: white;
            padding: 12px 28px;
            border: 2px solid white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: white;
            color: #6366F1;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #6366F1 0%, #A855F7 50%, #EC4899 100%);
            min-height: 100vh;
            padding: 120px 60px 80px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 200px;
            background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.1));
        }

        /* Decorative clouds */
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 100px;
        }

        .cloud1 {
            width: 200px;
            height: 60px;
            top: 150px;
            left: 5%;
        }

        .cloud2 {
            width: 300px;
            height: 80px;
            top: 300px;
            left: 2%;
        }

        .cloud3 {
            width: 250px;
            height: 70px;
            top: 200px;
            right: 8%;
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-size: 64px;
            color: white;
            font-weight: 800;
            margin-bottom: 30px;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 20px;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .btn-hero {
            background: linear-gradient(135deg, #FF9A56, #FF6B6B);
            color: white;
            padding: 18px 40px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 18px;
            display: inline-block;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 10px 30px rgba(255, 154, 86, 0.4);
        }

        .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 154, 86, 0.6);
        }

        /* Hero Illustration */
        .hero-illustration {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .illustration-container {
            position: relative;
            width: 100%;
            max-width: 500px;
        }

        .books-stack {
            position: relative;
            z-index: 1;
        }

        .book {
            width: 280px;
            height: 60px;
            background: linear-gradient(135deg, #60A5FA, #3B82F6);
            border-radius: 8px;
            margin-bottom: 15px;
            position: relative;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
        }

        .book::after {
            content: '';
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            width: 30px;
            height: 4px;
            background: rgba(255, 255, 255, 0.4);
        }

        .book:nth-child(2) {
            background: linear-gradient(135deg, #34D399, #10B981);
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.3);
        }

        .book:nth-child(3) {
            background: linear-gradient(135deg, #F59E0B, #D97706);
            box-shadow: 0 10px 30px rgba(217, 119, 6, 0.3);
        }

        .phone-mockup {
            position: absolute;
            right: -50px;
            top: -80px;
            width: 300px;
            height: 580px;
            background: white;
            border-radius: 40px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.3);
            padding: 15px;
            z-index: 2;
        }

        .phone-notch {
            width: 140px;
            height: 30px;
            background: #6366F1;
            margin: 0 auto 10px;
            border-radius: 0 0 20px 20px;
        }

        .phone-screen {
            width: 100%;
            height: calc(100% - 40px);
            background: linear-gradient(to bottom, #F3F4F6, #E5E7EB);
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .video-play {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .video-play::after {
            content: '';
            width: 0;
            height: 0;
            border-left: 25px solid #6366F1;
            border-top: 15px solid transparent;
            border-bottom: 15px solid transparent;
            margin-left: 5px;
        }

        .progress-bars {
            position: absolute;
            bottom: 30px;
            width: 80%;
        }

        .progress-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            margin-bottom: 10px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #FF9A56, #FF6B6B);
            border-radius: 10px;
            width: 60%;
        }

        .person-illustration {
            position: absolute;
            right: 150px;
            bottom: -80px;
            width: 200px;
            height: 350px;
            z-index: 3;
        }

        .person-body {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 180px;
            background: #1F2937;
            border-radius: 40px 40px 10px 10px;
        }

        .person-head {
            position: absolute;
            bottom: 160px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 70px;
            background: #FBBF24;
            border-radius: 50%;
        }

        .person-hair {
            position: absolute;
            top: -20px;
            right: -10px;
            width: 60px;
            height: 80px;
            background: #1F2937;
            border-radius: 50% 50% 0 50%;
        }

        .person-arm {
            position: absolute;
            top: 20px;
            right: -30px;
            width: 80px;
            height: 30px;
            background: #FF9A56;
            border-radius: 20px;
            transform: rotate(-30deg);
        }

        /* Features Section */
        .features {
            padding: 80px 60px;
            background: linear-gradient(to bottom, rgba(236, 72, 153, 0.1), white);
        }

        .features-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .feature-card {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            margin-bottom: 30px;
        }

        .feature-card h3 {
            font-size: 24px;
            color: #6366F1;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .feature-card p {
            color: #64748B;
            line-height: 1.8;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 60px;
            }

            .hero-illustration {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .hero-text h1 {
                font-size: 48px;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 15px 30px;
            }

            nav {
                display: none;
            }

            .hero {
                padding: 100px 30px 60px;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .features {
                padding: 60px 30px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
            </svg>
            <span>Courses</span>
        </div>
        <nav>
            <a href="#home">Home</a>
            <a href="#courses">Courses</a>
            <a href="#about">About</a>
            <a href="#blog">Blog</a>
            <a href="#contact">Contact</a>
            <div class="nav-buttons">
                <a href="#join" class="btn-join">Join</a>
                <a href="#login" class="btn-login">Log In</a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <!-- Decorative clouds -->
        <div class="cloud cloud1"></div>
        <div class="cloud cloud2"></div>
        <div class="cloud cloud3"></div>

        <div class="hero-content">
            <div class="hero-text">
                <h1>Online learning platform</h1>
                <p>Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                <a href="#join" class="btn-hero">Join For Free</a>
            </div>

            <div class="hero-illustration">
                <div class="illustration-container">
                    <div class="books-stack">
                        <div class="book"></div>
                        <div class="book"></div>
                        <div class="book"></div>
                    </div>
                    
                    <div class="phone-mockup">
                        <div class="phone-notch"></div>
                        <div class="phone-screen">
                            <div class="video-play"></div>
                            <div class="progress-bars">
                                <div class="progress-bar">
                                    <div class="progress-fill"></div>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 35%;"></div>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 80%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="person-illustration">
                        <div class="person-head">
                            <div class="person-hair"></div>
                        </div>
                        <div class="person-body">
                            <div class="person-arm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="features-grid">
            <div class="feature-card">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2">
                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                </svg>
                <h3>60+ UX courses</h3>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
            </div>

            <div class="feature-card">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <h3>Expert instructors</h3>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
            </div>

            <div class="feature-card">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="#6366F1" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <h3>Life time access</h3>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
            </div>
        </div>
    </section>
</body>
</html>