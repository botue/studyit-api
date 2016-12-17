
### 登录接口

* 接口地址 http://api.botue.com/login
* 请求方式 POST
* 支持格式 FormData
* 参数说明

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_name | 是  | string | 用户名称 |
| tc_pass | 是  | string | 用户密码 |

* 返回字段说明

| 名称     | 类型        | 说明  |
|:-------|:----------|:----|
| code   | int       | 状态码 |
| msg    | string    | 信息  |
| result | object    | 结果  |
| time   | timestamp | 时间戳 |


JSON返回示例

```json
{
    "code" :200,
    "msg": "登录成功!",
    "result": {
        "tc_id": 8,
        "tc_name": "前端学院",
        "tc_avatar": "html5-1480745892943.jpg"
    },
    "time": 1481905908
}
```





