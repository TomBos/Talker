# Talker Chat Application

Talker is a chat application built using PHP, MySQL, and JavaScript. Users can create accounts and then chat with other users in real-time.

## Features

- Create new account
- Log in and log out
- Chat with other users
- View chat history
- Real-time chat updating
- Protected against SQL injection
- Automatic deletion of all files and database data (except user data) every 3 hours

## Requirements

- PHP 7.0 or higher
- MySQL 5.7 or higher
- Web server (e.g. Apache, Nginx)

## Installation

1. Clone this repository to your web server using git clone.
2. Update the `$databaseName` variable in the PHP files to match your MySQL database settings.
3. Ensure that you have established a connection with MySQL. Once you have done so, check the console in `index.php` to verify whether the database initialization was successful.

## Usage

1. Create a new account by entering a username and password on the registration page.
2. Log in using your newly created account.
3. Chat with other users in real-time on the chat page.
4. View chat history by scrolling up in the chat window.

## Contributing

If you would like to contribute to the Talker project, please follow these steps:

1. Fork the repository and create a new branch for your changes.
2. Make your changes and test them locally.
3. Submit a pull request with a description of your changes.

## Automatic Deletion

All files and database data (except user data) are automatically deleted every 3 hours. The code in `ServerSideOperations/autoDelete.php` controls this feature
Make changes to the time value to delete data sooner or later