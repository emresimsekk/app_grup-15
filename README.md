

|User|
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/signin | POST | {'username':dev.simsek.emre@gmail.com, 'password':EUeu160861} | Kullanıcı giriş yönetimi. |
| /api/signup | POST | {'mail':dev.simsek.emre@gmail.com, 'password':EUeu160861 , 'name':Emre, 'surname':Şimşek, 'actives':1} | Kullanıcının üye olma yönetimi. |

|Products|

| --- | --- | --- | --- |
| /api/products | GET | ----- | Tüm ürünleri listeler. |
| /api/products/:id | POST | ----- | Id ait ürünü listeler |
| /api/products/:id | PUT |  {'title':test title 1, 'body':test body 1} | Id ait ürünü günceller |
| /api/products/:id | Delete |  ----- | Id ait ürünü siler |
