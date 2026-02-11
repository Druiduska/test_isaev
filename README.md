# Тестовое задание

## Сборка

Собрать проект можно с помощью команды:

```bash
make dev-setup
```

После сборки проект доступен по адресу: [http://localhost:80/](http://localhost:80/).

## Локальная база данных

После сборки локальная база данных доступна по учетным данным:

```
host: localhost
port: 3306
database: exam_assignment
user: exam_assignment
password: secret
```

## Документация

Для сборки документации Swagger для маршрутов API выполните команду:

```bash
make docs
```

* Документация по Swagger будет находиться в директории `/storage/api-docs/api-docs.json`;
* Документацию по Swagger так же можно получить по адресу [http://localhost:80/api/documentation](http://localhost:80/api/documentation).

## Команды

Данные команды используются для упрощения работы с Docker контейнером проекта.

Пуск/стоп:

```bash
make up
make down
```

Вход в запущенный контейнер:

```bash
make bash
```

Перезагрузка RoadRunner:

```bash
make reload
```

После мерджа/переключения веток рекомендуется:

```bash
make optimize
```

## Авторизация

В данном проекте авторизация не производится

## Требования для сборки

Для сборки проекта требуются приложения:

* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [make](https://www.gnu.org/software/make/)
