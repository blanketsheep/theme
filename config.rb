require 'susy'
require 'breakpoint'
require 'compass/import-once'

Time.zone = 'Asia/Tokyo'
activate :i18n, :path => '/:locale/', :mount_at_root => false

set :slim, :pretty => true, :sort_attrs => false, :format => :html5

configure :development do
  activate :livereload
end

#Compass::ImportOnce.activate!
compass_config do |config|
  #config.output_style = :compact
  config.output_style = :compressed
end

set :css_dir, 'css'
set :js_dir, 'js'
set :images_dir, 'resources/images'

set :layout, false