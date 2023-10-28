# Docker Laravel

This project provides a development environment for Laravel using Docker. This allows you to easily deploy and run your Laravel project on different development environments.

## Requirements

To use this project, you need to have the following installed:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Getting Started

1. Clone the project from the GitHub repository:

   ```bash
   git clone https://github.com/Tran-Minh-Thuc/docker-laravel
   cd docker-laravel
   ```
2. Create a .env file based on the .env.example file and configure the Laravel environment variables:

   ```bash
    cp .env.example .env
   ```
3. Update the DB_HOST in your .env file to use mysql as the database host when using Docker:

   ```bash
    DB_HOST=mysql
   ```
4. Build and start the Docker containers:

   ```bash
    docker-compose up -d
   ```
## Usage

You can use the following Docker Compose commands for common tasks:

- Start the containers: `docker-compose up -d`
- Stop the containers: `docker-compose down`
- Access the Laravel application container: `docker-compose exec app bash`
- Run Laravel Artisan commands: `docker-compose exec app php artisan <command>`

## Contributing

Feel free to contribute to this project by creating issues or pull requests. We welcome your suggestions and improvements.

## License

This project is licensed under the MIT License.
  ```bash
Remember to replace `your-username` and `your-laravel-project` with your actual GitHub repository information, and customize the instructions as needed for your specific project.
  ```
