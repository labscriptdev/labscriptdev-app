#!/bin/bash

source ".env"

sync_files=(

  # Adminer
  "adminer/plugins/AdminerPlugin.php"
  "adminer/plugins/AutoLogin.php"
  "adminer/adminer-4.8.1-en.php"
  "adminer/editor-4.8.1-mysql-en.php"
  "adminer/index.php"

  # Bin
  "bin/dev"
  "bin/download"
  "bin/upload"
  
  # Docker
  "docker/adminer/Dockerfile"
  "docker/laravel/Dockerfile"
  "docker/laravel/php.ini"
  "docker/laravel/start-container"
  "docker/laravel/supervisord.conf"
  "docker/mysql/create-testing-database.sh"

  # Laravel
  "laravel10/app/Console/Commands/AppInstallCommand.php"
  "laravel10/app/Console/Commands/AppTestCommand.php"
  "laravel10/app/Http/Controllers/AppController.php"
  "laravel10/app/Http/Controllers/AppFileController.php"
  "laravel10/app/Http/Controllers/AppMailController.php"
  "laravel10/app/Http/Controllers/AppMailTemplateController.php"
  "laravel10/app/Http/Controllers/AppPlaceController.php"
  "laravel10/app/Http/Controllers/AppSettingsController.php"
  "laravel10/app/Http/Controllers/AppUserController.php"
  "laravel10/app/Http/Controllers/AppUserGroupController.php"
  "laravel10/app/Http/Controllers/AppUserNotificationController.php"
  "laravel10/app/Http/Controllers/AuthController.php"
  "laravel10/app/Http/Controllers/Controller.php"
  "laravel10/app/Http/Controllers/TestController.php"
  "laravel10/app/Models/AppFile.php"
  "laravel10/app/Models/AppMail.php"
  "laravel10/app/Models/AppMailTemplate.php"
  "laravel10/app/Models/AppPlace.php"
  "laravel10/app/Models/AppSettings.php"
  "laravel10/app/Models/AppUser.php"
  "laravel10/app/Models/AppUserGroup.php"
  "laravel10/app/Models/AppUserNotification.php"

  # Nuxt
  "nuxt3/components/app/auth/login.vue"
  "nuxt3/components/app/auth/password.vue"
  "nuxt3/components/app/auth/register.vue"
  "nuxt3/components/app/auth/switch.vue"
  "nuxt3/components/app/model/crud.vue"
  "nuxt3/components/app/model/select.vue"
  "nuxt3/components/app/file.vue"
  "nuxt3/components/app/html.vue"
  "nuxt3/components/app/nav.vue"
  "nuxt3/components/app/place.vue"
  "nuxt3/composables/useApp.js"
  "nuxt3/composables/useAxios.js"
  "nuxt3/composables/useValidate.js"
  "nuxt3/composables/useWebsocket.js"
  "nuxt3/layouts/admin.vue"
  "nuxt3/plugins/0.axios.client.js"
  "nuxt3/plugins/1.vuetify.client.js"
  "nuxt3/plugins/2.leaflet.client.js"
  "nuxt3/plugins/3.filters.client.js"
  "nuxt3/plugins/4.imask.client.js"
  
  # Root
  ".env.example"
  "docker-compose-prod.yml"
  "docker-compose.yml"
)