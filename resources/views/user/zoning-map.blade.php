<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoning Map | Municipality of Sogod</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Leaflet CSS and JS for 3D map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <!-- Leaflet WebGL for 3D effects -->
    <script src="https://unpkg.com/leaflet.glify@2.1.0/dist/glify.min.js"></script>
    
    <!-- Leaflet Draw for drawing tools -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    
    <!-- OpenLayers for 3D support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ol@v7.3.0/ol.css">
    <script src="https://cdn.jsdelivr.net/npm/ol@v7.3.0/dist/ol.js"></script>
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-gradient: linear-gradient(180deg, #1e293b 0%, #334155 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: var(--primary-gradient);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .glass-effect {
            background: var(--glass-bg);
            backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-gradient {
            background: var(--sidebar-gradient);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .sidebar-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }
        
        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, rgba(102, 126, 234, 0.2), transparent);
            transition: width 0.3s ease;
        }
        
        .sidebar-item:hover::before {
            width: 100%;
        }
        
        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #667eea;
            transform: translateX(4px);
        }
        
        .sidebar-item.active {
            background: rgba(102, 126, 234, 0.2);
            border-left: 4px solid #667eea;
        }
        
        .sidebar-item.active::before {
            width: 100%;
        }
        
        #map {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            z-index: 1;
        }
        
        .map-controls {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .map-control-btn {
            background: white;
            border: none;
            border-radius: 8px;
            padding: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: all 0.3s ease;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .map-control-btn:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .map-control-btn.active {
            background: #667eea;
            color: white;
        }
        
        .legend {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: white;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            z-index: 1000;
            min-width: 200px;
        }
        
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        
        .legend-color {
            width: 20px;
            height: 20px;
            border-radius: 4px;
            margin-right: 8px;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .zone-info-panel {
            position: absolute;
            top: 20px;
            left: 20px;
            background: white;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            z-index: 1000;
            max-width: 300px;
            display: none;
        }
        
        .zone-info-panel.active {
            display: block;
        }
        
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .mobile-menu.active {
            transform: translateX(0);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            
            .map-controls {
                top: 80px;
                right: 10px;
            }
            
            .legend {
                bottom: 10px;
                left: 10px;
                right: 10px;
                max-width: none;
            }
            
            .zone-info-panel {
                top: 140px;
                left: 10px;
                right: 10px;
                max-width: none;
            }
        }
        
        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .search-container {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            width: 300px;
            max-width: 90%;
        }
        
        .search-input {
            width: 100%;
            padding: 12px 16px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            font-size: 14px;
            outline: none;
        }
        
        .search-input:focus {
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        
        .ol-rotate {
            top: 80px !important;
            right: 10px !important;
        }
        
        .ol-zoom {
            top: 130px !important;
            right: 10px !important;
        }
    </style>
</head>
<body class="font-sans">
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar fixed left-0 top-0 h-full w-64 z-50 sidebar-gradient text-white lg:translate-x-0">
        <div class="p-6 h-full flex flex-col">
            <!-- Logo Section -->
            <div class="flex items-center space-x-3 mb-8">
                <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-shield-alt text-blue-600 text-xl"></i>
                </div>
                <div>
                    <h2 class="text-xl font-bold">eLGU</h2>
                    <p class="text-xs text-gray-300">Zoning System</p>
                </div>
            </div>
            
            <!-- User Profile -->
            <div class="glass-effect rounded-xl p-4 mb-6">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white"></i>
                    </div>
                    <div>
                        <p class="font-semibold text-black text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-black">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Menu -->
            <nav class="space-y-2 flex-1">
                <a href="{{ route('user.dashboard') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-home w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('certificate.create') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-plus-circle w-5 group-hover:scale-110 transition-transform"></i>
                    <span>New Application</span>
                </a>
                <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-list w-5 group-hover:scale-110 transition-transform"></i>
                    <span>My Applications</span>
                </a>
                <a href="{{ route('user.zoning-map') }}" class="sidebar-item active flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-map-marked-alt w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Zoning Map</span>
                </a>
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-file-download w-5 group-hover:scale-110 transition-transform"></i>
                    <span>Documents</span>
                </a>
                <a href="{{ route('certificate.index') }}" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg transition-all group">
                    <i class="fas fa-folder-open w-5 group-hover:scale-110 transition-transform"></i>
                    <span>My Certificates</span>
                </a>
            </nav>
            
            <!-- Bottom Actions -->
            <div class="space-y-2">
                <a href="#" class="sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all group">
                    <i class="fas fa-cog w-5 group-hover:rotate-90 transition-transform duration-300"></i>
                    <span>Settings</span>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="block">
                    @csrf
                    <button type="submit" class="w-full sidebar-item flex items-center space-x-3 p-3 rounded-lg hover:bg-red-500 hover:bg-opacity-20 transition-all text-left group">
                        <i class="fas fa-sign-out-alt w-5 group-hover:translate-x-1 transition-transform"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>
    
    <!-- Main Content -->
    <div class="lg:ml-64 h-screen">
        <!-- Top Navigation -->
        <header class="glass-effect shadow-sm relative z-30">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
                            <i class="fas fa-bars text-gray-600"></i>
                        </button>
                        <div class="ml-4">
                            <h1 class="text-xl font-bold text-gray-900">Zoning Map</h1>
                            <p class="text-sm text-gray-600">Interactive 3D satellite view of Sogod zoning areas</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <!-- Notifications -->
                        <button class="relative p-2 rounded-full hover:bg-gray-100 transition-all group">
                            <i class="fas fa-bell text-gray-600 group-hover:scale-110 transition-transform"></i>
                            <span class="absolute top-0 right-0 h-2 w-2 bg-red-500 rounded-full"></span>
                        </button>
                        <!-- User Menu -->
                        <div class="flex items-center space-x-2 pl-2 border-l border-gray-200">
                            <div class="w-8 h-8 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full flex items-center justify-center ring-2 ring-white">
                                <i class="fas fa-user text-white text-xs"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Map Container -->
        <main class="relative h-[calc(100vh-4rem)]">
            <!-- Loading Spinner -->
            <div id="loadingSpinner" class="loading-spinner">
                <div class="spinner"></div>
            </div>
            
            <!-- Search -->
            <div class="search-container">
                <div class="flex">
                    <input type="text" id="searchInput" class="search-input rounded-l-lg" placeholder="Search for locations in Sogod...">
                    <button id="searchBtn" class="bg-white border-l-0 border border-gray-200 rounded-r-lg px-4 py-3 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-search text-gray-600"></i>
                    </button>
                </div>
            </div>
            
            <!-- Map -->
            <div id="map"></div>
            
            <!-- Map Controls -->
            <div class="map-controls">
                <button id="toggle3D" class="map-control-btn" title="Toggle 3D View">
                    <i class="fas fa-cube"></i>
                </button>
                <button id="toggleSatellite" class="map-control-btn active" title="Toggle Satellite View">
                    <i class="fas fa-satellite"></i>
                </button>
                <button id="toggleZones" class="map-control-btn active" title="Toggle Zoning Layers">
                    <i class="fas fa-layer-group"></i>
                </button>
                <button id="toggleDraw" class="map-control-btn" title="Drawing Tools">
                    <i class="fas fa-draw-polygon"></i>
                </button>
                <button id="resetView" class="map-control-btn" title="Reset View">
                    <i class="fas fa-compress-arrows-alt"></i>
                </button>
            </div>
            
            <!-- Zone Information Panel -->
            <div id="zoneInfoPanel" class="zone-info-panel">
                <h3 class="font-semibold text-gray-900 mb-2">Zone Information</h3>
                <div id="zoneInfoContent">
                    <p class="text-sm text-gray-600">Click on a zone to see details</p>
                </div>
            </div>
            
            <!-- Legend -->
            <div class="legend">
                <h3 class="font-semibold text-gray-900 mb-3">Zoning Legend</h3>
                <div class="legend-item">
                    <div class="legend-color" style="background: #22c55e;"></div>
                    <span class="text-sm">Residential</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #3b82f6;"></div>
                    <span class="text-sm">Commercial</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #f59e0b;"></div>
                    <span class="text-sm">Industrial</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #8b5cf6;"></div>
                    <span class="text-sm">Institutional</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #ef4444;"></div>
                    <span class="text-sm">Agricultural</span>
                </div>
                <div class="legend-item">
                    <div class="legend-color" style="background: #6b7280;"></div>
                    <span class="text-sm">Mixed Use</span>
                </div>
            </div>
        </main>
    </div>

    <script>
        let map;
        let is3D = false;
        let isSatellite = true;
        let showZones = true;
        let drawControl;
        let drawnItems;
        let zoneLayers = [];
        
        // Coordinates for Sogod, Southern Leyte
        const sogodCenter = [124.9768, 10.3116];
        
        // Bing Maps quadkey function
        function tileXYToQuadKey(x, y, z) {
            let quadKey = '';
            for (let i = z; i > 0; i--) {
                let digit = 0;
                let mask = 1 << (i - 1);
                if ((x & mask) !== 0) digit |= 1;
                if ((y & mask) !== 0) digit |= 2;
                quadKey += digit.toString();
            }
            return quadKey;
        }
        
        function initMap() {
            // Create multiple satellite layers for different zoom levels
            const highResSatellite = new ol.layer.Tile({
                source: new ol.source.XYZ({
                    url: 'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
                    attributions: 'Tiles © Esri',
                    maxZoom: 19
                })
            });
            
            // Alternative high-resolution satellite source
            const googleSatellite = new ol.layer.Tile({
                source: new ol.source.XYZ({
                    url: 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',
                    attributions: 'Tiles © Google',
                    maxZoom: 20
                }),
                visible: false
            });
            
            // Bing satellite as backup
            const bingSatellite = new ol.layer.Tile({
                source: new ol.source.XYZ({
                    url: 'https://t1.tiles.virtualearth.net/tiles/a{quadkey}.jpeg?g=1',
                    attributions: 'Tiles © Bing',
                    maxZoom: 19,
                    tileUrlFunction: function(tileCoord) {
                        const z = tileCoord[0];
                        const x = tileCoord[1];
                        const y = -tileCoord[2] - 1;
                        const quadKey = tileXYToQuadKey(x, y, z);
                        return 'https://t1.tiles.virtualearth.net/tiles/a' + quadKey + '.jpeg?g=1';
                    }
                }),
                visible: false
            });
            
            // Create OSM layer for toggling
            const osmLayer = new ol.layer.Tile({
                source: new ol.source.OSM(),
                visible: false
            });
            
            // Initialize OpenLayers map with satellite as default
            map = new ol.Map({
                target: 'map',
                layers: [
                    highResSatellite, // Primary satellite layer (index 0)
                    googleSatellite,  // Backup high-res (index 1)
                    bingSatellite,    // Another backup (index 2)
                    osmLayer         // OSM layer for toggling (index 3)
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat(sogodCenter),
                    zoom: 15,
                    minZoom: 10,
                    maxZoom: 19
                })
            });
            
            // Store layers for easy access
            map.highResSatellite = highResSatellite;
            map.googleSatellite = googleSatellite;
            map.bingSatellite = bingSatellite;
            map.osmLayer = osmLayer;
            
            // Add zoning layers
            addZoningLayers();
            
            // Hide loading spinner
            setTimeout(() => {
                document.getElementById('loadingSpinner').style.display = 'none';
            }, 1000);
            
            // Add map click handler
            map.on('click', function(evt) {
                const coordinate = evt.coordinate;
                const lonLat = ol.proj.toLonLat(coordinate);
                
                // Check if click is on a zone
                const features = map.getFeaturesAtPixel(evt.pixel);
                if (features.length > 0) {
                    const feature = features[0];
                    if (feature.get('zone_type')) {
                        showZoneInfo(feature.getProperties());
                    }
                }
            });
            
            // Handle zoom level changes to switch satellite sources
            map.getView().on('change:resolution', function() {
                const zoom = map.getView().getZoom();
                handleZoomChange(zoom);
            });
        }
        
        function handleZoomChange(zoom) {
            // Switch to higher resolution sources at higher zoom levels
            if (zoom >= 17) {
                // Use Google satellite for very high zoom
                map.highResSatellite.setVisible(false);
                map.googleSatellite.setVisible(true);
                map.bingSatellite.setVisible(false);
            } else if (zoom >= 15) {
                // Use Esri satellite for medium-high zoom
                map.highResSatellite.setVisible(true);
                map.googleSatellite.setVisible(false);
                map.bingSatellite.setVisible(false);
            } else {
                // Use Esri satellite for normal zoom
                map.highResSatellite.setVisible(true);
                map.googleSatellite.setVisible(false);
                map.bingSatellite.setVisible(false);
            }
        }
        
        function addZoningLayers() {
            // Sample zoning data for Sogod
            const zoningData = {
                type: 'FeatureCollection',
                features: [
                    {
                        type: 'Feature',
                        geometry: {
                            type: 'Polygon',
                            coordinates: [[
                                [124.970, 10.315], [124.975, 10.315], [124.975, 10.320], [124.970, 10.320], [124.970, 10.315]
                            ]]
                        },
                        properties: {
                            zone_type: 'Residential',
                            description: 'Low-density residential area',
                            max_height: '10 meters',
                            max_density: '75%'
                        }
                    },
                    {
                        type: 'Feature',
                        geometry: {
                            type: 'Polygon',
                            coordinates: [[
                                [124.975, 10.310], [124.980, 10.310], [124.980, 10.315], [124.975, 10.315], [124.975, 10.310]
                            ]]
                        },
                        properties: {
                            zone_type: 'Commercial',
                            description: 'Central business district',
                            max_height: '15 meters',
                            max_density: '85%'
                        }
                    },
                    {
                        type: 'Feature',
                        geometry: {
                            type: 'Polygon',
                            coordinates: [[
                                [124.980, 10.305], [124.985, 10.305], [124.985, 10.310], [124.980, 10.310], [124.980, 10.305]
                            ]]
                        },
                        properties: {
                            zone_type: 'Industrial',
                            description: 'Light industrial zone',
                            max_height: '20 meters',
                            max_density: '60%'
                        }
                    }
                ]
            };
            
            // Convert GeoJSON to OpenLayers format
            const vectorSource = new ol.source.Vector({
                features: new ol.format.GeoJSON().readFeatures(zoningData, {
                    featureProjection: 'EPSG:3857'
                })
            });
            
            // Create vector layer for zones
            const vectorLayer = new ol.layer.Vector({
                source: vectorSource,
                style: function(feature) {
                    const zoneType = feature.get('zone_type');
                    const color = getZoneColor(zoneType);
                    
                    return new ol.style.Style({
                        fill: new ol.style.Fill({
                            color: color + '99' // Add transparency
                        }),
                        stroke: new ol.style.Stroke({
                            color: '#ffffff',
                            width: 2
                        })
                    });
                }
            });
            
            map.addLayer(vectorLayer);
            zoneLayers.push(vectorLayer);
        }
        
        function getZoneColor(zoneType) {
            const colors = {
                'Residential': '#22c55e',
                'Commercial': '#3b82f6',
                'Industrial': '#f59e0b',
                'Institutional': '#8b5cf6',
                'Agricultural': '#ef4444',
                'Mixed Use': '#6b7280'
            };
            return colors[zoneType] || '#cccccc';
        }
        
        function showZoneInfo(properties) {
            const panel = document.getElementById('zoneInfoPanel');
            const content = document.getElementById('zoneInfoContent');
            
            content.innerHTML = `
                <div class="space-y-2">
                    <div>
                        <span class="font-semibold">Zone Type:</span>
                        <span class="ml-2 px-2 py-1 rounded text-xs font-medium" style="background-color: ${getZoneColor(properties.zone_type)}20; color: ${getZoneColor(properties.zone_type)}">
                            ${properties.zone_type}
                        </span>
                    </div>
                    <div>
                        <span class="font-semibold">Description:</span>
                        <p class="text-sm text-gray-600 mt-1">${properties.description}</p>
                    </div>
                    <div>
                        <span class="font-semibold">Max Height:</span>
                        <span class="ml-2 text-sm">${properties.max_height}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Max Density:</span>
                        <span class="ml-2 text-sm">${properties.max_density}</span>
                    </div>
                </div>
            `;
            
            panel.classList.add('active');
        }
        
        // Control event listeners
        document.getElementById('toggle3D').addEventListener('click', function() {
            is3D = !is3D;
            this.classList.toggle('active');
            
            if (is3D) {
                // Enable 3D view
                const view = map.getView();
                view.animate({
                    center: ol.proj.fromLonLat(sogodCenter),
                    zoom: 16,
                    duration: 1000
                });
                
                // Add 3D effect simulation with CSS
                document.getElementById('map').style.transform = 'perspective(1000px) rotateX(45deg)';
            } else {
                // Reset to 2D
                document.getElementById('map').style.transform = 'none';
                const view = map.getView();
                view.animate({
                    center: ol.proj.fromLonLat(sogodCenter),
                    zoom: 14,
                    duration: 1000
                });
            }
        });
        
        document.getElementById('toggleSatellite').addEventListener('click', function() {
            isSatellite = !isSatellite;
            this.classList.toggle('active');
            
            if (isSatellite) {
                // Show satellite layers, hide OSM layer
                const zoom = map.getView().getZoom();
                handleZoomChange(zoom); // This will show the appropriate satellite layer
                map.osmLayer.setVisible(false);
            } else {
                // Show OSM layer, hide all satellite layers
                map.highResSatellite.setVisible(false);
                map.googleSatellite.setVisible(false);
                map.bingSatellite.setVisible(false);
                map.osmLayer.setVisible(true);
            }
        });
        
        document.getElementById('toggleZones').addEventListener('click', function() {
            showZones = !showZones;
            this.classList.toggle('active');
            
            zoneLayers.forEach(layer => {
                layer.setVisible(showZones);
            });
        });
        
        document.getElementById('toggleDraw').addEventListener('click', function() {
            this.classList.toggle('active');
            // Drawing functionality would require additional implementation
            alert('Drawing tools coming soon!');
        });
        
        document.getElementById('resetView').addEventListener('click', function() {
            const view = map.getView();
            view.animate({
                center: ol.proj.fromLonLat(sogodCenter),
                zoom: 14,
                duration: 1000
            });
            
            // Reset 3D effect
            if (is3D) {
                document.getElementById('map').style.transform = 'none';
                is3D = false;
                document.getElementById('toggle3D').classList.remove('active');
            }
        });
        
        // Search functionality
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const query = this.value;
                if (query) {
                    searchLocation(query);
                }
            }
        });
        
        // Search button click
        document.getElementById('searchBtn').addEventListener('click', function() {
            const query = document.getElementById('searchInput').value;
            if (query) {
                searchLocation(query);
            }
        });
        
        // Also search on button click or when search icon is clicked
        document.getElementById('searchInput').addEventListener('search', function(e) {
            const query = this.value;
            if (query) {
                searchLocation(query);
            }
        });
        
        async function searchLocation(query) {
            // Show loading indicator
            const searchInput = document.getElementById('searchInput');
            const originalPlaceholder = searchInput.placeholder;
            searchInput.placeholder = 'Searching...';
            searchInput.disabled = true;
            
            try {
                // Use Nominatim geocoding service (free, no API key required)
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=5&countrycodes=PH`);
                const results = await response.json();
                
                if (results && results.length > 0) {
                    // Use the first result
                    const result = results[0];
                    const lon = parseFloat(result.lon);
                    const lat = parseFloat(result.lat);
                    
                    // Fly to the location
                    const view = map.getView();
                    view.animate({
                        center: ol.proj.fromLonLat([lon, lat]),
                        zoom: 16,
                        duration: 1500
                    });
                    
                    // Add a marker at the searched location
                    addSearchMarker([lon, lat], result.display_name);
                    
                } else {
                    // Try a more specific search for Sogod area
                    const sogodQuery = `${query}, Sogod, Southern Leyte, Philippines`;
                    const sogodResponse = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(sogodQuery)}&limit=3&countrycodes=PH`);
                    const sogodResults = await sogodResponse.json();
                    
                    if (sogodResults && sogodResults.length > 0) {
                        const result = sogodResults[0];
                        const lon = parseFloat(result.lon);
                        const lat = parseFloat(result.lat);
                        
                        const view = map.getView();
                        view.animate({
                            center: ol.proj.fromLonLat([lon, lat]),
                            zoom: 16,
                            duration: 1500
                        });
                        
                        addSearchMarker([lon, lat], result.display_name);
                    } else {
                        // Show no results message
                        showNotification('Location not found. Try searching for places in Sogod, Southern Leyte.');
                    }
                }
            } catch (error) {
                console.error('Search error:', error);
                showNotification('Search temporarily unavailable. Please try again.');
            } finally {
                // Reset search input
                searchInput.placeholder = originalPlaceholder;
                searchInput.disabled = false;
                searchInput.value = '';
            }
        }
        
        function addSearchMarker(coordinates, displayName) {
            // Remove existing search markers
            if (map.searchMarker) {
                map.removeLayer(map.searchMarker);
            }
            
            // Create a marker feature
            const markerFeature = new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.fromLonLat(coordinates)),
                name: displayName
            });
            
            // Create marker style
            const markerStyle = new ol.style.Style({
                image: new ol.style.Icon({
                    anchor: [0.5, 1],
                    src: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAyNCAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEyIDJDOC4xMzUgMiA1IDUuMTM1IDUgOUM1IDEyLjI2NyA5LjU3NyAyMS4yMzcgMTIgMjZDMTQuNDIzIDIxLjIzNyAxOSAxMi4yNjcgMTkgOUMxOSA1LjEzNSAxNS44NjUgMiAxMiAyWiIgZmlsbD0iI0VGNDRBNCIvPgo8Y2lyY2xlIGN4PSIxMiIgY3k9IjgiIHI9IjMiIGZpbGw9IndoaXRlIi8+Cjwvc3ZnPgo=',
                    scale: 1.5
                })
            });
            
            markerFeature.setStyle(markerStyle);
            
            // Create vector layer for the marker
            const vectorSource = new ol.source.Vector({
                features: [markerFeature]
            });
            
            const vectorLayer = new ol.layer.Vector({
                source: vectorSource
            });
            
            // Add marker to map
            map.addLayer(vectorLayer);
            map.searchMarker = vectorLayer;
            
            // Show location name
            showNotification(`Found: ${displayName}`);
        }
        
        function showNotification(message) {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = 'fixed top-20 left-1/2 transform -translate-x-1/2 bg-white rounded-lg shadow-lg px-4 py-3 z-50 transition-all duration-300';
            notification.innerHTML = `
                <div class="flex items-center space-x-2">
                    <i class="fas fa-info-circle text-blue-500"></i>
                    <span class="text-sm text-gray-700">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
        
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('mobileOverlay').classList.toggle('hidden');
        });
        
        document.getElementById('mobileOverlay').addEventListener('click', function() {
            document.getElementById('sidebar').classList.remove('active');
            this.classList.add('hidden');
        });
        
        // Initialize map when page loads
        window.addEventListener('load', initMap);
    </script>
</body>
</html>
