# Subscription Platform API Endpoints

This documentation outlines the available API endpoints for the Subscription Platform, designed for user subscriptions and post notifications.

# Authentication with Laravel Sanctum for APIs

Laravel Sanctum is a powerful and user-friendly package that simplifies API authentication in Laravel applications. It's particularly useful for securing API endpoints and enabling user authentication in a stateless manner.

## User Authentication

- **Login**: Authenticate a user and obtain an access token.

  - Endpoint: `POST /login`

- **Logout**: Log out a user and invalidate the access token.

  - Endpoint: `GET /logout`

- **User Details**: Retrieve the authenticated user's information.
  - Endpoint: `GET /user`

## Post Management

- **Create Post**: Create a new post for a specific website.
  - Endpoint: `POST /post/create`
  - Parameters: `title`, `description`

## User Subscriptions

- **Subscribe to a Website**: Allow a user to subscribe to a specific website.
  - Endpoint: `POST /subscribe/{website}`
  - URL Parameter: `website` (The website to subscribe to)

# Requirements and Docker Installation

Before running your Dockerized Laravel HR Management API, ensure that you have the following requirements in place:

## Requirements

- **Docker**: Docker is a containerization platform that allows you to package and run applications in isolated environments. It's an essential component for running this Dockerized application.

## Docker Installation

If you haven't already installed Docker, follow these steps to set it up on your system:

### On Linux

1. Open a terminal.

2. Update your package repository to the latest packages:

```
sudo apt update
```

3. Insatll docker

```
sudo apt install -y docker.io
```

4. Start the Docker service and enable it to run on system startup

```
 sudo systemctl start docker
```

```
 sudo systemctl enable docker
```

5. Verify the installation by running the following command

```
 docker --version
```

## Clone the repository

To do this, run the following command:

```
git clone git@github.com:Wassim-Ammar/Human-Resources-Management.git
```

## Create volume file for mysql container

You need to create a volume file for the MySQL container. To do this, run the following command under the application folder:

```
 mkdir mysql
```

# Run the application

To run the application, all you need to do is run the Docker Compose command in the cloned repository folder on your host.

```
 docker-compose up -d
```

```
 sudo docker exec [php_container_ID] chown -R www-data:www-data /var/www/html/storage
```

```
 sudo docker exec [php_container_ID] cp .env.example .env
```

```
 sudo docker exec [php_container_ID] php artisan key:generate
```

```
 sudo docker exec [php_container_ID] php artisan migrate
```
