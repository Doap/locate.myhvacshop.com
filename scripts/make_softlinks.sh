#!/bin/bash
#mkdir -p /var/www/html/locate.myhvacshop.com/wp-content/themes
#mkdir -p /var/www/html/locate.myhvacshop.com/wp-content/plugins
ln -s /srv/www/uploads/sinkjuice/locate.myhvacshop.com/uploads/ /var/www/html/locate.myhvacshop.com/wp-content/uploads
ln -s /srv/www/uploads/sinkjuice/locate.myhvacshop.com/themes/ /var/www/html/locate.myhvacshop.com/wp-content/themes
ln -s /srv/www/uploads/sinkjuice/locate.myhvacshop.com/plugins/ /var/www/html/locate.myhvacshop.com/wp-content/plugins
/startup/genvhost.sh locate.myhvacshop.com
/startup/make-wp-configs locate.myhvacshop.com
echo "/startup/make-softlinks.sh just ran on `curl -s http://169.254.169.254/latest/meta-data/public-ipv4`." | tee /tmp/startup.log
