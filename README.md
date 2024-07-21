# routemgr

routemgr is a PHP-based web application designed to streamline the process of booking and reserving bus seats. The application leverages JavaScript and CSS for an enhanced user experience, providing passengers with a simple and efficient way to reserve and buy bus seats.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)
- [License](#license)

## Features

- User-friendly interface for booking and reserving bus seats
- Real-time seat availability updates
- Secure passenger information management
- Intuitive seat selection with visual feedback
- Responsive design for use on various devices

## Installation

To set up the project locally, follow these steps:

### Prerequisites

- PHP 7.0 or higher
- MySQL or any other database server
- Web server (e.g., Apache, Nginx)

### Steps

1. Clone the repository

   ```sh
   git clone https://github.com/BINDAYGRG/routemgr.git
   ```

2. Navigate to the project directory

   ```sh
   cd routemgr
   ```

3. Import the database schema

   ```sh
   mysql -u username -p databasename < database/schema.sql
   ```

4. Configure the database connection in `config.php`

   ```php
   <?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'your_db_username');
   define('DB_PASSWORD', 'your_db_password');
   define('DB_DATABASE', 'your_db_name');
   ?>
   ```

5. Start the web server and navigate to the project directory

6. Open your web browser and go to

   ```url
   http://localhost/routemgr
   ```

## Usage

1. Open the routemgr application in your web browser.

2. Register as a new user or log in with existing credentials.

3. Select your desired bus route and choose available seats.

4. Complete the booking process by providing necessary details and confirming your reservation.

5. Receive a confirmation and details of your reserved seats.

## Screenshots

![Home Screen](screenshots/home_screen.png)
![Seat Selection](screenshots/seat_selection.png)
![Booking Confirmation](screenshots/booking_confirmation.png)

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE` for more information.
