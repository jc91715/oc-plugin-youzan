# oc-plugin-youzan
## 先去注册 [注册流程](https://laravel-china.org/articles/7014/real-time-account-implementation-scheme-based-on-personal-receipts-with-praise-clouds)
## 使用
在后台先把配置参数填好
```
app('youzan')->request('youzan.pay.qrcode.create', [
                    'qr_type' => 'QR_TYPE_DYNAMIC',  // 这个就不要动了
                    'qr_price' => 100,  // 金额：分
                    'qr_name' => 'iPhone 8 plus 64G 金色', // 收款理由
                    'qr_source' => '102828399222', // 自定义字段，你可以设置为网站订单号
                ])'
```
