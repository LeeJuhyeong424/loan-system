# Loan System Laravel 프로젝트

개인 간 대출 관리 시스템입니다.
이 저장소는 완전한 Laravel 기반 백엔드 소스이며, `.env.example`을 포함하여 **즉시 복원 가능한 상태**로 구성되어 있습니다.

---

## ✅ 환경

* PHP 8.2+
* Laravel 12.x
* MySQL (InnoDB, utf8mb4\_unicode\_ci)
* Node.js / NPM
* XAMPP (Windows 기반 개발 환경)
* Vue.js, Tailwind CSS
* DOMPDF (PDF 기능), Vue Canvas 서명

---

## 🛠 설치 및 실행 방법

1. **저장소 클론**

   ```bash
   git clone https://github.com/your/repository.git
   cd loan-system
   ```

2. **의존성 설치 (PHP & JS)**

   ```bash
   composer install
   npm install && npm run dev
   ```

3. **.env 설정**

   ```bash
   copy .env.example .env  # Windows
   # 또는
   cp .env.example .env    # macOS / Linux
   php artisan key:generate
   ```

4. **MySQL 데이터베이스 생성**

   ```sql
   CREATE DATABASE loan_system CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

5. **마이그레이션 실행**

   ```bash
   php artisan migrate
   ```

6. **개발 서버 실행**

   ```bash
   php artisan serve
   ```

---

## 🌐 주요 디렉터리 구조

```txt
app/
├── Http/Controllers/    # 컨트롤러
├── Models/              # Eloquent 모델
├── Services/            # 서비스 계층 (사용자 정의)
resources/
├── views/               # Blade 템플릿
├── js/components/       # Vue 컴포넌트
routes/
├── web.php              # 웹 라우트
.env.example             # 복원용 설정 템플릿
```

---

## 🇰🇷 로케일 및 설정

* 시간대: `Asia/Seoul`
* 언어: `locale=ko` (`laravel-lang/lang` 패키지 사용)

---

## 📝 기타

* PDF는 DOMPDF 사용
* 서명은 Vue Canvas → Base64 → Laravel 저장 방식
* 전자계약은 추후 기능 확장 예정

---

## 📦 배포 시 주의

* `.env` 파일은 Git에 **절대 포함되지 않음**
* `storage/`, `vendor/`, `node_modules/` 등은 `.gitignore` 처리됨
* 최초 세팅 시 `.env.example` 기반 복사 필요

---

## 📋 프로젝트 초기 세팅 이슈 (Jira 연동용)

* Jira 이슈: \[LMS-1] Laravel 프로젝트 베이스 세팅
* 브랜치명 예시: `feature/LMS-1-initial-setup`
