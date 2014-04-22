#
# Cookbook Name:: phpmyadmin-wrap
# Recipe:: default
#
# Copyright 2014, YOUR_COMPANY_NAME
#
# All rights reserved - Do Not Redistribute
#

include_recipe 'apache2'
include_recipe 'phpmyadmin'

template "/etc/httpd/conf.d/phpmyadmin.conf" do
  notifies :reload, "service[apache2]", :delayed
end
