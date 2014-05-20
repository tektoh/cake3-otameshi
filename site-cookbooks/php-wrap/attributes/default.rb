default['php']['directives'] = {
  'date.timezone' => 'Asia/Tokyo'
}
default['php']['extends']['packages'] = %w[
  php-cli
  php-common
  php-devel
  php-intl
  php-mbstring
  php-mcrypt
  php-mysql
]

