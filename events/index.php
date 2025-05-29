<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusConnect | Student Events Hub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #f72585;
            --dark: #212529;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --success: #4cc9f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #ffffff;
            color: var(--dark);
            line-height: 1.6;
        }
        
        /* Navbar Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 1rem 0;
        }
        
        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .logo-icon {
            color: var(--primary);
            font-size: 1.8rem;
        }
        
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .nav-links {
            display: flex;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
            position: relative;
        }
        
        .nav-links a:hover {
            color: var(--primary);
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: var(--primary);
            transition: width 0.3s;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-outline {
            border: 2px solid var(--primary);
            color: var(--primary);
            background: transparent;
        }
        
        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 2px solid var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, rgba(67, 97, 238, 0.1) 0%, rgba(247, 37, 133, 0.1) 100%);
            padding: 5rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80') center/cover;
            opacity: 0.1;
            z-index: -1;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1.2;
        }
        
        .hero p {
            font-size: 1.2rem;
            color: var(--gray);
            margin-bottom: 2rem;
        }
        
        .search-container {
            background: white;
            border-radius: 50px;
            padding: 0.5rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            display: flex;
        }
        
        .search-container input {
            flex: 1;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 50px 0 0 50px;
            font-size: 1rem;
            outline: none;
        }
        
        .search-container button {
            padding: 0 2rem;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .search-container button:hover {
            opacity: 0.9;
        }
        
        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .section-title {
            text-align: center;
            margin: 4rem 0 2rem;
            position: relative;
        }
        
        .section-title h2 {
            font-size: 2.2rem;
            display: inline-block;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .filter-options {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        .filter-btn {
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            background-color: white;
            border: 1px solid var(--light-gray);
            color: var(--gray);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .filter-btn.active, .filter-btn:hover {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            border-color: transparent;
        }
        
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }
        
        .event-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
        }
        
        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .event-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            padding: 0.3rem 1rem;
            border-radius: 30px;
            background-color: var(--secondary);
            color: white;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }
        
        .event-image {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .event-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        }
        
        .event-department {
            position: absolute;
            bottom: 1rem;
            left: 1rem;
            padding: 0.3rem 0.8rem;
            background-color: var(--primary);
            color: white;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 1;
        }
        
        .event-details {
            padding: 1.5rem;
        }
        
        .event-date {
            display: flex;
            align-items: center;
            color: var(--gray);
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
        }
        
        .event-date i {
            margin-right: 0.5rem;
            color: var(--primary);
        }
        
        .event-title {
            font-size: 1.4rem;
            margin-bottom: 0.8rem;
            color: var(--dark);
        }
        
        .event-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        .event-actions {
            display: flex;
            justify-content: space-between;
        }
        
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }
        
        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            padding: 4rem 0;
            margin: 5rem 0;
            color: white;
        }
        
        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 2rem;
            text-align: center;
        }
        
        .stat-item {
            flex: 1;
            min-width: 200px;
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 4rem 0;
            background-color: var(--light);
            border-radius: 12px;
            margin-bottom: 4rem;
        }
        
        .cta-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        
        .cta-section p {
            max-width: 600px;
            margin: 0 auto 2rem;
            color: var(--gray);
        }
        
        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 4rem 0 2rem;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            text-decoration: none;
        }
        
        .footer-logo-icon {
            color: var(--primary);
            font-size: 1.5rem;
        }
        
        .footer-logo-text {
            font-size: 1.2rem;
            font-weight: 700;
            color: white;
        }
        
        .footer-about p {
            color: #adb5bd;
            margin-bottom: 1.5rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
        
        .footer-links h3 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer-links h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary);
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.8rem;
        }
        
        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--primary);
        }
        
        .footer-newsletter input {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 4px;
            margin-bottom: 1rem;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .footer-newsletter input::placeholder {
            color: #adb5bd;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #adb5bd;
            font-size: 0.9rem;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .events-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .navbar-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            .nav-links {
                gap: 1rem;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .search-container {
                flex-direction: column;
                border-radius: 12px;
            }
            
            .search-container input {
                border-radius: 12px 12px 0 0;
            }
            
            .search-container button {
                border-radius: 0 0 12px 12px;
                padding: 0.8rem;
            }
            
            .section-title h2 {
                font-size: 1.8rem;
            }
        }
        
        @media (max-width: 576px) {
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .auth-buttons {
                width: 100%;
                justify-content: center;
            }
            
            .filter-options {
                gap: 0.8rem;
            }
            
            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .event-card {
                min-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="#" class="logo">
                <i class="fas fa-calendar-alt logo-icon"></i>
                <span class="logo-text">CampusConnect</span>
            </a>
            
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Events</a>
                <a href="#">Departments</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div>
            
            <div class="auth-buttons">
                <a href="#" class="btn btn-outline">Login</a>
                <a href="#" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Discover Amazing Campus Events</h1>
            <p>Find, register, and participate in the best student events across all departments</p>
            
            <div class="search-container">
                <input type="text" placeholder="Search events, workshops, seminars...">
                <button><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
    </section>
    
    <!-- Main Content -->
    <main class="container">
        <div class="section-title">
            <h2>Upcoming Events</h2>
        </div>
        
        <div class="filter-options">
            <button class="filter-btn active">All Events</button>
            <button class="filter-btn">Computer Science</button>
            <button class="filter-btn">IT</button>
            <button class="filter-btn">Software Eng.</button>
            <button class="filter-btn">Workshops</button>
            <button class="filter-btn">Hackathons</button>
        </div>
        
        <div class="events-grid">
            <!-- Event 1 -->
            <div class="event-card">
                <div class="event-badge">Featured</div>
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')"></div>
                <div class="event-department">CS</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Oct 15-17, 2023 | 10:00 AM
                    </div>
                    <h3 class="event-title">Annual Hackathon 2023</h3>
                    <p class="event-description">Join the biggest coding competition of the year! 48 hours of non-stop coding, free food, and amazing prizes. Open to all CS students.</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Event 2 -->
            <div class="event-card">
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1581092921461-39b2f2b8a450?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')"></div>
                <div class="event-department">IT</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Nov 5, 2023 | 2:00 PM
                    </div>
                    <h3 class="event-title">Cybersecurity Workshop</h3>
                    <p class="event-description">Learn ethical hacking techniques from industry experts. Hands-on labs included. Limited seats available!</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Event 3 -->
            <div class="event-card">
                <div class="event-badge">New</div>
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1605379399642-870262d3d051?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1506&q=80')"></div>
                <div class="event-department">SE</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Dec 12, 2023 | 9:30 AM
                    </div>
                    <h3 class="event-title">Agile Development Conference</h3>
                    <p class="event-description">Learn how Agile methodologies are transforming software development from industry leaders.</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Event 4 -->
            <div class="event-card">
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80')"></div>
                <div class="event-department">CS</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Jan 20, 2024 | 10:00 AM
                    </div>
                    <h3 class="event-title">Tech Career Fair 2024</h3>
                    <p class="event-description">Meet with top tech companies looking to hire CS graduates. Bring your resume and portfolio!</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Event 5 -->
            <div class="event-card">
                <div class="event-badge">Popular</div>
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')"></div>
                <div class="event-department">IT</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Feb 8, 2024 | 3:00 PM
                    </div>
                    <h3 class="event-title">Data Science Bootcamp</h3>
                    <p class="event-description">Intensive 3-day workshop covering Python, Pandas, and Machine Learning fundamentals.</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Event 6 -->
            <div class="event-card">
                <div class="event-image" style="background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80')"></div>
                <div class="event-department">SE</div>
                <div class="event-details">
                    <div class="event-date">
                        <i class="far fa-calendar-alt"></i> Mar 15, 2024 | 11:00 AM
                    </div>
                    <h3 class="event-title">DevOps Workshop Series</h3>
                    <p class="event-description">Learn CI/CD pipelines, Docker, and Kubernetes in this hands-on workshop series.</p>
                    <div class="event-actions">
                        <a href="#" class="btn btn-primary btn-sm">Register Now</a>
                        <a href="#" class="btn btn-outline btn-sm">Details</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Section -->
        <div class="stats-section">
            <div class="container">
                <div class="stats-container">
                    <div class="stat-item">
                        <div class="stat-number">250+</div>
                        <div class="stat-label">Events Yearly</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5,000+</div>
                        <div class="stat-label">Students</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Departments</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Partners</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA Section -->
        <div class="cta-section">
            <h2>Ready to Explore More Events?</h2>
            <p>Join thousands of students who are already discovering and participating in amazing campus events.</p>
            <a href="#" class="btn btn-primary">Sign Up Now</a>
        </div>
    </main>
    
    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-about">
                <a href="#" class="footer-logo">
                    <i class="fas fa-calendar-alt footer-logo-icon"></i>
                    <span class="footer-logo-text">CampusConnect</span>
                </a>
                <p>The ultimate platform for students to discover and participate in campus events, workshops, and activities.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Departments</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-links">
                <h3>Departments</h3>
                <ul>
                    <li><a href="#">Computer Science</a></li>
                    <li><a href="#">Information Technology</a></li>
                    <li><a href="#">Software Engineering</a></li>
                    <li><a href="#">Electrical Engineering</a></li>
                    <li><a href="#">Mechanical Engineering</a></li>
                </ul>
            </div>
            
            <div class="footer-newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe to get updates about upcoming events.</p>
                <input type="email" placeholder="Your Email">
                <a href="#" class="btn btn-primary">Subscribe</a>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2023 CampusConnect. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
        </div>
    </footer>
</body>
</html>
