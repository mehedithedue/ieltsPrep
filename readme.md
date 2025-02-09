## Project Overview
Thisi is due to personal IELTS / Celpip tracking project consists of a **Laravel ** and an **Angular **, containerized using Docker and managed with Docker Compose.

## Prerequisites
- Docker & Docker Compose installed
- Ensure ports `8000` (backend) and `4200` (frontend) are available

## Setup Instructions

### 1. Clone the Repository
```sh
 git clone https://github.com/mehedithedue/ieltsPrep.git
 cd ieltsPrep
```

### 2. Environment Setup
#### Backend (Laravel)
1. Create a `.env` file inside the `backend` directory:
```sh
cp backend/.env.example backend/.env
```
2. Modify database settings in `.env` if needed.

#### Frontend (Angular)
No additional configuration is required.

### 3. Run the Application with Docker
```sh
docker-compose up --build -d
```
This will start the Laravel backend, Angular frontend, and a MySQL database container.

### 4. Migrate Database (Laravel)
```sh
docker exec -it backend php artisan migrate --seed
```

### 5. Access the Application
- **Backend API**: `http://localhost:8000`
- **Frontend**: `http://localhost:4200`
- **MySQL**: Connect via `localhost:3306` (Username: `root`, Password: `root`)

## Stopping the Services
```sh
docker-compose down
```

## Logs
View logs for debugging:
```sh
docker-compose logs -f backend
```
```sh
docker-compose logs -f frontend
```

---

# docker-compose.yml

```yaml
version: '3.8'


```


