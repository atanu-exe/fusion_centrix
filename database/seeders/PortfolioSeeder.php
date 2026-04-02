<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            // Client Website 1
            [
                'title' => 'E-Commerce Platform for Fashion Retailer',
                'slug' => 'ecommerce-fashion-retailer',
                'category' => 'Website',
                'description' => 'Developed a comprehensive e-commerce solution for a high-end fashion retailer. The platform features advanced product filtering, real-time inventory management, integrated payment gateway, and automated order processing. Built with modern responsive design for seamless shopping experience across all devices.',
                'short_description' => 'Advanced e-commerce platform with real-time inventory and payment integration',
                'image_url' => 'https://via.placeholder.com/600x400?text=Fashion+E-Commerce+Store',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Fashion+Store',
                'client_name' => 'Fashion Plus Inc.',
                'client_industry' => 'Retail & Fashion',
                'technologies' => ['Laravel', 'React', 'Stripe API', 'MySQL', 'AWS S3'],
                'project_url' => 'https://example-fashion.com',
                'live_demo_url' => 'https://example-fashion.com',
                'results' => [
                    '250% increase in online sales within first 6 months',
                    '45% improvement in mobile conversion rates',
                    'Reduced cart abandonment by 35%',
                    'Integrated 15+ payment methods globally'
                ],
                'year_completed' => 2024,
                'featured' => true,
            ],

            // Client Website 2
            [
                'title' => 'Corporate Portal & CMS for Educational Institution',
                'slug' => 'corporate-portal-education',
                'category' => 'Website',
                'description' => 'Created a comprehensive corporate portal and content management system for a leading educational institution. Features include student management, course scheduling, assignment submission, results publishing, and parent portal access. Built with scalability in mind to handle thousands of concurrent users.',
                'short_description' => 'Full-featured education portal with student management and parent access',
                'image_url' => 'https://via.placeholder.com/600x400?text=Education+Portal',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Education+Portal',
                'client_name' => 'Global Education Academy',
                'client_industry' => 'Education',
                'technologies' => ['Laravel', 'Vue.js', 'PostgreSQL', 'Redis', 'Docker'],
                'project_url' => 'https://example-education.com',
                'live_demo_url' => 'https://example-education.com',
                'results' => [
                    '5000+ active users managing coursework daily',
                    '40% reduction in administrative overhead',
                    '99.9% uptime achieved',
                    '3000+ concurrent users supported'
                ],
                'year_completed' => 2024,
                'featured' => true,
            ],

            // Graphics - Logo Design
            [
                'title' => 'Brand Identity & Logo System',
                'slug' => 'brand-identity-logo-system',
                'category' => 'Branding',
                'description' => 'Complete brand identity design project including logo creation, brand guidelines, color palette, typography system, and visual elements. Delivered comprehensive brand standards guide ensuring consistency across all marketing materials and platforms.',
                'short_description' => 'Complete logo and brand identity system with comprehensive guidelines',
                'image_url' => 'https://via.placeholder.com/600x400?text=Logo+Design',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Logo+Design',
                'client_name' => 'TechStartup Solutions',
                'client_industry' => 'Technology',
                'technologies' => ['Adobe Illustrator', 'Adobe Photoshop', 'Figma'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    'Modern, scalable logo design',
                    'Complete brand guidelines document',
                    'Color palette and typography established',
                    'Ready for all marketing applications'
                ],
                'year_completed' => 2024,
                'featured' => true,
            ],

            // Graphics - Logo 2
            [
                'title' => 'Creative Logo Design - Digital Agency',
                'slug' => 'logo-design-digital-agency',
                'category' => 'Branding',
                'description' => 'Modern and creative logo design for a digital agency. Features clean lines, professional aesthetics, and versatility across multiple applications. Designed with scalability in mind for both digital and print usage.',
                'short_description' => 'Modern creative logo for digital transformation agency',
                'image_url' => 'https://via.placeholder.com/600x400?text=Agency+Logo',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Agency+Logo',
                'client_name' => 'Digital Transform Inc.',
                'client_industry' => 'Digital Agency',
                'technologies' => ['Adobe Illustrator', 'Figma'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    'Scalable logo design',
                    'Professional and modern aesthetic',
                    'Ready for digital and print',
                    'Multiple format variations'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // Graphics - Logo 3
            [
                'title' => 'Minimalist Logo for Tech Startup',
                'slug' => 'minimalist-logo-tech-startup',
                'category' => 'Branding',
                'description' => 'Minimalist logo design featuring clean lines and modern aesthetics. Perfect for tech companies looking for a contemporary brand identity. The design emphasizes simplicity and brand recognition.',
                'short_description' => 'Minimalist and modern logo design for tech startups',
                'image_url' => 'https://via.placeholder.com/600x400?text=Tech+Logo',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Tech+Logo',
                'client_name' => 'InnovateTech Global',
                'client_industry' => 'Technology',
                'technologies' => ['Adobe Illustrator', 'Design Thinking'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    'Clean minimalist design',
                    'Strong brand recognition',
                    'Versatile across platforms',
                    'Professional appearance'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // Graphics - Poster Design
            [
                'title' => 'Marketing Campaign Poster Series',
                'slug' => 'marketing-campaign-poster',
                'category' => 'Graphics',
                'description' => 'Designed eye-catching poster series for a digital marketing campaign. High-impact visuals optimized for both print and digital distribution. Included multiple variations for A/B testing across different platforms and audiences.',
                'short_description' => 'Professional poster designs for marketing campaigns and promotional use',
                'image_url' => 'https://via.placeholder.com/600x400?text=Marketing+Poster',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Poster',
                'client_name' => 'Digital Marketing Co.',
                'client_industry' => 'Marketing & Advertising',
                'technologies' => ['Adobe InDesign', 'Photoshop', 'Illustrator'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    'Created 12 unique poster variations',
                    '25% higher engagement than previous campaigns',
                    'Print-ready and digital-optimized designs',
                    'Strong brand consistency maintained'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // Graphics - Poster 2
            [
                'title' => 'Social Media Marketing Poster Pack',
                'slug' => 'social-media-poster-pack',
                'category' => 'Graphics',
                'description' => 'Complete poster pack designed specifically for social media platforms. High-resolution designs optimized for Instagram, Facebook, and Twitter. Includes seasonal variations and promotional focused designs.',
                'short_description' => 'Vibrant poster designs optimized for social media promotion',
                'image_url' => 'https://via.placeholder.com/600x400?text=Social+Poster',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Social+Poster',
                'client_name' => 'Social Buzz Agency',
                'client_industry' => 'Social Media Marketing',
                'technologies' => ['Canva Pro', 'Adobe Photoshop'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    '25 unique poster designs',
                    'Optimized for all platforms',
                    '40% increase in social engagement',
                    'Professional quality visuals'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // Graphics - Brochure Design
            [
                'title' => 'Professional Corporate Brochure',
                'slug' => 'professional-corporate-brochure',
                'category' => 'Graphics',
                'description' => 'Comprehensive corporate brochure design featuring company services, team highlights, and portfolio showcase. Created with professional layout, high-quality imagery, and persuasive copywriting. Available in both digital and print formats.',
                'short_description' => 'Corporate brochure with professional layout and high-end design',
                'image_url' => 'https://via.placeholder.com/600x400?text=Corporate+Brochure',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Brochure',
                'client_name' => 'Business Solutions Ltd.',
                'client_industry' => 'Consulting',
                'technologies' => ['InDesign', 'Illustrator', 'Photography'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    '32-page comprehensive brochure',
                    'Professional photography integrated',
                    'Multi-language versions prepared',
                    'Print and PDF formats delivered'
                ],
                'year_completed' => 2023,
                'featured' => false,
            ],

            // Graphics - Brochure 2
            [
                'title' => 'Travel & Tourism Brochure Design',
                'slug' => 'travel-tourism-brochure',
                'category' => 'Graphics',
                'description' => 'Beautiful travel and tourism brochure featuring stunning destination photography, travel packages, and booking information. Designed to inspire wanderlust while maintaining professional presentation.',
                'short_description' => 'Stunning travel brochure with destination photography and tour packages',
                'image_url' => 'https://via.placeholder.com/600x400?text=Travel+Brochure',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Travel+Brochure',
                'client_name' => 'Global Adventure Tours',
                'client_industry' => 'Travel & Tourism',
                'technologies' => ['InDesign', 'Photography'],
                'project_url' => null,
                'live_demo_url' => null,
                'results' => [
                    '24-page travel brochure',
                    'Inspiring destination photography',
                    'Clear package information',
                    'Print-optimized quality'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // Mobile App 1
            [
                'title' => 'On-Demand Service Booking App',
                'slug' => 'ondemand-service-booking-app',
                'category' => 'Mobile App',
                'description' => 'Developed a cross-platform mobile application for on-demand service booking. Features include real-time service provider tracking, payment integration, rating system, and push notifications. Available on both iOS and Android with synchronized backend.',
                'short_description' => 'Cross-platform mobile app for service booking with real-time tracking',
                'image_url' => 'https://via.placeholder.com/600x400?text=Mobile+App',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Mobile+App',
                'client_name' => 'ServiceHub Inc.',
                'client_industry' => 'Service Industry',
                'technologies' => ['Flutter', 'Firebase', 'Node.js', 'Google Maps API'],
                'project_url' => '',
                'live_demo_url' => '',
                'results' => [
                    '50,000+ downloads in first 3 months',
                    '4.8 star rating on app stores',
                    'Real-time tracking with 99.9% accuracy',
                    '10,000+ monthly active users'
                ],
                'year_completed' => 2024,
                'featured' => true,
            ],

            // Mobile App 2
            [
                'title' => 'Fitness & Wellness Tracking Application',
                'slug' => 'fitness-wellness-tracking-app',
                'category' => 'Mobile App',
                'description' => 'Created a comprehensive fitness and wellness tracking application with wearable device integration, personalized workout plans, nutrition tracking, and social features. Includes AI-powered recommendations based on user behavior and goals.',
                'short_description' => 'Advanced fitness app with wearable integration and AI recommendations',
                'image_url' => 'https://via.placeholder.com/600x400?text=Fitness+App',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Fitness+App',
                'client_name' => 'FitLife Global',
                'client_industry' => 'Health & Wellness',
                'technologies' => ['React Native', 'Firebase', 'Machine Learning', 'HealthKit API'],
                'results' => [
                    '100,000+ active users',
                    '4.7 star rating',
                    'Integrated with 20+ wearable devices',
                    '98% app retention rate'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // UI/UX Design
            [
                'title' => 'Hotel Booking Platform UI/UX Design',
                'slug' => 'hotel-booking-platform-uiux',
                'category' => 'UI/UX Design',
                'description' => 'Designed comprehensive user interface and user experience for a hotel booking platform. Created wireframes, prototypes, and high-fidelity designs. Conducted user research and usability testing to optimize conversion funnel.',
                'short_description' => 'Complete UI/UX design for hotel booking and reservation platform',
                'image_url' => 'https://via.placeholder.com/600x400?text=UI+UX+Design',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=UI+UX',
                'client_name' => 'Travel Ventures Co.',
                'client_industry' => 'Travel & Hospitality',
                'technologies' => ['Figma', 'Adobe XD', 'Protopie'],
                'results' => [
                    'Reduced booking time by 40%',
                    'Improved mobile conversion by 55%',
                    'Comprehensive design system delivered',
                    '50+ interactive prototypes created'
                ],
                'year_completed' => 2024,
                'featured' => false,
            ],

            // E-commerce
            [
                'title' => 'SaaS Dashboard & Analytics Platform',
                'slug' => 'saas-dashboard-analytics',
                'category' => 'SaaS',
                'description' => 'Built a comprehensive SaaS analytics dashboard with real-time data visualization, custom reporting, API integration, and multi-tenant architecture. Features role-based access control, data export capabilities, and automated email reports.',
                'short_description' => 'Advanced SaaS analytics platform with real-time data visualization',
                'image_url' => 'https://via.placeholder.com/600x400?text=SaaS+Dashboard',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=SaaS+Dashboard',
                'client_name' => 'Analytics Pro Solutions',
                'client_industry' => 'Technology/SaaS',
                'technologies' => ['Next.js', 'Node.js', 'PostgreSQL', 'Redis', 'Chart.js'],
                'project_url' => 'https://analytics-example.com',
                'live_demo_url' => 'https://analytics-example.com/demo',
                'results' => [
                    '500+ enterprise clients',
                    '$2M+ ARR achieved',
                    '99.99% platform uptime',
                    'Real-time data processing for 1M+ events/day'
                ],
                'year_completed' => 2024,
                'featured' => true,
            ],

            // Custom Software
            [
                'title' => 'Inventory Management System',
                'slug' => 'inventory-management-system',
                'category' => 'Custom Software',
                'description' => 'Developed enterprise-grade inventory management system with features including stock tracking, supplier management, automated reordering, barcode scanning, and comprehensive reporting. Integrated with accounting software and multiple warehouses.',
                'short_description' => 'Enterprise inventory management with multi-warehouse support',
                'image_url' => 'https://via.placeholder.com/600x400?text=Inventory+System',
                'thumb_url' => 'https://via.placeholder.com/300x300?text=Inventory',
                'client_name' => 'Retail Prime Group',
                'client_industry' => 'Retail',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Barcode SDK'],
                'results' => [
                    '30% reduction in inventory costs',
                    '5 warehouse locations integrated',
                    'Automated reordering saving 8 hours/week',
                    '99.8% inventory accuracy achieved'
                ],
                'year_completed' => 2023,
                'featured' => false,
            ]
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }
    }
}
