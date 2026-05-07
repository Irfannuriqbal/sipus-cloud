# SIPUS - Sistem Pengajuan Surat Online

SIPUS adalah aplikasi web fullstack modern untuk pelayanan publik dalam pengajuan surat online seperti surat domisili, surat usaha, surat pengantar, dan surat keterangan lainnya.

## 🎯 Fitur Utama

### Untuk User (Masyarakat)

- ✅ Register dan Login dengan aman
- ✅ Dashboard personal dengan statistik
- ✅ Pengajuan surat dalam 4 jenis: Domisili, Usaha, Pengantar, Tidak Mampu
- ✅ Upload dokumen (KTP, KK) dengan validasi
- ✅ Tracking status pengajuan real-time
- ✅ Download surat setelah selesai diproses
- ✅ Riwayat lengkap pengajuan

### Untuk Admin

- ✅ Dashboard admin dengan statistik komprehensif
- ✅ Kelola semua pengajuan dari user
- ✅ Verifikasi dokumen
- ✅ Update status pengajuan
- ✅ Upload file surat final (PDF)
- ✅ Tambah catatan untuk user
- ✅ Manajemen user

## 🛠️ Stack Teknologi

- **Backend**: Laravel 11
- **Database**: MySQL 8.0
- **Frontend**: Bootstrap 5, Blade Templating
- **Authentication**: Laravel Breeze
- **File Storage**: Laravel Storage (mudah migrasi ke AWS S3)
- **Containerization**: Docker & Docker Compose
- **Web Server**: Nginx
- **Process Manager**: Supervisor

## 📋 Requirements

### Local Development

- PHP 8.3+
- Composer
- MySQL 8.0+
- Node.js 18+ (untuk asset compilation)
- Docker & Docker Compose (opsional, untuk development dengan container)

### Production

- Docker 20.10+
- Docker Compose 2.0+
- AWS ECS (untuk orchestration)
- AWS RDS (untuk database management)
- AWS S3 (untuk file storage)
- AWS CloudFront (untuk CDN)

## 🚀 Quick Start (Local Development)

### 1. Clone Repository

```bash
cd "c:\Users\irfan\OneDrive\Documents\Irfan Nur Iqbal\KULIAH\Semester 6\KOMPUTASI AWAN\UTS 2"
cd sipus
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Setup Environment

```bash
# Copy .env.example ke .env
cp .env.example .env

# Generate application key
php artisan key:generate

# Setup database connection di .env
# DB_HOST=127.0.0.1
# DB_DATABASE=sipus
# DB_USERNAME=root
# DB_PASSWORD=
```

### 4. Create Database

```bash
# Buat database MySQL
mysql -u root -p
CREATE DATABASE sipus;
EXIT;
```

### 5. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Build Assets

```bash
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 🔐 Default Credentials

### Admin Account

- Email: `admin@sipus.com`
- Password: `password`

### User Account

- Email: `user@sipus.com`
- Password: `password`

## 🐳 Running with Docker

### 1. Build dan Run Container

```bash
docker-compose up -d
```

### 2. Verify Services

```bash
# Check container status
docker-compose ps

# View application logs
docker-compose logs -f app
```

### 3. Access Application

- Web: `http://localhost`
- MySQL: `localhost:3306` (user: sipus, password: password)

### 4. Running Commands in Container

```bash
# Run artisan command
docker-compose exec app php artisan tinker

# Access CLI container
docker-compose exec cli bash

# View logs
docker-compose logs -f app
```

## 📁 Project Structure

```
sipus/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Business logic
│   │   ├── Middleware/         # Role-based middleware
│   │   └── Requests/           # Form validation
│   ├── Models/                 # Eloquent models
│   └── ...
├── database/
│   ├── migrations/             # Database schema
│   └── seeders/                # Initial data
├── resources/
│   ├── views/
│   │   ├── admin/              # Admin pages
│   │   ├── user/               # User pages
│   │   ├── layouts/            # Layout templates
│   │   └── ...
│   ├── css/                    # Stylesheets with Bootstrap
│   └── js/                     # JavaScript
├── routes/
│   └── web.php                 # Route definitions
├── docker/                     # Docker configurations
├── storage/
│   └── app/public/             # User uploaded files
├── config/                     # Configuration files
├── .env.example               # Environment variables template
├── Dockerfile                 # Docker build file
├── docker-compose.yml         # Docker compose file
└── README.md                  # This file
```

## 🗄️ Database Schema

### Users Table

```sql
- id (bigint, primary key)
- name (string)
- email (string, unique)
- password (string, hashed)
- role (enum: 'admin', 'user')
- email_verified_at (timestamp)
- remember_token (string)
- timestamps
```

### Pengajuan Surats Table

