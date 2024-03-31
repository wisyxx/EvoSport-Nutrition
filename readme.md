<img src="public/build/img/EvoSportLogo.svg" 
        alt="logo" 
        width="1000" 
        height="auto" 
        style="display: block; margin: 0 auto" 
  />


# EvoSport Nutrition

EvoSport Nutrition is an E-Commerce platform specializing in sports goods and supplements. It aims to provide users with a straightforward shopping experience, featuring an intuitive interface for easy navigation and access to a diverse range of products catering to various fitness needs.


## Screenshots
<img src="screenshots/landing-page-desktop.png" width="770px" height="auto"> <img src="screenshots/user-page.png" width="770px" height="auto">

## Tech Stack

- **Client:** JavaScript & SASS
- **Server:** PHP (With composer), MySQL & Apache
## Run Locally

#### Requirements
You'll need: [PHP](https://www.php.net/downloads.php), [Composer](https://getcomposer.org/), [MySQL](https://dev.mysql.com/downloads/installer/) & [Node.js](https://nodejs.org/en) (for npm) all installed.

Clone the project

```bash
  git clone https://github.com/wisyxx/EvoSport-Nutrition.git
```

Go to the project directory

```bash
  cd EvoSport-Nutrition
```

Install dev dependencies

```bash
  npm install -D
```
Please create a .env file in the folder "/includes" with the following variables:

```env
  DB_HOST = your_host
  DB_PASS = your_password
  DB_SCHEMA = your_schema
  DB_USER = your_user
```

Set up composer

```bash
  composer update
```

Run gulp tasks

```bash
  npm start
```

Start the server

```bash
  cd public
  php -S localhost:3000
```
---
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
