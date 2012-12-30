## General ##

set :application, "website_com"
set :deploy_to, '/path/to/website'
set :document_root, '/path/to/website/www'

## Server ##

# Commands on the server are run as the following user :
set :use_sudo, false
set :user, 'blog'

## Repository ##

set :scm, :git
set :repository,  "git@github.com:username/repo.git"
set :branch, "master"

role :web, "website.com"

## SSH ##

ssh_options[:forward_agent] = true
default_run_options[:pty] = true

## Workflow Callbacks ##

after "deploy:setup", "customs:setup"
after "deploy:create_symlink","customs:config"
# after "deploy:create_symlink","customs:sync_files"


# Cleanup removes all but the last 5 releases from the releases directory
set :keep_releases, 5
after "deploy", "deploy:cleanup"

  
namespace(:deploy) do
  task :migrate do
    # do nothing
  end
  task :restart do
    #do nothing
  end
end

# Custom Methods.

namespace(:customs) do

  task :setup do
    puts red("Setting up document root")
    run "mkdir -p #{document_root}"
    run "mkdir -p #{document_root}/assets"
    run "ln -fs /home/blog/Dropbox/hackmake/drafts/_previews #{document_root}/_previews"
  end
  
  task :config, :except => { :no_release => true } do
    puts red("Putting assets in place")
    run "mkdir -p #{document_root}/assets/"
    run "ln -fs #{release_path}/resources/css #{document_root}/assets/"
    run "ln -fs #{release_path}/resources/img #{document_root}/assets/"
    run "ln -fs #{release_path}/resources/templates/_htaccess #{document_root}/.htaccess"
  end

end

# Extras

# Bonus! Colors are pretty!
def red(str)
  "\e[31m#{str}\e[0m"
end