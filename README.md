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

# OneThink
## 后台地址
http://127.0.0.1/index.php?s=/Admin/Public/login.html

## 上传文件
```js
var uploadForm = document.getElementById('upload-form');
uploadForm.onsubmit = function(event) {
    event.preventDefault();
    var formData = new FormData(uploadForm);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/upload.php');
    xhr.onload = function(event) {
        console.log(event);
    }
    xhr.upload.onprogress = function(event) {
        if (event.lengthComputable) {
            var percent = Math.round(event.loaded * 100 / event.total);
            console.log(percent);
        }
    }

    xhr.send(formData);
}
```