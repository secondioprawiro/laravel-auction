# Real-Time Auction App ⚡️

A modern, real-time auction platform built to demonstrate advanced full-stack capabilities using the **TALL stack** (Tailwind, Alpine, Laravel, Livewire) and **WebSockets**.

This project serves as a **portfolio showcase** focusing on real-time data handling, clean architecture, and modern testing practices.

## 🛠 Tech Stack

This application utilizes a modern, robust stack designed for performance and developer experience:

### Backend
- **[Laravel 11](https://laravel.com)** - Core PHP Framework.
- **PHP 8.2+** - Modern PHP features.
- **MySQL 8.0** - Relational database for persistent storage.

### Frontend
- **[Livewire 3](https://livewire.laravel.com)** - Dynamic, reactive interfaces without writing complex JavaScript.
- **[Tailwind CSS](https://tailwindcss.com)** - Utility-first CSS framework for rapid UI development.
- **Blade Templates** - Laravel's powerful native templating engine.
- **Vite** - Next-generation frontend tooling.

### Real-Time & WebSockets
- **[Laravel Reverb](https://reverb.laravel.com)** - First-party WebSocket server for blazing fast real-time communication.
- **Laravel Echo** - Client-side library for listening to broadcast events (e.g., live bids).

### DevOps & Environment
- **[Laravel Sail (Docker)](https://laravel.com/docs/sail)** - Standardized local development environment.
- **WSL 2** - Windows Subsystem for Linux backend.

### Testing
- **[Pest PHP](https://pestphp.com)** - Elegant, minimal testing framework used for Unit & Feature testing.

---

## 🚀 Getting Started

### Prerequisites
- Docker Desktop (running with WSL 2 on Windows)
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd <project-folder>
   ```

2. **Start the environment (Laravel Sail)**
   This will automatically install PHP dependencies, setup the database, and start the servers.
   ```bash
   ./vendor/bin/sail up -d
   ```

3. **Install Frontend Dependencies**
   ```bash
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run build
   ```

4. **Setup Environment**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ./vendor/bin/sail artisan migrate
   ```

5. **Start Real-Time Services**
   The Reverb server must be running to handle WebSocket connections.
   ```bash
   ./vendor/bin/sail artisan reverb:start
   ```

6. **Start Queue Worker**
   Required for processing background bidding jobs.
   ```bash
   ./vendor/bin/sail artisan queue:listen
   ```

Access the application at `http://localhost`.

---

## 🛣 Roadmap & Features

This project focuses on core auction mechanics and code quality rather than broad commercial features.

- [x] **Real-time Bidding Engine**: Updates prices instantly for all users without page reloads.
- [x] **Livewire Components**: Reactive UI for auction rooms and bid forms.
- [ ] **UI/UX Enhancement**: Polishing the user interface for a more modern, premium feel.
- [ ] **Auction Management**: Create and manage auction listings.
- [ ] **Bid History**: Tracking all bids for transparency.
- [ ] **Automated Testing**: High coverage using Pest PHP.

## 📄 License

This project is open-source and available under the [MIT license](https://opensource.org/licenses/MIT).
