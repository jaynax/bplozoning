<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificateTemplate;

class CertificateTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $templates = [
            [
                'name' => 'Business Zoning Certificate',
                'slug' => 'business-zoning',
                'category' => 'business',
                'description' => 'For commercial establishments, offices, retail spaces, and other business properties',
                'view_file' => 'certificate.business-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Full Name'],
                    'address' => ['required' => true, 'label' => 'Complete Address'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-briefcase',
                'color' => 'blue',
                'sort_order' => 1
            ],
            [
                'name' => 'Residential Zoning Certificate',
                'slug' => 'residential-zoning',
                'category' => 'residential',
                'description' => 'For houses, apartments, condominiums, and other residential properties',
                'view_file' => 'certificate.residential-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Property Owner'],
                    'address' => ['required' => true, 'label' => 'Property Address'],
                    'lot_number' => ['required' => true, 'label' => 'Lot Number'],
                    'block_number' => ['required' => true, 'label' => 'Block Number'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-home',
                'color' => 'green',
                'sort_order' => 2
            ],
            [
                'name' => 'Land Use Certification',
                'slug' => 'land-use',
                'category' => 'special',
                'description' => 'For land use verification and zoning compliance certification',
                'view_file' => 'certificate.land-use-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Land Owner'],
                    'address' => ['required' => true, 'label' => 'Land Location'],
                    'lot_size' => ['required' => true, 'label' => 'Lot Size (sqm)'],
                    'zone_classification' => ['required' => true, 'label' => 'Zone Classification'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-map-marked-alt',
                'color' => 'orange',
                'sort_order' => 3
            ],
            [
                'name' => 'Building Permit Certificate',
                'slug' => 'building-permit',
                'category' => 'special',
                'description' => 'For building construction permits and compliance certificates',
                'view_file' => 'certificate.building-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Building Owner'],
                    'address' => ['required' => true, 'label' => 'Building Address'],
                    'building_type' => ['required' => true, 'label' => 'Building Type'],
                    'floor_area' => ['required' => true, 'label' => 'Floor Area (sqm)'],
                    'floors' => ['required' => true, 'label' => 'Number of Floors'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-building',
                'color' => 'purple',
                'sort_order' => 4
            ],
            [
                'name' => 'Certificate of Compliance',
                'slug' => 'compliance',
                'category' => 'special',
                'description' => 'For zoning compliance and regulatory certificates',
                'view_file' => 'certificate.compliance-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Applicant Name'],
                    'address' => ['required' => true, 'label' => 'Property Address'],
                    'compliance_type' => ['required' => true, 'label' => 'Compliance Type'],
                    'inspection_date' => ['required' => true, 'label' => 'Inspection Date'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-clipboard-check',
                'color' => 'red',
                'sort_order' => 5
            ],
            [
                'name' => 'Environmental Clearance',
                'slug' => 'environmental',
                'category' => 'special',
                'description' => 'For environmental clearance and compliance certificates',
                'view_file' => 'certificate.environmental-template',
                'fields' => [
                    'owner_name' => ['required' => true, 'label' => 'Project Proponent'],
                    'address' => ['required' => true, 'label' => 'Project Location'],
                    'project_type' => ['required' => true, 'label' => 'Project Type'],
                    'environmental_impact' => ['required' => true, 'label' => 'Environmental Impact Level'],
                    'day' => ['required' => false, 'label' => 'Day'],
                    'month' => ['required' => false, 'label' => 'Month'],
                    'year' => ['required' => false, 'label' => 'Year']
                ],
                'icon' => 'fas fa-leaf',
                'color' => 'green',
                'sort_order' => 6
            ]
        ];

        foreach ($templates as $template) {
            CertificateTemplate::create($template);
        }
    }
}
