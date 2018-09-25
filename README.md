## HTML NAVBAR stored in MySQL database

Easy PHP script that create NAVBAR and SITEMAP.XML from record stored in a MySQL database

### PHP
GET navbar list
```php
$navbarlist = navbar_list('en');
```

CREATE sitemap.xml
```php
$sitemap_xml = navbar_sitemap_xml('en');
```

### MySQL database
#### TABLE navbar
| Column Name      | Type         |
| ---------------- | ------------ |
| idnavbar         | int(11)      |
| nav_language     | varchar(2)   |
| nav_pos          | smallint(5)  |
| nav_name         | varchar(45)  |
| nav_link         | varchar(255) |
| meta_title       | varchar(45)  |
| meta_description | varchar(255) |
| meta_robots      | varchar(45)  |
| meta_googlebot   | varchar(45)  |
| meta_google      | varchar(45)  |
