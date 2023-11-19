# Lab authorisation basic

## Travail à faire

- Ajouter l'authentification pour [`Lab-Laravel-crud-basic`](https://github.com/Jalil-Betroji/lab-crud.git) .
- Additionner l'autorisation pour [`Lab-Laravel-crud-basic`](https://github.com/Jalil-Betroji/lab-crud.git) en utilisant uniquement `gate` sans recourir aux `policies`.

### Steps to run this application 

1. Clone the Repository:

```bash
git clone https://github.com/Jalil-Betroji/lab-Authorization-basic.git
```

2. Update Composer Dependencies:

```bash
composer update 
```

3. Create Environment File:

```bash
cp .env.example .env
```

4. Run Migrations:

```bash
php artisan migrate
```

5. Seed Database:

```bash
php artisan db:seed
```

6. Launch the Application::

```bash 
php artisan serve
```

7. Access the Application:

Once the server is running, access the application through your web browser.