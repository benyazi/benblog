<?php

namespace App\Models\Mediable;

use Plank\Mediable\Exceptions\MediaUrlException;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Filesystem\FilesystemManager;
use Plank\Mediable\UrlGenerators\BaseUrlGenerator;

/**
 * Media Url Generator.
 *
 * @author Sergey Klabukov <yo@benyazi.ru>
 */
class MediaUrlGenerator extends BaseUrlGenerator
{
    /**
     * Filesystem Manager.
     * @var \Illuminate\Filesystem\FilesystemManager
     */
    protected $filesystem;

    /**
     * Constructor.
     * @param Illuminate\Contracts\Config\Repository   $config
     * @param \Illuminate\Filesystem\FilesystemManager $filesystem
     */
    public function __construct(Config $config, FilesystemManager $filesystem)
    {
        parent::__construct($config);
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function getAbsolutePath()
    {
        return $this->getUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl()
    {
        $url = $this->getDiskConfig('url');
        return $url.$this->media->getDiskPath();
    }
}
