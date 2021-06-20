# polylang-export-importable-mo-po

Makes importabe `.mo` and `.po` files form `polylang-translations.csv` exported with **PolyLang**

Easy import this files with **WPML** or place them in your `/languages` folder

Tested on `php@8.0`

```shell
# prepare: 
# export each domain as csv file using polylang

# install
git clone https://github.com/andriilive/polylang-export-importable-mo-po.git && composer install

# run
php -c localhost:3000
```

## CSV import example
```shell
| String                   | "Source (plugin or theme)" | "Čeština (cs_CZ)"      | {...} |
|--------------------------|----------------------------|------------------------|-------|
| "Advanced Custom Fields" | acf                        | Pokročilá vlastní pole | ...   |
| ...                      | ...                        | ...                    |       |
```

## Generated Locales example

```shell
├── acf_cs.mo
├── acf_cs.po
├── acf_sk.mo
├── acf_sk.po
├── all-in-one-seo-pack_cs.mo
├── all-in-one-seo-pack_cs.po
├── all-in-one-seo-pack_sk.mo
└── all-in-one-seo-pack_sk.po
```

## Build on League\Csv && gettext/gettext

https://packagist.org/packages/gettext/gettext

https://csv.thephpleague.com/9.0/