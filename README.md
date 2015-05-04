# Composer Local Repository

I used this as a playground to build a pull request for composer to support local repositories.
the basic idea behind local repositories is not, that you can store dependencies on your local system,
it's all about storing multiple projects / packages in one huge repository.
especially on projects with a lot of packages, managing all these dependencies can take a lot of time.

please take a look at [fiddler](https://github.com/beberlei/fiddler/blob/master/README.md) and [this blog post](http://www.whitewashing.de/2015/04/11/monolithic_repositories_with_php_and_composer.html).

the Idea is the same but the implementation is different.

for now this is just an experiment, please let me know what you think.

## how to use


```
git clone https://github.com/timglabisch/composer.git
git checkout local_repository
cd composer
composer install

cd ..
git clone https://github.com/timglabisch/composer_local_downloader_demo
cd composer_local_downloader_demo
```

now you've a folder with 6 different composer projects.


```
find . -iname composer.json
./proj1/composer.json
./proj2/composer.json
./proj3/composer.json
./some_lib_folder/libA/composer.json
./some_lib_folder/libB/composer.json
./some_lib_folder/LibC/composer.json
```

if you take a closer lock at the composer.lock you'll find


```
"repositories": [
    {
        "type": "local",
        "url": "../"
    }
]
```

[the patched composer version](https://github.com/timglabisch/composer/tree/local_repository) has a new repository type called `local`.
this type scans the directory (recursive, but excludes /vendors) and register all the packages.

when you run

```
cd proj1
./../../composer/bin/composer clear-cache && ./../../composer/bin/composer install
```

composer will install all the dependencies for proj1,
the local repository will copy the required packages in the vendor directory and you can ship the project.