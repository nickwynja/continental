Continental is a name for the Vienna stage of coffee roasting which happens right at the beginning of Second Crack.

# Continental #

Continental is a fork of Marco Arment's [Second Crack](https://github.com/marcoarment/secondcrack). After using it for a while, I wanted to make some drastic changes to the structure of the repo to simplify it for my use, accommodate my preferences, and set it up for deployment as private repos for my blogs.

**The design choices in Continental are very opinionated.**

In many cases, this fork won't be ideal for out-of-the-box configuration. I'll try to keep up with documentation and changes from Second Crack to make deployment easy. If you're just starting with Second Crack, I'd recommend using Marco's original repository and can be deployed using my [`deploysecondcrack`](http://nickwynja.com/secondcrack) tool.

# New Features and Fixes #

Here's a list of new features that I have added or fixed:

* Tags have been moved out of the root of `www` and now are served from `website.com/tag/foo`.
* Fixed month archive cache bug
* Writes all pages with `.html` extension and uses `.htaccess` to keep the URL clean.
* Adds [capistrano](https://github.com/capistrano/capistrano/wiki) for deploys. Edit `cap/deploy.rb` to configure. Dependancies: `ruby`, `rails`, `capistrano`, `railsless-deploy`.
* Configuration based on environment
* Nested pages

When possible, I'll make pull requests upstream so all Second Crack users can benefit from fixes and changes.

### Features I Want to Add ###

* Custom pages templates by defining in the post/page header

### To-Dos ###

* Remove child folders in `/www` when removed from source directory

## Notes ##

* Refer to the [README](https://github.com/marcoarment/secondcrack#readme) for Second Crack for basic usage.
* Since I run multiple Second Crack blogs on the same server, I've added a feature to specify the name of the blog in the `cron` command which will be logged properly. Add the blog name at the end of the run command like this:

        /home/blog/continental/engine/update.sh {SOURCE_PATH} {SECONDCRACK_PATH} my_blog
* Nested pages work by adding a folder in the `/pages` directory. Any `.md` files created in, for example, `/pages/foo/bar.md` will be created in `/www/foo/bar.html`. Create `/pages/foo/index.md` to have a page exist at `yoursite.com/foo`. I still need to add deletion of `/www/foo` folder when `/pages/foo` is removed.

## Change Log ##

* [2012-12-01]: Moved post tags to `/tags/` and month archive tags to `/year/month/tag`. [\[See Commit\]](https://github.com/nickwynja/continental/commit/b06e768d328b8c0b1a9127cbb8d1c35481c97931)
* [2012-12-01]: Fixed month archive cache bug. [\[See Commit\]](https://github.com/nickwynja/continental/commit/907834c86cd8aa3c83c15d732b35e5911230481c)
* [2012-12-01]: All pages now are written with `.html` extension for semantic purposes. [\[See Commit\]](https://github.com/nickwynja/continental/commit/d3311cde2d70cd1a490f4bd277bc30bfa72dd083)
* [2012-12-01]: Better logging of blog name for when running multiple blogs on the same server. [\[See Commit\]](https://github.com/nickwynja/continental/commit/e7e6fbff4bf385725502710d5c84749b73ab6dba)
* [2012-12-02]: Added capistrano.[\[See Commit\]](https://github.com/nickwynja/continental/commit/7700785e9bcb8c58a2411b030f4145a33f3bae9b)
* [2012-12-02]: Added environment configuration and production-only hooks. [\[See Commit\]](https://github.com/nickwynja/continental/commit/6a680270baed00d7439d642e51530b29d6a2731e)
* [2012-12-08]: Added nested pages. [\[See Commit\]](https://github.com/nickwynja/continental/commit/812b604b2414f0601584da7e95e037555a4788fd)