# Website of Musikverein "Musikalische Löwen" Nentershausen

This repository contains the code for the website of the Musikverein "Musikalische Löwen" Nentershausen available at [musikalische-loewen.de](https://musikalische-loewen.de).
In the following this website is just referred to as the 🦁 website.
Happy coding!

## History

The first 🦁 website was created in the early years of the twenty-first century by André Metternich. A completely revised website was then launched in the year 2012 by Lukas Müller. Then in the year 2021 another revamp was performed by Anna-Maria Ortseifen, Pascal Zängerle and Lukas Müller.

In 2026 the 🦁 website was migrated from Laravel to a static site built with [Jekyll](https://jekyllrb.com) and hosted on GitHub Pages.

## Structure

- `_config.yml`: site-wide settings (name, e-mail address, URL)
- `_layouts/`: the page skeleton (`base.html`) and the default page layout with title header (`main.html`)
- `_includes/`: navigation, footer and the gallery script
- `_data/galerie.yml`: captions for the gallery
- `*.html`, `orchester/`, `verein/`: the pages, each with a short front matter block (title, header image, abstract)
- `css/`, `js/`, `fonts/`: precompiled Bootstrap theme, Lightgallery and Masonry
- `images/`, `docs/`: images and PDFs

Images are stored as WebP in three sizes: `images/archive/large` (1920px wide, header backgrounds and lightbox), `images/archive/medium` (1080px) and `images/archive/small` (640px, gallery thumbnails).
To add a picture to the gallery, convert it with [ffmpeg](https://ffmpeg.org) into the three sizes with a name starting with the year (e.g. `2026_konzert_a.webp`) and optionally add a caption to `_data/galerie.yml`:

```bash
for size in large:1920 medium:1080 small:640; do
  ffmpeg -i 2026_konzert_a.jpg -vf "scale='min(${size#*:},iw)':-2" -map_metadata -1 -c:v libwebp -quality 80 -preset photo "images/archive/${size%%:*}/2026_konzert_a.webp"
done
```

## Local preview

Install Ruby and Bundler, then run:

```bash
bundle install
bundle exec jekyll serve
```

The site is then available at [http://localhost:4000](http://localhost:4000).

## Deployment

Every push to `main` is built and deployed to GitHub Pages by `.github/workflows/pages.yml`. Pull requests are only built.

## Security

If you discover a security vulnerability within the code of the 🦁 website, please send an e-mail to Lukas Müller via [hello@lukasmu.com](mailto:hello@lukasmu.com).

## License

The 🦁 website is open-sourced software licensed under the MIT license. Please see [LICENSE](LICENSE.md) for details.
