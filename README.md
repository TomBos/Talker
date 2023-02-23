# Talker Chat Application

Talker is a chat application built using PHP, MySQL, and JavaScript. Users can create accounts and then chat with other users in real time.

## Features

- Create a new account
- Log in and log out
- Chat with other users
- View chat history
- Real-time chat updating
- Protected against SQL injection
- Automatic deletion of all files and database data (except user account information) every 3 hours

## Requirements

- PHP 7.0 or higher
- MySQL 5.7 or higher
- Web server (e.g. Apache, Nginx)

## Installation

To use Talker, you will need:

1. Clone this repository to your web server using git clone.
2. Update the `$databaseName` variable in the PHP files to match your MySQL database settings.
3. Ensure that you have established a connection with MySQL. Once you have done so, check the console in `index.php` to verify whether the database initialization was successful.
4. decide if you want to use tokens, if you choose to create tokens generate them if not comment on parts of code in `dbOperations/CreateTokens.php` and `Pages/UserAuth.php`

## Usage

1. Create a new account by entering a username and password on the registration page.
2. Login using your newly created account.
3. Chat with other users in real time on the chat page.
4. View chat history by scrolling up in the chat window.

## Contributing

If you would like to contribute to the Talker project, please follow these steps:

1. Fork the repository and create a new branch for your changes.
2. Make your changes and test them locally.
3. Submit a pull request with a description of your changes.

## Automatic Deletion

Talker includes a feature that automatically deletes all files and database data (except user data) every 3 hours to protect users' privacy. The code in `ServerSideOperations/CheckDateForWipeOut.php` controls this feature. To change the time interval, update the equation in the `CheckDateForWipeOut.php` file.
