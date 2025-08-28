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
array(4) {
  ["msg"] => string(6) "成功" //失败信息描述，正常为空或成功
  ["requestid"] => string(19) "1410674931347226624" //本次请求流水号
  ["code"] => int(200) //正常为200，其它值表示失败，见错误码定义
  ["data"] => array(5) {
    ["result"] => int(1) //认证结果：1核验一致; 2核验不一致; 3库无
    ["message"] => string(12) "核验一致" //认证结果描述
    ["birthday"] => string(8) "19921012"
    ["sex"] => string(3) "男"
    ["address"] => string(24) "吉林省***县"
  }
}
```

失败返回

```php
array(4) {
  ["msg"] => string(29) "(身份证号)不符合规则"
  ["requestid"] => string(19) "1410675604797259776"
  ["code"] => int(400)
  ["data"] => array(0) {
  }
}
```
# 其他

详细文档参考：https://apis.baidu.com/store/detail/04277820-1f59-428d-a72f-4a746961fd75?_=1734933646460