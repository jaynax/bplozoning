<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificateDesign;

class CertificateDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designs = [
            // Traditional Designs
            [
                'name' => 'Clean Design',
                'slug' => 'clean',
                'category' => 'traditional',
                'description' => 'Simple and clean design with blue borders',
                'css_class' => 'bg-clean',
                'css_styles' => [
                    'border' => '3px solid #1E40AF',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(30, 64, 175, 0.2)'
                ],
                'sort_order' => 1
            ],
            [
                'name' => 'Elegant Design',
                'slug' => 'elegant',
                'category' => 'traditional',
                'description' => 'Elegant design with decorative corner elements',
                'css_class' => 'bg-elegant',
                'css_styles' => [
                    'border' => '3px solid #1E40AF',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(30, 64, 175, 0.2)',
                    'pseudo_elements' => [
                        'corners' => 'blue circles with opacity'
                    ]
                ],
                'sort_order' => 2
            ],
            [
                'name' => 'Classic Design',
                'slug' => 'classic',
                'category' => 'traditional',
                'description' => 'Classic design with diagonal lines',
                'css_class' => 'bg-classic',
                'css_styles' => [
                    'border' => '3px solid #92400E',
                    'padding' => '40px',
                    'background' => '#FEF3C7',
                    'box_shadow' => '0 0 20px rgba(146, 64, 14, 0.2)',
                    'pattern' => 'diagonal lines'
                ],
                'sort_order' => 3
            ],
            [
                'name' => 'Modern Design',
                'slug' => 'modern',
                'category' => 'modern',
                'description' => 'Modern design with gradient borders',
                'css_class' => 'bg-modern',
                'css_styles' => [
                    'border' => '3px solid #0D9488',
                    'padding' => '40px',
                    'background' => 'linear-gradient(to bottom right, #F0FDFA, #E0F2FE)',
                    'box_shadow' => '0 0 20px rgba(13, 148, 136, 0.2)',
                    'gradient_borders' => 'teal to blue'
                ],
                'sort_order' => 4
            ],
            [
                'name' => 'Royal Design',
                'slug' => 'royal',
                'category' => 'traditional',
                'description' => 'Royal design with purple gradient',
                'css_class' => 'bg-royal',
                'css_styles' => [
                    'border' => '3px solid #7C3AED',
                    'padding' => '40px',
                    'background' => 'linear-gradient(to bottom right, #FAF5FF, #FDF2F8)',
                    'box_shadow' => '0 0 20px rgba(124, 58, 237, 0.2)',
                    'corner_circles' => 'purple'
                ],
                'sort_order' => 5
            ],
            [
                'name' => 'Minimal Design',
                'slug' => 'minimal',
                'category' => 'modern',
                'description' => 'Minimal design with simple gray borders',
                'css_class' => 'bg-minimal',
                'css_styles' => [
                    'border' => '1px solid #6B7280',
                    'padding' => '40px',
                    'background' => '#F9FAFB',
                    'box_shadow' => 'none'
                ],
                'sort_order' => 6
            ],

            // Border-Only Designs
            [
                'name' => 'Side Border',
                'slug' => 'sideborder',
                'category' => 'border',
                'description' => 'Design with side borders only',
                'css_class' => 'bg-sideborder',
                'css_styles' => [
                    'border' => '3px solid #059669',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(5, 150, 105, 0.2)',
                    'side_borders' => 'green'
                ],
                'sort_order' => 7
            ],
            [
                'name' => 'Corner Design',
                'slug' => 'corner',
                'category' => 'border',
                'description' => 'Design with corner decorations',
                'css_class' => 'bg-corner',
                'css_styles' => [
                    'border' => '3px solid #DC2626',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(220, 38, 38, 0.2)',
                    'corner_decorations' => 'red'
                ],
                'sort_order' => 8
            ],
            [
                'name' => 'Frame Design',
                'slug' => 'frame',
                'category' => 'border',
                'description' => 'Design with inner frame',
                'css_class' => 'bg-frame',
                'css_styles' => [
                    'border' => '3px solid #4338CA',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(67, 56, 202, 0.2)',
                    'inner_frame' => 'indigo'
                ],
                'sort_order' => 9
            ],
            [
                'name' => 'Ornamental Design',
                'slug' => 'ornamental',
                'category' => 'border',
                'description' => 'Design with ornamental borders',
                'css_class' => 'bg-ornamental',
                'css_styles' => [
                    'border' => '3px solid #CA8A04',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(202, 138, 4, 0.2)',
                    'gradient_borders' => 'yellow'
                ],
                'sort_order' => 10
            ],
            [
                'name' => 'Vintage Design',
                'slug' => 'vintage',
                'category' => 'border',
                'description' => 'Vintage design with double borders',
                'css_class' => 'bg-vintage',
                'css_styles' => [
                    'border' => '3px solid #EA580C',
                    'padding' => '40px',
                    'background' => '#FFF7ED',
                    'box_shadow' => '0 0 20px rgba(234, 88, 12, 0.2)',
                    'double_borders' => 'orange'
                ],
                'sort_order' => 11
            ],
            [
                'name' => 'Elegant Border',
                'slug' => 'elegantborder',
                'category' => 'border',
                'description' => 'Design with elegant multiple borders',
                'css_class' => 'bg-elegantborder',
                'css_styles' => [
                    'border' => '3px solid #DB2777',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(219, 39, 119, 0.2)',
                    'multiple_borders' => 'pink'
                ],
                'sort_order' => 12
            ],

            // Pattern Designs
            [
                'name' => 'Stripes Design',
                'slug' => 'stripes',
                'category' => 'pattern',
                'description' => 'Design with diagonal stripes',
                'css_class' => 'bg-stripes',
                'css_styles' => [
                    'border' => '3px solid #2563EB',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(37, 99, 235, 0.2)',
                    'pattern' => 'diagonal stripes blue'
                ],
                'sort_order' => 13
            ],
            [
                'name' => 'Spots Design',
                'slug' => 'spots',
                'category' => 'pattern',
                'description' => 'Design with circular spots',
                'css_class' => 'bg-spots',
                'css_styles' => [
                    'border' => '3px solid #059669',
                    'padding' => '40px',
                    'background' => '#ECFDF5',
                    'box_shadow' => '0 0 20px rgba(5, 150, 105, 0.2)',
                    'pattern' => 'circular spots green'
                ],
                'sort_order' => 14
            ],
            [
                'name' => 'Dots Design',
                'slug' => 'dots',
                'category' => 'pattern',
                'description' => 'Design with dot grid pattern',
                'css_class' => 'bg-dots',
                'css_styles' => [
                    'border' => '3px solid #9333EA',
                    'padding' => '40px',
                    'background' => '#F3E8FF',
                    'box_shadow' => '0 0 20px rgba(147, 51, 234, 0.2)',
                    'pattern' => 'dot grid purple'
                ],
                'sort_order' => 15
            ],
            [
                'name' => 'Chevron Design',
                'slug' => 'chevron',
                'category' => 'pattern',
                'description' => 'Design with chevron pattern',
                'css_class' => 'bg-chevron',
                'css_styles' => [
                    'border' => '3px solid #DC2626',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(220, 38, 38, 0.2)',
                    'pattern' => 'chevron herringbone red'
                ],
                'sort_order' => 16
            ],

            // Ribbon & Decorative Designs
            [
                'name' => 'Ribbon Design',
                'slug' => 'ribbon',
                'category' => 'decorative',
                'description' => 'Design with ribbon borders',
                'css_class' => 'bg-ribbon',
                'css_styles' => [
                    'border' => '3px solid #2563EB',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(37, 99, 235, 0.2)',
                    'ribbon_borders' => 'blue gradient'
                ],
                'sort_order' => 17
            ],
            [
                'name' => 'Medallion Design',
                'slug' => 'medallion',
                'category' => 'decorative',
                'description' => 'Design with golden medallion',
                'css_class' => 'bg-medallion',
                'css_styles' => [
                    'border' => '3px solid #CA8A04',
                    'padding' => '40px',
                    'background' => '#FEF3C7',
                    'box_shadow' => '0 0 20px rgba(202, 138, 4, 0.2)',
                    'center_medallion' => 'golden circles'
                ],
                'sort_order' => 18
            ],
            [
                'name' => 'Laurel Design',
                'slug' => 'laurel',
                'category' => 'decorative',
                'description' => 'Design with laurel wreaths',
                'css_class' => 'bg-laurel',
                'css_styles' => [
                    'border' => '3px solid #059669',
                    'padding' => '40px',
                    'background' => '#ECFDF5',
                    'box_shadow' => '0 0 20px rgba(5, 150, 105, 0.2)',
                    'laurel_wreaths' => 'green corners'
                ],
                'sort_order' => 19
            ],
            [
                'name' => 'Star Design',
                'slug' => 'star',
                'category' => 'decorative',
                'description' => 'Design with star decorations',
                'css_class' => 'bg-star',
                'css_styles' => [
                    'border' => '3px solid #7C3AED',
                    'padding' => '40px',
                    'background' => '#F3E8FF',
                    'box_shadow' => '0 0 20px rgba(124, 58, 237, 0.2)',
                    'star_decorations' => 'purple corners'
                ],
                'sort_order' => 20
            ],
            [
                'name' => 'Seal Design',
                'slug' => 'seal',
                'category' => 'decorative',
                'description' => 'Design with official seal',
                'css_class' => 'bg-seal',
                'css_styles' => [
                    'border' => '3px solid #DC2626',
                    'padding' => '40px',
                    'background' => '#FEF2F2',
                    'box_shadow' => '0 0 20px rgba(220, 38, 38, 0.2)',
                    'official_seal' => 'red concentric circles'
                ],
                'sort_order' => 21
            ],
            [
                'name' => 'Emblem Design',
                'slug' => 'emblem',
                'category' => 'decorative',
                'description' => 'Design with diamond emblem',
                'css_class' => 'bg-emblem',
                'css_styles' => [
                    'border' => '3px solid #4338CA',
                    'padding' => '40px',
                    'background' => '#EEF2FF',
                    'box_shadow' => '0 0 20px rgba(67, 56, 202, 0.2)',
                    'diamond_emblem' => 'indigo rotated squares'
                ],
                'sort_order' => 22
            ],

            // Wave Designs
            [
                'name' => 'Wave Design',
                'slug' => 'wave',
                'category' => 'wave',
                'description' => 'Design with wave borders',
                'css_class' => 'bg-wave',
                'css_styles' => [
                    'border' => '3px solid #0891B2',
                    'padding' => '40px',
                    'background' => 'white',
                    'box_shadow' => '0 0 20px rgba(8, 145, 178, 0.2)',
                    'wave_borders' => 'cyan elliptical'
                ],
                'sort_order' => 23
            ],
            [
                'name' => 'Ocean Wave',
                'slug' => 'oceanwave',
                'category' => 'wave',
                'description' => 'Design with ocean wave pattern',
                'css_class' => 'bg-oceanwave',
                'css_styles' => [
                    'border' => '3px solid #0EA5E9',
                    'padding' => '40px',
                    'background' => '#F0F9FF',
                    'box_shadow' => '0 0 20px rgba(14, 165, 233, 0.2)',
                    'ocean_waves' => 'blue triangular waves'
                ],
                'sort_order' => 24
            ],
            [
                'name' => 'Ripple Wave',
                'slug' => 'ripplewave',
                'category' => 'wave',
                'description' => 'Design with ripple effect',
                'css_class' => 'bg-ripplewave',
                'css_styles' => [
                    'border' => '3px solid #14B8A6',
                    'padding' => '40px',
                    'background' => '#F0FDFA',
                    'box_shadow' => '0 0 20px rgba(20, 184, 166, 0.2)',
                    'ripple_effect' => 'teal concentric circles'
                ],
                'sort_order' => 25
            ],
            [
                'name' => 'Zigzag Wave',
                'slug' => 'zigzagwave',
                'category' => 'wave',
                'description' => 'Design with zigzag waves',
                'css_class' => 'bg-zigzagwave',
                'css_styles' => [
                    'border' => '3px solid #9333EA',
                    'padding' => '40px',
                    'background' => '#FAF5FF',
                    'box_shadow' => '0 0 20px rgba(147, 51, 234, 0.2)',
                    'zigzag_waves' => 'purple angular pattern'
                ],
                'sort_order' => 26
            ],
            [
                'name' => 'Flow Wave',
                'slug' => 'flowwave',
                'category' => 'wave',
                'description' => 'Design with flowing waves',
                'css_class' => 'bg-flowwave',
                'css_styles' => [
                    'border' => '3px solid #22C55E',
                    'padding' => '40px',
                    'background' => '#F0FDF4',
                    'box_shadow' => '0 0 20px rgba(34, 197, 94, 0.2)',
                    'flowing_waves' => 'green elliptical'
                ],
                'sort_order' => 27
            ],
            [
                'name' => 'Spiral Wave',
                'slug' => 'spiralwave',
                'category' => 'wave',
                'description' => 'Design with spiral waves',
                'css_class' => 'bg-spiralwave',
                'css_styles' => [
                    'border' => '3px solid #F97316',
                    'padding' => '40px',
                    'background' => '#FFF7ED',
                    'box_shadow' => '0 0 20px rgba(249, 115, 22, 0.2)',
                    'spiral_waves' => 'orange dashed circles'
                ],
                'sort_order' => 28
            ],
            [
                'name' => 'Wave Border',
                'slug' => 'waveborder',
                'category' => 'wave',
                'description' => 'Design with detailed wave border',
                'css_class' => 'bg-waveborder',
                'css_styles' => [
                    'border' => '3px solid #06B6D4',
                    'padding' => '40px',
                    'background' => '#ECFEFF',
                    'box_shadow' => '0 0 20px rgba(6, 182, 212, 0.2)',
                    'detailed_wave_border' => 'cyan complex waves'
                ],
                'sort_order' => 29
            ]
        ];

        foreach ($designs as $design) {
            CertificateDesign::create($design);
        }
    }
}
