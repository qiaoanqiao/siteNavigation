# 网址导航

项目灵感来源自: [链接](https://github.com/WebStackPage/WebStackPage.github.io)

这是一个开源的公益项目，你可以拿来制作自己的网址导航，也可以做与导航无关的网站。

![](http://www.webstack.cc/assets/images/preview.gif)

## 项目的安装:
环境使用 `laravel 5.5+` 版本环境

1. git clone `本项目地址`
2. 在项目根目录执行 `composer install`
3. 复制 `.env.example` 为 `.env`
4. 修改 `.env` 配置文件(数据库,缓存等)
5. 在项目根目录 `php artisan key:generate`
6. 执行 `php artisan migrate --seed` 填充数据库和测试数据(去除 `--seed` 可不填充测试数据,但是不建议这样做)
7. 测试打开页面 / 或 接口请求

## 使用:

后台地址: `APP_URL` /admin
填充数据后,管理员用户密码都为 `admin`
