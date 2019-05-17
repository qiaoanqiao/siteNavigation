# wike
## 接口返回数据格式

返回数据
```
{
    "data": {},
    "message": "获取成功!",
    "sattus": 200
}
```

- data 
    名称解析:数据 
    数据类型: `array` 或 `object`
    默认值: 空 `array`

- message
    名称解析: 返回信息
    数据类型: `string`
    默认值: 非空 `string` 多数返回 `获取成功!`
    
- status
    名称解析: **状态码**
    数据类型: `integer`
    默认值: 没有固定默认值 多数为返回`200`

### 状态码
- 200 OK - 对成功的 操作进行响应。
- 400 Bad Request - 请求异常，比如请求中的 body 无法解析
- 401 Unauthorized - 已登录提示一般为登录过期(出现在需要登录才能访问的接口上)
- 403 Forbidden - 服务器已经理解请求，但是拒绝执行它, 一般是逻辑判断错误(例如数据唯一,但是数据库已存在)
- 404 Not Found - 请求一个不存在的资源 或接口
- 422 Unprocessable Entity - 用来表示校验错误
- 429 Too Many Requests - 由于请求频次达到上限而被拒绝访问(预留)
