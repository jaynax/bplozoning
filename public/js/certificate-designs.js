class CertificateDesignManager {
    constructor() {
        this.designs = [];
        this.currentDesign = 'elegant';
        this.init();
    }

    async init() {
        await this.loadDesigns();
        this.setupEventListeners();
        this.renderDesignGallery();
    }

    async loadDesigns() {
        try {
            const response = await fetch('/certificate-designs');
            const data = await response.json();
            this.designs = data.designs;
            console.log('Certificate designs loaded:', this.designs);
        } catch (error) {
            console.error('Error loading certificate designs:', error);
            // Fallback to hardcoded designs if API fails
            this.loadFallbackDesigns();
        }
    }

    loadFallbackDesigns() {
        // Fallback designs in case API fails
        this.designs = {
            traditional: [
                { name: 'Clean Design', slug: 'clean', css_class: 'bg-clean' },
                { name: 'Elegant Design', slug: 'elegant', css_class: 'bg-elegant' },
                { name: 'Classic Design', slug: 'classic', css_class: 'bg-classic' },
                { name: 'Modern Design', slug: 'modern', css_class: 'bg-modern' },
                { name: 'Royal Design', slug: 'royal', css_class: 'bg-royal' },
                { name: 'Minimal Design', slug: 'minimal', css_class: 'bg-minimal' }
            ],
            border: [
                { name: 'Side Border', slug: 'sideborder', css_class: 'bg-sideborder' },
                { name: 'Corner Design', slug: 'corner', css_class: 'bg-corner' },
                { name: 'Frame Design', slug: 'frame', css_class: 'bg-frame' },
                { name: 'Ornamental Design', slug: 'ornamental', css_class: 'bg-ornamental' },
                { name: 'Vintage Design', slug: 'vintage', css_class: 'bg-vintage' },
                { name: 'Elegant Border', slug: 'elegantborder', css_class: 'bg-elegantborder' }
            ],
            pattern: [
                { name: 'Stripes Design', slug: 'stripes', css_class: 'bg-stripes' },
                { name: 'Spots Design', slug: 'spots', css_class: 'bg-spots' },
                { name: 'Dots Design', slug: 'dots', css_class: 'bg-dots' },
                { name: 'Chevron Design', slug: 'chevron', css_class: 'bg-chevron' }
            ],
            decorative: [
                { name: 'Ribbon Design', slug: 'ribbon', css_class: 'bg-ribbon' },
                { name: 'Medallion Design', slug: 'medallion', css_class: 'bg-medallion' },
                { name: 'Laurel Design', slug: 'laurel', css_class: 'bg-laurel' },
                { name: 'Star Design', slug: 'star', css_class: 'bg-star' },
                { name: 'Seal Design', slug: 'seal', css_class: 'bg-seal' },
                { name: 'Emblem Design', slug: 'emblem', css_class: 'bg-emblem' }
            ],
            wave: [
                { name: 'Wave Design', slug: 'wave', css_class: 'bg-wave' },
                { name: 'Ocean Wave', slug: 'oceanwave', css_class: 'bg-oceanwave' },
                { name: 'Ripple Wave', slug: 'ripplewave', css_class: 'bg-ripplewave' },
                { name: 'Zigzag Wave', slug: 'zigzagwave', css_class: 'bg-zigzagwave' },
                { name: 'Flow Wave', slug: 'flowwave', css_class: 'bg-flowwave' },
                { name: 'Spiral Wave', slug: 'spiralwave', css_class: 'bg-spiralwave' },
                { name: 'Wave Border', slug: 'waveborder', css_class: 'bg-waveborder' }
            ]
        };
    }

    setupEventListeners() {
        // Toggle design panel
        const toggleButton = document.querySelector('[onclick="toggleDesignPanel()"]');
        if (toggleButton) {
            toggleButton.addEventListener('click', () => this.toggleDesignPanel());
        }

        // Close panel when clicking outside
        document.addEventListener('click', (e) => {
            const panel = document.getElementById('design-panel');
            if (panel && !panel.contains(e.target) && !e.target.closest('[onclick*="toggleDesignPanel"]')) {
                panel.classList.add('hidden');
            }
        });
    }

    renderDesignGallery() {
        const panel = document.getElementById('design-panel');
        if (!panel) return;

        const gallery = panel.querySelector('.grid');
        if (!gallery) return;

        gallery.innerHTML = '';

        Object.entries(this.designs).forEach(([category, designs]) => {
            designs.forEach(design => {
                const designElement = this.createDesignThumbnail(design, category);
                gallery.appendChild(designElement);
            });
        });
    }

    createDesignThumbnail(design, category) {
        const div = document.createElement('div');
        div.className = 'text-center cursor-pointer hover:bg-gray-50 p-2 rounded-lg border-2 border-transparent hover:border-blue-400 transition-all';
        div.onclick = () => this.selectDesign(design.slug, design.name);

        const thumbnail = document.createElement('div');
        thumbnail.className = `w-full h-20 bg-white border-2 border-gray-300 rounded mb-2 flex items-center justify-center ${design.css_class}`;
        thumbnail.style.minHeight = '80px';

        const content = document.createElement('div');
        content.className = 'text-xs text-center';
        content.innerHTML = `
            <div class="w-6 h-6 bg-gray-600 rounded-full mx-auto mb-1"></div>
            <div class="text-gray-700 font-bold text-xs">${design.name.split(' ')[0]}</div>
        `;

        thumbnail.appendChild(content);
        div.appendChild(thumbnail);

        const label = document.createElement('p');
        label.className = 'text-xs font-medium';
        label.textContent = design.name;
        div.appendChild(label);

        return div;
    }

    selectDesign(slug, name) {
        // Remove all background classes
        const certificate = document.getElementById('certificate-border');
        if (!certificate) return;

        // Remove all possible background classes
        const allClasses = [
            'bg-clean', 'bg-elegant', 'bg-classic', 'bg-modern', 'bg-royal', 'bg-minimal',
            'bg-sideborder', 'bg-corner', 'bg-frame', 'bg-ornamental', 'bg-vintage', 'bg-elegantborder',
            'bg-stripes', 'bg-spots', 'bg-dots', 'bg-chevron',
            'bg-ribbon', 'bg-medallion', 'bg-laurel', 'bg-wave', 'bg-star', 'bg-seal', 'bg-emblem',
            'bg-oceanwave', 'bg-ripplewave', 'bg-zigzagwave', 'bg-flowwave', 'bg-spiralwave', 'bg-waveborder'
        ];

        certificate.classList.remove(...allClasses);
        certificate.classList.add(`bg-${slug}`);

        // Update button text
        const buttonText = document.getElementById('current-design-text');
        if (buttonText) {
            buttonText.textContent = name;
        }

        // Hide panel
        const panel = document.getElementById('design-panel');
        if (panel) {
            panel.classList.add('hidden');
        }

        // Save to localStorage
        localStorage.setItem('selectedCertificateDesign', slug);
        this.currentDesign = slug;

        console.log(`Selected design: ${name} (${slug})`);
    }

    toggleDesignPanel() {
        const panel = document.getElementById('design-panel');
        if (panel) {
            panel.classList.toggle('hidden');
        }
    }

    // Load saved design from localStorage
    loadSavedDesign() {
        const savedDesign = localStorage.getItem('selectedCertificateDesign');
        if (savedDesign) {
            this.selectDesign(savedDesign, this.getDesignName(savedDesign));
        }
    }

    getDesignName(slug) {
        // Find design name by slug
        for (const [category, designs] of Object.entries(this.designs)) {
            const design = designs.find(d => d.slug === slug);
            if (design) return design.name;
        }
        return 'Elegant Design'; // fallback
    }

    // Save design to user preferences (if logged in)
    async saveDesignPreference(slug) {
        try {
            const response = await fetch('/user/preferences', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                },
                body: JSON.stringify({
                    certificate_design: slug
                })
            });
            
            if (response.ok) {
                console.log('Design preference saved');
            }
        } catch (error) {
            console.error('Error saving design preference:', error);
        }
    }
}

// Initialize the design manager when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.certificateDesignManager = new CertificateDesignManager();
});

// Global functions for backward compatibility
function toggleDesignPanel() {
    if (window.certificateDesignManager) {
        window.certificateDesignManager.toggleDesignPanel();
    }
}

function selectDesign(slug, name) {
    if (window.certificateDesignManager) {
        window.certificateDesignManager.selectDesign(slug, name);
    }
}
