## 钉钉 jsapi
https://ding-doc.dingtalk.com/doc#/dev/welcome-to-lark

## 身份验证
https://ding-doc.dingtalk.com/doc#/personnal/tmudue

```js
dd.getAuthCode({
    success:(res)=>{
        dd.alert({content: res.authCode})
    },
    fail: (err)=>{
        dd.alert({content: JSON.stringify(err)})
    }
})
```

## 免登录授权码
https://ding-doc.dingtalk.com/doc#/dev/ep7bpq

## 钉钉配置
```
Application/Admin/Conf::DING_TALT
```