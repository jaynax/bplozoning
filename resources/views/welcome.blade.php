<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoning Administration System | Sogod, Southern Leyte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            background-attachment: fixed;
        }
        .hero-gradient {
            background: linear-gradient(to right, #1e40af, #3b82f6);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .soon-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: #ef4444;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            font-weight: bold;
        }
        .carousel-item img {
            max-height: 500px;
            width: 100%;
            object-fit: contain;
            background-color: #f8f9fa;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 15px;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .footer-gradient {
            background: linear-gradient(to right, #1f2937, #374151);
        }
        .social-icon:hover {
            transform: scale(1.2);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="font-sans">

    <nav class="bg-white border-b px-8 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <span class="text-blue-800 font-bold text-xl">eLGU</span>
            <span class="text-gray-400 text-sm border-l pl-2">ZONING</span>
        </div>
        <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:underline">LOGIN</a>
    </nav>

<header class="hero-gradient text-white py-10 px-8 flex items-center justify-between">
    <div class="flex items-center space-x-6">
        <img src="{{ URL::asset('assets/lgu.png') }}" 
             alt="LGU Logo" 
             class="h-20 w-20 rounded-full bg-white p-1 shadow-lg">
        
        <div>
            <h1 class="text-3xl font-bold tracking-tight">ZONING ADMINISTRATION</h1>
            <p class="text-lg opacity-90 uppercase">Municipality of Sogod, Southern Leyte</p>
        </div>
    </div>

    <img src="{{ URL::asset('assets/h.jpg') }}" 
         alt="Bagong Pilipinas" 
         class="h-20 w-20 rounded-full bg-blue-500 p-1 shadow-lg">
</header>

<!-- Image Carousel Section -->
<section class="py-8">
    <div class="container mx-auto px-4">
        <div class="glass-effect rounded-lg p-6 shadow-xl">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="3"></button>
            </div>
            
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL::asset('assets/bplo.jpg') }}" class="d-block w-100" alt="BPLO">
                    <div class="carousel-caption">
                        <h5>Business Permit and Licensing Office</h5>
                        <p>Your partner in business development</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ URL::asset('assets/bplo1.jpg') }}" class="d-block w-100" alt="BPLO 1">
                    <div class="carousel-caption">
                        <h5>Efficient Service Delivery</h5>
                        <p>Streamlined business permit processing</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ URL::asset('assets/bplo2.jpg') }}" class="d-block w-100" alt="BPLO 2">
                    <div class="carousel-caption">
                        <h5>One-Stop Shop</h5>
                        <p>All your business needs in one place</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ URL::asset('assets/bplo3.jpg') }}" class="d-block w-100" alt="BPLO 3">
                    <div class="carousel-caption">
                        <h5>Professional Staff</h5>
                        <p>Dedicated to serve the community</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <img src="{{ URL::asset('assets/LGU.jpg') }}" class="d-block w-100" alt="LGU">
                    <div class="carousel-caption">
                        <h5>Local Government Unit</h5>
                        <p>Serving the people of Sogod</p>
                    </div>
                </div>
            </div>
            
            <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
    </div>
</section>

    <main class="max-w-6xl mx-auto mt-20 text-center px-4">
        <div class="glass-effect rounded-lg p-12 shadow-xl">
            <h2 class="text-blue-700 text-2xl font-semibold mb-2">Zoning & Land Use Permitting System</h2>
            <p class="text-gray-500 uppercase tracking-widest text-sm mb-12">Engage With Us</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="relative bg-white border border-blue-50 rounded-lg p-8 card-hover cursor-pointer">
                <div class="text-blue-600 text-5xl mb-6">
                    <i class="fas fa-map-location-dot"></i>
                </div>
                <h3 class="text-gray-700 font-medium">Locational Clearance</h3>
            </div>

            <div class="relative bg-white border border-blue-50 rounded-lg p-8 card-hover cursor-pointer">
                <span class="soon-badge">Soon</span>
                <div class="text-blue-400 text-5xl mb-6 opacity-60">
                    <i class="fas fa-file-contract"></i>
                </div>
                <h3 class="text-gray-700 font-medium opacity-60">Zoning Certificate</h3>
            </div>

            <div class="relative bg-white border border-blue-50 rounded-lg p-8 card-hover cursor-pointer">
                <div class="text-blue-600 text-5xl mb-6">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <h3 class="text-gray-700 font-medium">Site Inspection</h3>
            </div>

            <div class="relative bg-white border border-blue-50 rounded-lg p-8 card-hover cursor-pointer">
                <span class="soon-badge">Soon</span>
                <div class="text-blue-400 text-5xl mb-6 opacity-60">
                    <i class="fas fa-mountain-city"></i>
                </div>
                <h3 class="text-gray-700 font-medium opacity-60">Land Use Inquiry</h3>
            </div>

        </div>
    </main>

    <div class="fixed bottom-6 right-6 flex flex-col space-y-3">
        <button class="bg-red-500 text-white p-3 rounded-full shadow-lg hover:bg-red-600">
            <i class="fas fa-file-pdf"></i>
        </button>
        <button class="bg-blue-800 text-white p-3 rounded-full shadow-lg hover:bg-blue-900">
            <i class="fas fa-chevron-up"></i>
        </button>
    </div>

    <footer class="footer-gradient text-white mt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h4 class="text-lg font-semibold mb-4">Municipality of Sogod</h4>
                    <p class="text-gray-300 text-sm">
                        Zoning Administration System<br>
                        Southern Leyte, Philippines
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="text-gray-300 hover:text-white">About Us</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Services</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <p class="text-gray-300 text-sm">
                        <i class="fas fa-phone mr-2"></i> (053) 123-4567<br>
                        <i class="fas fa-envelope mr-2"></i> zoning@sogod.gov.ph
                    </p>
                </div>
            </div>
            <div class="border-t border-gray-600 mt-8 pt-6 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2024 Municipality of Sogod, Southern Leyte. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>