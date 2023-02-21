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

All files and database data (except user data) are automatically deleted every 3 hours. The following code in `ServerSideOperations/autoDelete.php` controls this feature:

### PHP

```
$timeCheck = time() - 10800; // 3 hours ago, change value to delete sooner or later (time is in seconds)
$getFileCreationTime = "SELECT MAX(file_creation_time) FROM `Files`";
$getMessageTime = "SELECT MAX(sended_at) FROM `Messages`";
$fileDateTimeResult = mysqli_query($connection, $getFileCreationTime);
$messageDateTimeResult = mysqli_query($connection, $getMessageTime);
$fileDateTime = mysqli_fetch_array($fileDateTimeResult)[0];
$messageDateTime = mysqli_fetch_array($messageDateTimeResult)[0];
$dataBaseTime = false;

if ($fileDateTime != false) {
    if($messageDateTime != false){
        if($messageDateTime < $fileDateTime){
            $dataBaseTime = $messageDateTime;
        }
        else{
            $dataBaseTime = $fileDateTime;
        }
    }
}

if ($timeCheck >= $dataBaseTime) {
    $dropTableMessages = "DROP TABLE `$dataBaseName`.`Messages`";
    $dropTableFiles = "DROP TABLE `$dataBaseName`.`Files`";

    $result = mysqli_query($connection, $dropTableMessages);
    if (!$result) {
        consolelog("Failed To Delete Messages!");
    }

    rmdir('../FileShare');

    $result = mysqli_query($connection, $dropTableFiles);
    if (!$result) {
        consolelog("Failed To Delete Data Files!");
    }
}
```