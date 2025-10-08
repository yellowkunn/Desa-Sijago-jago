# 🚀 Project Setup Guide

## ⚙️ Version
- **Laravel Framework:** v10.48.29  
- **Tailwind CSS:** v3.4.17  

---

## 🧩 Installation Steps

1. **Clone the project**
   ```bash
   cd the-project
   npm install -D tailwindcss@3 postcss autoprefixer npx tailwindcss init -p
   php artisan key:generate
   php artisan:migrate
   php artisan migrate:fresh --seed
   php artisan serve
   npm run dev
