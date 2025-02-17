
# miniBlog
miniBlog is a small project for small scale blog which has articales and comments.

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/BelalNaeim/miniBlog.git
    ```

2. Navigate to the project directory:

    ```bash
    cd cosmana
    ```

3. Install dependencies:

    ```bash
    composer i
    ```

4. Copy `.env.example` to `.env` and configure your environment variables:

    ```bash
    cp .env.example .env
    ```

5. Generate the application key:

    ```bash
    php artisan key:generate
    ```

6. Run the database migrations:

    ```bash
    php artisan migrate --seed
    ```

7. Serve the application:

    ```bash
    php artisan serve
    ```
Visit [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser to access the application.

## notes after publish
- run this commands in server to improve app speed performance
```bash
php artisan optimize
```
```bash
php artisan config:cache
```
```bash
php artisan route:cache
```



