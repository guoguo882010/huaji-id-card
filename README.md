# 身份证核验

# 安装

```php
composer require guoguo882010/huaji-id-card
```

## 使用

```php

\RSHDSDK\HuaJiIDCard\HuaJiIDCard::check('百度appid','身份证号','姓名');

```

成功返回

```php
array(5) {
  ["result"] => int(1)  //认证结果：1核验一致; 2核验不一致; 3库无
  ["message"] => string(12) "核验一致"
  ["birthday"] => string(8) "19921012"
  ["sex"] => string(3) "男"
  ["address"] => string(24) "吉林省***县"
}
```

失败返回

```php
array(2) {
  ["result"] => int(2)
  ["message"] => string(15) "核验不一致"
}
```
# 其他

详细文档参考：https://apis.baidu.com/store/detail/04277820-1f59-428d-a72f-4a746961fd75?_=1734933646460