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
        $config = [
            'region'            => $this->config['region'],
            'app_id'            => $this->config['app_id'],
            'secret_id'         => $this->config['secret_id'],
            'secret_key'        => $this->config['secret_key'],
            'bucket'            => $this->config['bucket'],
        ];

        return new CosAdapter($config);
    }

    public function url(string $path): string
    {
        $adapter = $this->filesystem->getAdapter();

        return $adapter->getUrl($path);
    }
}
