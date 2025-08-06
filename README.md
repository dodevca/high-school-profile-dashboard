# High School Profile Dashboard CMS

## About This Project
A content management system (CMS) designed for high schools to manage and display their institutional profiles, announcements, news, events, and other academic information. Built with Laravel, this system provides both administrative tools for managing content and a public-facing interface for visitors to explore the school's profile dynamically.

## Tech Stack & Tools
| Category     | Stack                         |
|--------------|-------------------------------|
| Back-end     | PHP (Laravel Framework)       |
| Front-end    | Blade Templates, Bootstrap, jQuery    |
| Database     | MySQL                         |
| Deployment   | VPS with NGINX/Apache         |

## Key Features
- Modular content management for:
    - School Profile Information
    - Principal Greetings
    - News, Announcements, Events
    - Academic Majors & Teacher Directory
    - Achievements & Gallery Management
    - Learning Modules Repository
- Role-based Access Control (Admin & Public)
- Dynamic search and filtering for content.
- Dashboard with statistical summaries (students, events, achievements).
- SEO-friendly public pages for school branding.
- Fully responsive layout for mobile & desktop.

## Live Demo
Access the live system at:
[https://school.dodevca.com](https://school.dodevca.com)

## Installation and Usage (Local Setup)
1. Clone this repository.
2. Install dependencies via Composer.
    ```bash
    composer install
    ```
3. Copy environment file and configure database credentials.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. Run database migrations and seeders.
    ```bash
    php artisan migrate --seed
    ```
5. Start the development server.
    ```bash
    php artisan serve
    ```
6. Access the application at `http://localhost:8000`.

## Future Improvements
- [ ] Add multi-language support.
- [ ] Implement media library for reusable assets.
- [ ] Integrate a WYSIWYG editor for better content formatting.
- [ ] Add API endpoints for integration with mobile apps.
- [ ] Enhance dashboard analytics with charts & data exports.

## Contributors
This project is collaboratively developed by:
- [Dodevca](https://github.com/dodevca)
- [dedenamikom](https://github.com/dedenamikom)
- [enggaroktaa](https://github.com/enggaroktaa)
- [Gilangsejati](https://github.com/Gilangsejati)
- [YaannnzzZ](https://github.com/YaannnzzZ)

## Contact & Collaboration
Interested in collaborating or enhancing this project?
Reach me at [LinkedIn](https://linkedin.com/in/dodevca) or visit [dodevca.com](https://dodevca.com).

## Signature
Initiated by **Dodevca & Team**, open for collaboration and continuous refinement.