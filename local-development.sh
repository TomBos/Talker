#!/bin/bash
# This moves the files to Apache server enabling development from other directories

if [ ! -d "/var/www/html/Talker" ]; then
  mkdir -p /var/www/html/Talker
  echo "Folder 'Talker' created."
fi

cp -r * /var/www/html/Talker

# Green color output for completion
echo "\033[0;32m => Setup Completed\033[0m"