# think-filesystem-driver-cos

这是一个基于腾讯云对象存储的thinkphp6.0 Filesystem驱动。

## 安装

```shell script
    composer require sindll-tech/think-filesystem-driver-cos
```

在`config/filesystem.php`中添加配置:

```
    'cos' => [
      'type'            => \think\filesystem\driver\Cos::class,
      'region'          => '***', //bucket 所属区域 英文
      'app_id'          => '***', // 域名中数字部分
      'secret_id'       => '***',
      'secret_key'      => '***',
      'bucket'          => '***',
      'timeout'         => 60,
      'connect_timeout' => 60,
      'scheme'          => 'https',
      'url'             => '',//访问域名
    ],
```
    


## 使用

```php
//默认$file为单文件。$file为多文件时file为数组，需要进行遍历处理
$file=\request()->file('file');
$filesystem     = \think\facade\Filesystem::disk('cos');
$saveName       = $filesystem->putFile('/path/to/save/file', $file, 'md5');
$saveName       = str_replace('\\', '/', $saveName);
$fullName = \think\facade\Filesystem::getDiskConfig('cos', 'url').'/'.$saveName;
```


## 授权

MIT


## 参考

- thinkphp
- overtrue/flysystem-cos
- [腾讯云对象存储](https://cloud.tencent.com/document/product/436)
