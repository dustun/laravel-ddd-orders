# Laravel DDD Tutorial

Обучающий проект, демонстрирующий практическое применение **Domain-Driven Design (DDD)** и Clean Architecture в Laravel.

Цель проекта — показать, как правильно структурировать сложное приложение, разделяя бизнес-логику от инфраструктуры, используя чистую архитектуру и современные практики разработки.

---

## 🎯 О проекте

Этот проект представляет собой систему управления заказами с акцентом на **правильную DDD-архитектуру**.

Здесь демонстрируется:
- Разделение ответственности между слоями
- Работа с Value Objects и Domain Entities
- Использование Use Cases (Application Services)
- Чистая работа с инфраструктурой через репозитории
- Валидация через DTO (Spatie Laravel Data)
- UUID вместо автоинкрементных ID
- Dependency Inversion Principle

---

## 🏗 Архитектура проекта

Проект построен по принципам **Domain-Driven Design** и **Clean Architecture**.

### Слои приложения

#### 1. Domain
- Содержит бизнес-сущности (`Entities`) и бизнес-правила
- Использует Value Objects (`Email`, `UUID`, `Password`)
- **Не знает** ничего о Laravel, БД или HTTP
- Это сердце приложения — здесь живёт настоящая бизнес-логика

#### 2. Application
- Содержит **Use Cases** (Application Services)
- Оркестрирует работу Domain-слоя
- Принимает `Input DTO`, возвращает `Output DTO`
- Координирует вызовы репозиториев и других сервисов

#### 3. Infrastructure
- Реализация конкретных деталей: Eloquent, Sanctum, PostgreSQL, Caddy и т.д.
- Содержит `EloquentUserRepository`, `PasswordHasher` и другие адаптеры
- Реализует интерфейсы, объявленные в Domain-слое

#### 4. Shared
- Общие компоненты, используемые несколькими модулями
- Value Objects, DTO, Contracts (интерфейсы), Infrastructure Services

#### 5. Presentation (Http)
- Контроллеры, Request'ы, Responses
- Тонкий слой, отвечающий только за обработку HTTP-запросов

---

## 🛠 Технологии и инструменты

- **Laravel 12**
- **PHP 8.3**
- **PostgreSQL 16**
- **Caddy 2** (веб-сервер)
- **Docker + Docker Compose**
- **Spatie Laravel Data** — DTO + валидация
- **Laravel Sanctum** — API аутентификация
- **PHP CS Fixer + PHPStan** — качество кода
- **Taskfile** — удобное управление задачами

---

## 🚀 Как запустить проект

```bash
# 1. Клонировать репозиторий
git clone https://github.com/dustun/laravel-ddd-orders.git
cd laravel-ddd-orders

# 2. Запустить проект
task up

# 3. Выполнить миграции
task migrate

# 4. (Опционально) Пересоздать БД
task migrate:fresh
