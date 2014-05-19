# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "centos64_ja"
  config.vm.box_url = "https://dl.dropboxusercontent.com/u/3657281/centos64_ja.box"
  config.vm.network :private_network, ip: "192.168.33.10"
  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end
  config.vm.synced_folder ".", "/vagrant", \
        create: true, owner: 'vagrant', group: 'vagrant', \
        mount_options: ['dmode=777,fmode=666']

  config.omnibus.chef_version = :latest
  config.vm.provision :chef_solo do |chef|
    chef.cookbooks_path = ["./cookbooks", "./site-cookbooks"]
    chef.run_list = [
      "yum-epel",
      "yum-repoforge",
      "yum-remi",
      "yum-update",
      "devtools",
      "selinux::disabled",
      "iptables::disabled",
      "git",
      "mysql::server",
      "php-wrap",
      "apache2-wrap",
      "memcached",
      "phpmyadmin-wrap",
      "composer",
      "nodejs"
    ]
    chef.json = {
	  "yum" => {
	    "rpmforge-extras" => {"enabled" => false}
	  },
      "mysql" => {
        "server_root_password" => "secret",
        "server_debian_password" => "secret",
        "server_repl_password" => "secret",
        "bind_address" => "127.0.0.1"
      },
      "apache" => {
        "log_dir" => "/vagrant/tmp/logs"
      },
      "phpmyadmin" => {
        "version" => "4.1.13",
        "checksum" => "d6cbd946afaab69201c15ecff2caf81f7016416b9a22f4a4cfa4975923305d7c",
        "mirror" => "http://jaist.dl.sourceforge.net/project/phpmyadmin/phpMyAdmin"
      }
    }
  end
  config.vm.provision :shell, :path => "script.sh"
end