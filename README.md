# 🚀 Dự án Laravel - Xây dựng Website tư vấn tự động với AI ChatBot và quản lý căn hộ cho thuê

Dự án xây dựng một hệ thống website tích hợp AI ChatBot để tư vấn tự động và quản lý căn hộ cho thuê.  
Hệ thống giúp chủ căn hộ dễ dàng quản lý, theo dõi khách thuê, hợp đồng và các dịch vụ liên quan, đồng thời hỗ trợ khách hàng tìm kiếm thông tin nhanh chóng thông qua AI ChatBot.

## 🌟 Các tính năng chính
- 🏠 **Quản lý căn hộ**: Thêm, sửa, xoá, cập nhật trạng thái căn hộ.
- 📑 **Quản lý hợp đồng thuê**: Theo dõi hợp đồng, hạn thuê, và thanh toán.
- 🤖 **AI ChatBot**: Trả lời tự động các câu hỏi của khách hàng.
- 📊 **Báo cáo & Thống kê**: Tổng hợp dữ liệu về tình trạng thuê phòng.
- 🔐 **Xác thực người dùng**: Đăng nhập, phân quyền quản trị.

## 📌 Yêu cầu hệ thống

- PHP >= 10.x
- Composer
- MySQL: Để lưu trữ dữ liệu
- Git: Để tải mã nguồn từ GitHub

## 📥 Hướng dẫn cài đặt và khởi chạy dự án

### 1️⃣ Clone dự án từ GitHub
```bash
git clone https://github.com/Khoa-CNTT/XDWTVTDV1246.git
cd XDWTVTDV1246
```

### 2️⃣ Cấu hình cơ sở dữ liệu
Tạo cơ sở dữ liệu trong MySQL với tên phù hợp với dự án.

### 3️⃣ Tạo tệp cấu hình `.env`
Tạo tệp `.env` trong thư mục gốc dự án và thêm các thông tin cần thiết:

#### 🔹 Server Configuration
```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:Knx9HAcBHCIxgISxNxZ1ZERZcCdlUQWgYv7ArWPJUOw=
APP_DEBUG=true
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US
```

#### 🔹 Database Configuration
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=khoaluantotnghiep
DB_USERNAME=root
DB_PASSWORD=
```

#### 🔹 Email Configuration
```bash
MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME="nguyenducviet2033@gmail.com"
MAIL_PASSWORD="hawpcxwyjwmtcrmd"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="nguyenducviet2033@gmail.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 4️⃣ Cài đặt các package cần thiết
```bash
composer install
```

### 5️⃣ Tạo khóa ứng dụng
```bash
php artisan key:generate
```

### 6️⃣ Chạy migration để tạo bảng trong database
```bash
php artisan migrate
```

### 7️⃣ Khởi chạy ứng dụng
```bash
php artisan serve
```

### 8️⃣ Truy cập ứng dụng
Mở trình duyệt và truy cập:
```
http://127.0.0.1:8000
```

---
✅ **Hoàn tất!** Bây giờ bạn có thể sử dụng hệ thống. 🚀

