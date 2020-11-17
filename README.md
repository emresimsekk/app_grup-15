

#User
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/signin | POST | {'username':dev.simsek.emre@gmail.com, 'password':EUeu160861} | Kullanıcı giriş yönetimi. |
| /api/signup | POST | {'mail':dev.simsek.emre@gmail.com, 'password':EUeu160861 , 'name':Emre, 'surname':Şimşek, 'actives':1} | Kullanıcının üye olma yönetimi. |

#City
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/city | GET | ----- | Tüm şehirleri listeler. |

#District
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/district | GET | city_id | ID' ye göre ilçeleri listeler. |

#Hospital
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/hospital | GET | district_id | ID' ye göre hastaneleri listeler. |

#Department
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/department | GET | hospital_id | ID' ye göre hastane bölümlerini listeler. |

#Doctor
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/doctor | GET |  dep_id | ID' ye göre  bölüm doktorlarını listeler. |

#Hour
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/hour | GET |  doctor_id | ID' ye göre  doktorun çalışma saatlerini listeler. |

#AppPoint
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/apppoint | post |  user_id, hour_id, doctor_id, dep_id, hospital_id, district_id, city_id, actives | Sisteme randevu ekler |

| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/apppointall | post |  user_id | Randevu Listeler |


#History
| Route | HTTP | Method | Description |
| --- | --- | --- | --- |
| /api/history | post |  user_id| Kullanıcı profil bilgilerini listeler |
