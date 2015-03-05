#!/bin/bash
rm -f /var/www/html/airandplumbing.com/wp-config.php
echo "scripts/remove_wp-config.sh just ran on `curl -s http://169.254.169.254/latest/meta-data/public-ipv4`." | tee /tmp/startup.log
