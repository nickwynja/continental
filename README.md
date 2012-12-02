Continental is a name for the Vienna stage of coffee roasting which happens right at the beginning of Second Crack.

# Continental #

Continental is a fork of Marco Arment's [Second Crack](https://github.com/marcoarment/secondcrack). After using it for a while, I wanted to make some drastic changes to the structure of the repo to simplify it for my use, accommodate my preferences, and set it up for deployment as private repos for my blogs.

**The design choices in Continental are very opinionated.**

In many cases, this fork won't be ideal for out-of-the-box configuration. I'll try to keep up with documentation and changes from Second Crack to make deployment easy. If you're just starting with Second Crack, I'd recommend using Marco's original repository and can be deployed using my [`deploysecondcrack`](http://nickwynja.com/secondcrack) tool.

# New Features and Fixes #

Here's a list of new features that I plan, have added, or fixed:

* Tags have been moved out of the root of `www` and now are served from `website.com/tag/foo`.
* Fixed month archive cache bug
* Writes all pages with `.html` extension and uses `.htaccess` to keep the URL clean.

When possible, I'll make pull requests upstream so all Second Crack users can benefit from fixes and changes.

## Notes ##

* Refer to the [README](https://github.com/marcoarment/secondcrack#readme) for Second Crack for basic usage.

## Change Log ##

* [2012-12-01]: Moved post tags to `/tags/` and month archive tags to `/year/month/tag`. [\[See Commit\]](https://github.com/nickwynja/continental/commit/b06e768d328b8c0b1a9127cbb8d1c35481c97931)
* [2012-12-01]: Fixed month archive cache bug. [\[See Commit\]](https://github.com/nickwynja/continental/commit/907834c86cd8aa3c83c15d732b35e5911230481c)
* [2012-12-01]: All pages now are written with `.html` extension for semantic purposes. [\[See Commit\]](https://github.com/nickwynja/continental/commit/d3311cde2d70cd1a490f4bd277bc30bfa72dd083)