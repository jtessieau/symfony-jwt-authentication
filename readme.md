# How to install

To use this project run the following commands:

```bash
composer install
composer setup-project
symfony serve -d
```

This will create an sqlite database and add 3 users using fixtures in it:

- admin@test.com
- user@test.com
- test@test.com

The password for the 3 users is "test".

You can now try to generate a token using

```bash
curl -X POST -H "Content-Type: application/json" http://localhost:8000/login -d '{"username":"user@test.com","password":"test"}'
```
