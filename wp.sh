#!/bin/bash
BASE = "base"

mkdir -p "$BASE/$1"
cd "$BASE/$1"

#download wordpress
curl -O http://wordpress.org/latest.tar.gz
#unzip wordpress
tar -zxvf latest.tar.gz
#change dir to wordpress
cd wordpress
#copy file to parent dir
cp -rf . ..
#move back to parent dir
cd ..
#remove files from wordpress folder
rm -R wordpress
#create wp config
cp wp-config-sample.php wp-config.php
#set database details with perl find and replace
sed -e "s/database_name_here/$1/g" wp-config.php
sed -e "s/username_here/$2/g" wp-config.php
sed "s/password_here/$3/g" wp-config.php
#remove zip file
rm latest.tar.gz

fi
