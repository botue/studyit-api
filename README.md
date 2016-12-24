# 博学谷

### 注意事项

1.启用rewrite

\# LoadModule rewrite_module modules/mod_rewrite.so 去除前面的 \#

2.启用.htaccess

在虚拟机配置项中
AllowOverride None    修改为： AllowOverride All

3.linux 或 mac 环境下

```bash
mkdir runtime && chmod 777 runtime
```
