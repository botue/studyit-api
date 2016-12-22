
# 博学谷接口文档

## 文档说明

### 响应格式

| 名称     | 类型      | 必填  | 说明  |
|:-------|:----------|:----|:---|
| code   | number       |是| 状态码 |
| msg    | string    |是| 状态信息  |
| result | mixed    |否| 响应结果  |
| time   | timestamp |是| 时间戳 |

### 状态码

| 状态码     | 状态信息      | 说明  |
|:-------|:----------|:---|
| 200   | ok       | 成功 |
| 401   |  unauthorized  | 未授权 |
| 403   |  forbidden  | 没有权限 |
| 500   |  interernal server error  | 服务器内部错误 |

# 权限管理

## 登录

> 使用讲师姓名和讲师密码登录

### 地址

http://api.botue.com/login

### 请求

* 请求方式 POST
* 数据格式 FormData
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_name | 是  | string | 用户名称 |
| tc_pass | 是  | string | 用户密码 |

### 响应

* 数据格式 JSON
* 数据示例

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

# 讲师管理

## 添加讲师

> 添加讲师，需要管理员权限

### 地址

http://api.botue.com/teacher/add

### 请求

* 请求方式 POST
* 支持格式 FormData
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_name | 是  | string | 讲师名称 |
| tc_pass | 是  | string | 讲师密码 |
| tc_join_time | 是  | string | 入职时间 yyyy-mm-dd |
| tc_type | 是  | number | 讲师类型 0 管理员 1 普通 |
| tc_gender | 是  | number | 讲师性别 0 男 1 女 |

### 响应

* 数据格式 JSON
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "time": 1482385456
}
```

## 讲师列表

> 查看所有讲师，需要管理权限

### 地址

http://api.botue.com/teacher

### 请求

* 请求方式 GET
* 请求参数 无

### 响应

* 数据格式 JSON
* 数据示例

JSON示例

```json
{
  "code": 200,
  "msg": "ok",
  "result": [
    {
      "tc_id": 2,
      "tc_name": "李清照",
      "tc_roster": "白玫瑰",
      "tc_gender": 1,
      "tc_cellphone": "18000489233",
      "tc_email": "liqingzhao@itcast.cn",
      "tc_brithday": "667756800000",
      "tc_join_time": "1443628800000"
    },
    {
      "tc_id": 9,
      "tc_name": "风清杨",
      "tc_roster": "攻城狮",
      "tc_gender": 0,
      "tc_cellphone": "",
      "tc_email": "",
      "tc_brithday": "",
      "tc_join_time": "0"
    },
    {
      "tc_id": 10,
      "tc_name": "令狐冲",
      "tc_roster": "攻城狮",
      "tc_gender": 0,
      "tc_cellphone": "",
      "tc_email": "",
      "tc_brithday": "",
      "tc_join_time": "-28800000"
    }
  ]
}
```

## 编辑讲师

> 查询讲师信息并编辑，需要管理权限

### 地址

http://api.botue.com/teacher/edit

### 请求

* 请求方式 GET
* 支持格式 queryString
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_id | 是  | number | 讲师id |

### 响应

* 数据格式 JSON
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "result": {
    "tc_id": 10,
    "tc_name": "令狐冲",
    "tc_pass": "d41d8cd98f00b204e9800998ecf8427e",
    "tc_join_time": "-28800000",
    "tc_type": 1,
    "tc_gender": 0
  },
  "time": 1482379492
}
```

## 更新讲师

> 更新或完善讲师信息

### 地址

http://api.botue.com/teacher/modify

### 请求

* 请求方式 POST
* 支持格式 FormData
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_id | 是  | number | 讲师id |
| tc_roster | 是  | string | 昵称 |
| tc_gender | 是  | number | 性别 0 男 1 女 |
| tc_birthday | 否  | string | 生日 yyyy-mm-dd |
| tc_province | 是  | number | 所在省份 |
| tc_city | 是  | number | 所在城市 |
| tc_district | 是  | number | 所在县/区 |
| tc_hometown | 是  | string | 家乡 |
| tc_cellphone | 否  | number | 手机号码 |
| tc_email | 否  | string | 邮箱地址 |
| tc_join_date | 否  | string | 入职时间 |
| tc_numberroduce | 是  | string | 自我介绍 |

### 响应

* 数据格式
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "time": 1482391415
}
```

## 查看讲师

> 查看讲师详细信息，需要管理员权限

### 地址

http://api.botue.com/teacher/view

### 请求

* 请求方式 GET
* 支持格式 queryString
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_id | 是  | number | 讲师id |

### 响应

* 数据格式 JSON
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "result": {
    "tc_id": 10,
    "tc_name": "令狐冲",
    "tc_roster": "攻城狮",
    "tc_brithday": "",
    "tc_join_time": "-28800000",
    "tc_type": 1,
    "tc_gender": 0,
    "tc_cellphone": "",
    "tc_email": "",
    "tc_hometown": "",
    "tc_numberroduce": null
  },
  "time": 1482386274
}
```

## 注销讲师

> 注销或启用讲师，需要管理员权限

### 地址

http://api.botue.com/teacher/view

### 请求

* 请求方式 GET
* 支持格式 queryString
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_id | 是  | number | 讲师id |

### 响应

* 数据格式 JSON
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "time": 1482388385
}
```

## 修改密码

> 修改讲师登录密码

### 地址

http://api.botue.com/teacher/repass

### 请求

* 请求方式 POST
* 支持格式 FormData
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| tc_pass | 是  | number | 原密码 |
| tc_new_pass | 是  | number | 新密码 |

### 响应

* 数据格式
* 数据示例

```json
{
  "code": 200,
  "msg": "ok",
  "time": 1482395042
}
```

# 分类管理

## 添加分类

> 添加课程分类，普通权限

### 地址

http://api.botue.com/category/add

### 请求

* 请求方式 POST
* 支持格式 FormData
* 请求参数

| 名称      | 必填 | 类型     | 说明   |
|:--------|:---|:-------|:-----|
| cg_name | 是  | string | 分类名称 |
| cg_pid | 是  | number | 从属分类 |
| cg_order | 否  | number | 排序 |
| cg_is_hide | 否  | number | 是否隐藏 |

### 响应

* 数据格式 JSON
* 数据示例

```json
{
  "code": 200,
  "msg": "OK",
  "time": 1482398093
}
```

## 分类列表

> 查看所有课程分类，普通权限

### 地址

http://api.botue.com/category

### 请求
* 请求方式 GET
* 请求参数 无

### 响应

* 数据格式 JSON
* 数据示例

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




