<?php

declare (strict_types = 1);
namespace think\filesystem\driver;

use League\Flysystem\AdapterInterface;
use Overtrue\Flysystem\Cos\CosAdapter;
use think\filesystem\Driver;

class Cos extends Driver
{
    protected function createAdapter(): AdapterInterface
    {
        return new CosAdapter($this->config);
    }

    public function url(string $path): string
    {
        $adapter = $this->filesystem->getAdapter();

        return $adapter->getUrl($path);
    }
}
