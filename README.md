# Pettable API

Laravel backend API for Pettable app :)

## Table of Contents

- [Features](#features)
- [Demo](#demo)
- [Installation](#installation)

## Features

- Raise a pet
- Put it to work
- Profit

## Demo

[Live Demo](#)


## Installation

Instructions for installing and setting up the project locally.

1. **Clone the repository**

    ```bash
    git clone https://github.com/davidle90/pettable-api.git
    cd pettable-api
    ```

2. **Install dependencies**

    You will need to install the project dependencies using Composer (for PHP) and NPM (for front-end assets if applicable). Run the following commands:

    - Install PHP dependencies:

    ```bash
    composer update
    ```

    - Install Node.js dependencies (if your project uses front-end assets):

    ```bash
    npm install
    ```

3. **Set up environment variables**

    Copy the `.env.example` file to `.env` to create your environment configuration file:

    ```bash
    cp .env.example .env
    ```

    Open the `.env` file and configure the following environment variables:

    - `APP_NAME`: Set the name of your application.
    - `APP_ENV`: Set the environment (e.g., `local`, `production`).
    - `APP_KEY`: Generate an application key using `php artisan key:generate`.
    - `DB_CONNECTION`: Set up your database connection (e.g., MySQL, SQLite).
    - `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`: Set the appropriate values for your database.

    If you're using a different database, make sure to update the `DB_CONNECTION` accordingly.

4. **Generate the application key**

    Laravel requires an application key to secure sessions and other encrypted data. Generate it by running:

    ```bash
    php artisan key:generate
    ```

5. **Migrate the database**

    If your project uses a database, run the migrations to set up the database schema:

    ```bash
    php artisan migrate
    ```

    If you want to seed the database with some initial data, you can run the following command:

    ```bash
    php artisan db:seed
    ```

6. **Set up storage links (optional)**

    If your project uses file uploads, create the necessary symbolic link for file storage:

    ```bash
    php artisan storage:link
    ```

7. **Run the application**

    Start the Laravel development server by running:

    ```bash
    php artisan serve
    ```

    This will start the server at `http://127.0.0.1:8000`. You can now visit this URL in your browser to access the application.

8. **Run the front-end (optional)**

    If your project uses front-end assets (e.g., React, Vue.js), run the following command to start the front-end development server:

    ```bash
    npm run dev
    ```

    This will start the front-end build process, and you can access the front-end interface typically at `http://localhost:3000` (or another port if specified).

---