```sql
- id (bigint, primary key)
- user_id (bigint, foreign key -> users)
- jenis_surat (enum: 'domisili', 'usaha', 'pengantar', 'tidak_mampu')
- nik (string)
- alamat (text)
- nomor_hp (string)
- keperluan (text)
- file_ktp (string, nullable)
- file_kk (string, nullable)
- file_surat (string, nullable)
- status (enum: 'diproses', 'ditolak', 'selesai')
- catatan_admin (text, nullable)
- timestamps
```

## 🛡️ Security Features

- ✅ Password hashing dengan Bcrypt
- ✅ CSRF protection
- ✅ SQL injection prevention
- ✅ XSS protection
- ✅ Role-based access control
- ✅ File upload validation
- ✅ Secure headers (X-Frame-Options, X-Content-Type-Options, dll)
- ✅ Rate limiting ready

## 📝 Validation Rules

### Pengajuan Surat Creation

- `jenis_surat`: Required, must be one of valid types
- `nik`: Required, max 20 characters
- `alamat`: Required, max 500 characters
- `nomor_hp`: Required, max 20 characters
- `keperluan`: Required, max 500 characters
- `file_ktp`: Required, file, mimes (pdf, jpg, jpeg, png), max 2MB
- `file_kk`: Required, file, mimes (pdf, jpg, jpeg, png), max 2MB

### Status Update (Admin Only)

- `status`: Required, must be one of (diproses, ditolak, selesai)
- `catatan_admin`: Optional, max 500 characters
- `file_surat`: Optional, file, mimes (pdf), max 5MB

## 🔄 Routes

### Public Routes

```
GET  /                          # Home page
GET  /login                     # Login page
POST /login                     # Process login
GET  /register                  # Register page
POST /register                  # Process registration
```

### Admin Routes (Protected by auth + admin middleware)

```
GET    /admin/dashboard                    # Dashboard
GET    /admin/pengajuan                    # List pengajuan
GET    /admin/pengajuan/{id}              # Show detail
GET    /admin/pengajuan/{id}/edit         # Edit form
PATCH  /admin/pengajuan/{id}              # Update status & docs
DELETE /admin/pengajuan/{id}              # Delete pengajuan
```

### User Routes (Protected by auth + user middleware)

```
GET    /user/dashboard                    # Dashboard
GET    /user/pengajuan                    # List pengajuan user
GET    /user/pengajuan/create             # Create form
POST   /user/pengajuan                    # Store pengajuan
GET    /user/pengajuan/{id}              # Show detail
GET    /user/pengajuan/{id}/download     # Download surat
```

## 📦 Deployment to Production

### Prerequisites untuk AWS Deployment

1. AWS Account
2. AWS CLI configured
3. Docker Hub account (untuk push image)

### Step-by-Step Deployment

#### 1. Build Docker Image

```bash
docker build -t sipus:latest .
```

#### 2. Push ke Docker Registry

```bash
# Login to Docker Hub
docker login

# Tag image
docker tag sipus:latest yourusername/sipus:latest

# Push
docker push yourusername/sipus:latest
```

#### 3. Setup AWS Resources

```bash
# Create RDS MySQL Database
aws rds create-db-instance \
  --db-instance-identifier sipus-prod \
  --db-instance-class db.t3.micro \
  --engine mysql \
  --allocated-storage 20 \
  --master-username admin \
  --master-user-password "strong_password"

# Create S3 Bucket for files
aws s3 mb s3://sipus-prod-storage

# Setup CloudFront Distribution
# (Lihat AWS Console untuk detailed setup)
```

#### 4. Deploy ke ECS

```bash
# Create ECS Cluster
aws ecs create-cluster --cluster-name sipus-prod

# Register Task Definition
aws ecs register-task-definition \
  --cli-input-json file://task-definition.json

# Create Service
aws ecs create-service \
  --cluster sipus-prod \
  --service-name sipus-service \
  --task-definition sipus-app:1 \
  --desired-count 2
```

#### 5. Configure Environment for Production

```env
APP_ENV=production
APP_DEBUG=false
DB_HOST=sipus-prod.xxxxx.us-east-1.rds.amazonaws.com
DB_PASSWORD=strong_password
FILESYSTEM_DRIVER=s3
AWS_ACCESS_KEY_ID=xxxxx
AWS_SECRET_ACCESS_KEY=xxxxx
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=sipus-prod-storage
```

## 🔧 Troubleshooting

### Issue: Storage link tidak tersedia

```bash
# Solution
php artisan storage:link
```

### Issue: Permission denied pada storage folder

```bash
# Solution
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Issue: MySQL connection error

```bash
# Check MySQL service
service mysql status

# Restart MySQL
service mysql restart
```

### Issue: File upload tidak bekerja

```bash
# Check storage configuration
php artisan config:publish

# Verify storage folder permissions
ls -la storage/app/public
```

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.0/)
- [Docker Documentation](https://docs.docker.com/)
- [AWS ECS Documentation](https://docs.aws.amazon.com/ecs/)

## 📄 License

SIPUS adalah project open source. Silakan gunakan dan modifikasi sesuai kebutuhan.

---

**Status**: Production Ready ✅
