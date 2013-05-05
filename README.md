Continental is a name for the Vienna stage of coffee roasting which happens right at the beginning of Second Crack.

# Continental #

Continental is a fork of Marco Arment's [Second Crack][sc]. After using it for a while, I wanted to make some drastic changes to the structure of the repo to simplify it for my use, accommodate my preferences, and set it up for deployment as private repos for my blogs.

**The design choices in Continental are very opinionated.**

In many cases, this fork won't be ideal for out-of-the-box configuration. I'll try to keep up with documentation and changes from Second Crack to make deployment easy. If you're just starting with Second Crack, I'd recommend using Marco's original repository and can be deployed using my [`deploysecondcrack`][dsc] tool.

# New Features and Fixes #

Here's a list of new features that I have added or fixed:

* Tags have been moved out of the root of `www` and now are served from `website.com/tag/foo`.
* Fixed month archive cache bug
* Writes all pages with `.html` extension and uses `.htaccess` to keep the URL clean.
* Adds [capistrano][cap] for deploys. Edit `cap/deploy.rb` to configure. Dependancies: `ruby`, `rails`, `capistrano`, `railsless-deploy`.
* Configuration based on environment
* Nested pages
* Custom pages templates by defining in the post/page header
* Support for having your blog roll live in a subdirectory like `yoursite.com/blog`
* Adds short/cleaner URLs by optionally writing to `.htaccess` of short domain on same server

When possible, I'll make pull requests upstream so all Second Crack users can benefit from fixes and changes.

### To Dos ###

See [Issues][iss] for bugs and pending features.

## Migrating from Second Crack ##

If you want to move from Second Crack to Continental, below is a general guideline of the steps you'll need to consider. This is not a step-by-step guide or something for beginners. This is not full documentation. Again, if you're new to Second Crack, or system administration, I suggest using [`deploysecondcrack`][dsc].

**Using [capistrano][cap]**:

* Set up [capistrano][cap] and any dependancies (`ruby`, `rails`, `capistrano`, `railsless-deploy`)
* Configure `cap/deploy.rb`:
  * Ideal configuration is to fork Continental and deploy your fork. Put your fork's URL in `:repository` in `cap/deploy.rb`
  * Edit `cap/deploy.rb` with your server settings. So you don't bring down your current site, you'll want to make the `/path/to/website` different than where your document root currently is.
  * Custom capistrano methods should work right if you keep your assets in the same structure as in Continental
  * SSH into your server and `mkdir` the `/path/to/website` and set the proper permissions and ownership for the `:user` in `cap/deploy.rb`
* Run `cap setup`, then `cap check`, then `cap deploy` to roll out your site initially
* Run `cap deploy` for any later updates after initial configuration
* Set up `config.php` including your server's hostname and home path for environment set up and all path configuration. Continental supports configuration for both local development and production configuration. `$env` sets which paths to use.
* Move any hooks or templates that you had in Dropbox to their respective place in `/resources/templates/` and `/engine/hooks/`
* Change your `httpd` virtual host to point to your new `document root` in `/path/to/website` and restart.

**Using `git clone`**:

* Clone your fork of continental wherever you like
* Set up `config.php` including your server's hostname and home path for environment set up and all path configuration. Continental supports configuration for both local development and production configuration. `$env` sets which paths to use. When using `git` to deploy your site rather than `cap`, your path configurations will look more like what's set in the `else` of `if` production. 
* Move any hooks or templates that you had in Dropbox to their respective place in `/resources/templates/` and `/engine/hooks/`
* Change your `httpd` virtual host to point to your new `document root` in `/path/to/website` and restart.


## Notes ##

* Refer to the [README](https://github.com/marcoarment/secondcrack#readme) for Second Crack for basic usage.
* Since I run multiple Second Crack blogs on the same server, I've added a feature to specify the name of the blog in the `cron` command which will be logged properly. Add the blog name at the end of the run command like this:

        /home/blog/continental/engine/update.sh {SOURCE_PATH} {SECONDCRACK_PATH} my_blog
* Nested pages work by adding a folder in the `/pages` directory. Any `.md` files created in, for example, `/pages/foo/bar.md` will be created in `/www/foo/bar.html`. Create `/pages/foo/index.md` to have a page exist at `yoursite.com/foo`. I still need to add deletion of `/www/foo` folder when `/pages/foo` is removed.
* Specify a template in the header of a file like this: `template: writing` where you have a `writing.php` file in your `/templates` directory.
* For moving your blog roll into a subdirectory, set `Updater::$blog_path` and `Post::$blog_uri` in `config.php`. Create `index.md` in `/pages` to be your home page.

## Change Log ##

* [2012-12-01]: Moved post tags to `/tags/` and month archive tags to `/year/month/tag`. [\[See Commit\]](https://github.com/nickwynja/continental/commit/b06e768d328b8c0b1a9127cbb8d1c35481c97931)
* [2012-12-01]: Fixed month archive cache bug. [\[See Commit\]](https://github.com/nickwynja/continental/commit/907834c86cd8aa3c83c15d732b35e5911230481c)
* [2012-12-01]: All pages now are written with `.html` extension for semantic purposes. [\[See Commit\]](https://github.com/nickwynja/continental/commit/d3311cde2d70cd1a490f4bd277bc30bfa72dd083)
* [2012-12-01]: Better logging of blog name for when running multiple blogs on the same server. [\[See Commit\]](https://github.com/nickwynja/continental/commit/e7e6fbff4bf385725502710d5c84749b73ab6dba)
* [2012-12-02]: Added capistrano.[\[See Commit\]](https://github.com/nickwynja/continental/commit/7700785e9bcb8c58a2411b030f4145a33f3bae9b)
* [2012-12-02]: Added environment configuration and production-only hooks. [\[See Commit\]](https://github.com/nickwynja/continental/commit/6a680270baed00d7439d642e51530b29d6a2731e)
* [2012-12-08]: Added nested pages. [\[See Commit\]](https://github.com/nickwynja/continental/commit/812b604b2414f0601584da7e95e037555a4788fd)
* [2012-12-09]: Added ability to specify alternate template in a page header. [\[See Commit\]](https://github.com/nickwynja/continental/commit/dd953039201c8b1282fbca96854ced1e60386ce5)
* [2012-12-21]: Added support for blog living at yoursite.com/blog. Settings in config.php. [\[See Commit\]](https://github.com/nickwynja/continental/commit/bc8660ca9bde49d8f0a9857b7d6e51dcf1ac6424)
* [2012-12-29]: Added support for short/cleaner URLs like u.co/post-slug. [\[See Commit\]](https://github.com/nickwynja/continental/commit/8d9f850c16c70582e69eef6454613fef5d585a73)
* [2013-05-05]: Adds [AppDotNetPHP](https://github.com/jdolitsky/AppDotNetPHP) submodule in `engine/lib` for use in new ADN post hook. [[See Commit](https://github.com/nickwynja/continental/commit/c2ae7d6514571e8b10f57c5bfc19115872cd80c0)]



[sc]: https://github.com/marcoarment/secondcrack
[dsc]: http://nickwynja.com/deploysecondcrack
[cap]: https://github.com/capistrano/capistrano/wiki
[iss]: http://github.com/nickwynja/continental/issues
