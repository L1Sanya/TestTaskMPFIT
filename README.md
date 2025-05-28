# MPFIT Project

---

## Требования

- Docker
- Docker Compose
- Make (рекомендуется, но не обязательно)

---

## Быстрый старт

### 1. Сборка и запуск контейнеров

```bash
make build
make up
```

### 1. Запуск миграций и сидеров

```bash
make migrate
make seed
make migrate-refresh # обновление миграций
```

Команды Makefile
make build — собрать Docker-образы

make up — поднять контейнеры в фоне

make down — остановить контейнеры

make migrate — выполнить миграции базы данных

make migrate-refresh — обновить миграции (откат + повторное применение)

make seed — запустить сидеры

make artisan-<команда> — выполнить любую artisan-команду (например, make artisan-route:list)

make logs — просмотреть логи контейнеров


Как пользоваться
Перейти на http://localhost (если настроено на 80 порт)

Создавать товары и заказы через веб-интерфейс

Все данные хранятся в базе PostgreSQL в контейнере `db`