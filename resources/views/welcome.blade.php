<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoning Administration System | Sogod, Southern Leyte</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
    </style>
</head>
<body class="bg-gray-50 font-sans">

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
         class="h-20 w-20 bg-blue-500 p-1 shadow-lg">
</header>

    <main class="max-w-6xl mx-auto mt-20 text-center px-4">
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

</body>
</html>