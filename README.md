# youtube-dl bundle

Symfony bundle that provides service injection and config for `norkunas/youtube-dl-php`, a PHP wrapper for youtube-dl or yt-dlp.

## Service config provided

```yaml
services:
    # ...
    das_l_youtube_dl:
        class: YoutubeDl\YoutubeDl
        arguments:
            - '@das_l_youtube_dl.process_builder'
            - '@das_l_youtube_dl.metadata_reader'
            - '@filesystem'
        calls:
            - setBinPath: ['%das_l_youtube_dl.binPath%']
            - setPythonPath: ['%das_l_youtube_dl.pythonPath%']

    das_l_youtube_dl.process_builder:
        class: YoutubeDl\Process\DefaultProcessBuilder

    das_l_youtube_dl.metadata_reader:
        class: YoutubeDl\Metadata\DefaultMetadataReader
```

## Service usage

Note: For more details on the usage of the library itself, check out the documentation provided by `norkunas/youtube-dl-php`.

```yaml
services:
    # ...
    App\Foo\YouTubeFoo:
        arguments:
            - '@das_l_youtube_dl'
```
```php
<?php

namespace App\Foo;

use YoutubeDl\Options;
use YoutubeDl\YoutubeDl;

class YouTubeFoo
{
    private $youtubeDl;

    public function __construct(YoutubeDl $youtubeDl)
    {
        $this->youtubeDl = $youtubeDl;
    }

    public function downloadVideo($downloadPath, $url)
    {
        $options = Options::create()
            ->downloadPath($downloadPath)
            ->url($url)
        ;

        $collection = $this->youtubeDl->download($options);

        // ...
    }
}
```

## Config options

```yaml
das_l_youtube_dl:
    binPath: '/your/custom/bin/path/youtube-dl'
    pythonPath: '/your/custom/path/for/python'
```
