安装:
1. clone
2. composer install
3. cp .env.example .env
4. 修改.env配置文件(数据库,缓存等)
5. php artisan key:generate
6. 执行 php artisan migrate --seed
7. 测试打开页面或接口请求
