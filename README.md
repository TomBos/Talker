Talker Chat Application

This is a chat application built using PHP, MySQL, and JavaScript. Users can create accounts and then chat with other users in real-time.
Features

    Create new account
    Log in and log out
    Real-time chat with other users
    View chat history
    Delete your own messages

Requirements

    PHP 7.0 or higher
    MySQL 5.7 or higher
    Web server (e.g. Apache, Nginx)

Installation

    Clone this repository to your web server using git clone <repository url>.
    Create a new MySQL database and import the talker.sql file located in the dbOperations directory.
    Update the $databaseName, $databaseUser, and $databasePassword variables in the dbOperations/InitializeDB.php file to match your MySQL database settings.
    Navigate to the root directory of the cloned repository and run the command php -S localhost:8000 to start a local PHP development server.
    Open a web browser and navigate to http://localhost:8000 to access the Talker application.

Usage

    Create a new account by entering a username and password on the registration page.
    Log in using your newly created account.
    Chat with other users in real-time on the chat page.
    View chat history by scrolling up in the chat window.
    Delete your own messages by clicking the trash can icon next to the message.

Contributing

If you would like to contribute to the Talker project, please follow these steps:

    Fork the repository and create a new branch for your changes.
    Make your changes and test them locally.
    Submit a pull request with a description of your changes.
