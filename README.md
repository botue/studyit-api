
# 博学谷接口文档

## 登录

### 地址

http://api.botue.com/login

### 请求

* 请求方式 POST
* 数据格式 FormData
* 参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_name | 是  | string | 用户名称 |
| tc_pass | 是  | string | 用户密码 |

### 响应

* 数据格式 JSON
* 响应数据

| 名称     | 类型        | 说明  |
|:-------|:----------|:----|
| code   | int       | 状态码 |
| msg    | string    | 状态信息  |
| result | object    | 响应结果  |
| time   | timestamp | 时间戳 |

JSON示例

```json
{
  "code": 200,
  "msg": "登录成功!",
  "result": {
    "tc_name": "前端学院",
    "tc_avatar": "html5-1480745892943.jpg"
  },
  "time": 1482213239
}
```

## 课程分类

### 地址

http://api.botue.com/category

### 请求
* 请求方式 GET
* 支持格式 FormData
* 请求参数 无

### 响应

* 数据格式 JSON
* 响应数据

| 名称     | 类型        | 说明  |
|:-------|:----------|:----|
| code   | int       | 状态码 |
| msg    | string    | 状态信息  |
| result | object    | 响应结果  |
| time   | timestamp | 时间戳 |

JSON示例

```json
{
  "code": 200,
  "msg": "ok",
  "result": [
    {
      "cg_id": 1,
      "cg_pid": 0,
      "cg_name": "前端开发",
      "cg_order": 10,
      "cg_is_hide": 0,
      "cg_update_time": "2016-11-13 15:36:01",
      "level": 0
    },
    {
      "cg_id": 5,
      "cg_pid": 1,
      "cg_name": "HTML/CSS",
      "cg_order": 10,
      "cg_is_hide": 0,
      "cg_update_time": "2016-11-13 15:36:46",
      "level": 1
    },
    {
      "cg_id": 6,
      "cg_pid": 1,
      "cg_name": "Javascript",
      "cg_order": 10,
      "cg_is_hide": 0,
      "cg_update_time": "2016-11-13 15:36:56",
      "level": 2
    },
    {
      "cg_id": 7,
      "cg_pid": 1,
      "cg_name": "Mobile",
      "cg_order": 10,
      "cg_is_hide": 0,
      "cg_update_time": "2016-11-13 15:37:07",
      "level": 3
    }
  ]
}
```










