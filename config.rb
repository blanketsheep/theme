require 'susy'
require 'breakpoint'

Time.zone = 'Asia/Tokyo'
activate :i18n, :path => '/:locale/', :mount_at_root => false

set :slim, :pretty => true, :sort_attrs => false, :format => :html5

configure :development do
  activate :livereload
end

compass_config do |config|
  config.output_style = :compact
end

set :css_dir, 'css'
set :js_dir, 'js'
set :images_dir, 'resources/images'

set :layout, false