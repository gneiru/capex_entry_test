- git clone https://github.com/gneiru/capex_entry_test.git
- cd capex_entry_test
- composer install
- php artisan migrate
  `WARN`  The database 'capex_entry_test' does not exist on the 'mysql' connection.

  Would you like to create it? (yes/no) [no]
`❯ yes`
- Set `.env.ROLE_NAME` to `User` to check User's access
- php artisan serve
- http://127.0.0.1:8000/users