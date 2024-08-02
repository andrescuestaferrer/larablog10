## Changelog
> First Commit : Installed Laravel 10.0 and setup database on .env

> Second Commit : Organize routes and folders

- public\back  
- public\front
- resources\views\back
- resources\views\back\layouts    `auth-layout.blade.php`   `pages-layout.blade.php`
- resources\views\back\pages      `home.blade.php`
- resources\views\back\pages\auth    `forgot.blade.php`   `login.blade.php`
- resources\views\front
- app\Http\Controllers    `AuthorController.php`
- routes    `web.php`

> 3rd Commit : Integrate TablerAdmin template

- resources\views\back\layouts\inc    `header.blade.php`   `footer.blade.php`

> 4 : Laravel Livewire - Login process

- resources\views\back\layouts    `auth-layout.blade.php`   `pages-layout.blade.php`
- resources\views\livewire    `author-login-form.blade.php`
- app\Models           `Type.php`    `User.php`
- database\migrations   `2024_06_17_093115_create_types_table.php`
- routes    `web.php`   `author.php`
- app\Providers      `RouteServicesProvider.php`
- app\Http\Middleware    `Authenticate.php`    `RedirectIfAuthenticated.php`
- app\Livewire   `AuthorLoginForm.php`
- resources\views\back\pages\auth    `login.blade.php`
- resources\views\back\layouts\inc    `header.blade.php`
- app\Http\Controllers      `AuthorController.php`

> 5 : Login process - Login with username(case sensitive) or email

- app\Livewire   `AuthorLoginForm.php`

> 6 : Login process - Forgot and Reset password (Validate regex and strong pwd custom rule)

- app\Livewire   `AuthorForgotForm.php`    `AuthorResetForm.php`
- resources\views\livewire    `author-forgot-form.blade.php`  `author-reset-form.blade.php`  `author-login-form.blade.php`
- resources\views     `forgot-email-template.blade.php`
- resources\views\back\pages     `forgot.blade.php`
- routes              `author.php`
- app\Http\Controllers  `AuthorController.php
- resources\views\back\pages\auth    `reset.blade.php`

> 7 : Blog Administration  - Author/Profile Page - (Livewire-UpgradeGuide-2.x-3.x Events)

- routes              `author.php`
- resources\views\back\layouts\inc    `header.blade.php`
- resources\views\back\pages    `profile.blade.php`
- app\Livewire   `TopHeader.php`  `AuthorProfileHeader.php`   `AuthorPersonalDetails.php`
- resources\views\livewire    `top-header.blade.php`    `author-profile-header.blade.php`  `author-personal-details.blade.php`

> 8 : Integrate jQuery Toast Messages with traits implemented in Commonfunctions.php

- public\back\dist\libs\jquery    `jquery-3.6.0.min.js`
- public\back\dist\libs\ijabo     `ijabo.min.js`    `ijabo.min.css`
- resources\views\back\layouts    `pages-layout.blade.php`
- app\Livewire   `AuthorPersonalDetails.php`
- public\traits  `CommonFunctions.php` 

> 9 :  Blog Administration  - Change Password Form (Validate regex and strong pwd custom rule)

- resources\views\back\pages    `profile.blade.php`
- app\Livewire   `AuthorChangePasswordForm.php`  
- resources\views\livewire    `author-change-password-form.blade.php` 

> 10 :  Blog Administration  - Change Profile Picture

- public\back\dist\image\authors    `default-img.png` `AIMG1171896834756899.jpg`
- app\Modelss   `User.php`  
- resources\views\livewire    `author-profile-header.blade.php`   `top-header.blade.php`
- public\back\dist\image\libs\ijaboCropTools    `ijaboCropTool.min.css`    `ijaboCropTool.min.js`
- resources\views\back\layouts    `pages-layout.blade.php`
- routes    `author.php`
- resources\views\back\pages    `profile.blade.php`
- app\Http\Controllers    `AuthorController.php`

> 11 : Extract log of changes from README.md to CHANGELOG.md
-  `README.md` `CHANGELOG.md`

> 12 : Blog Administration  - Blog Settings Page 
- routes    `author.php`
- resources\views\livewire    `top-header.blade.php`     `author-general-settings.blade.php`    `author-footer.blade.php` 
- resources\views\back\pages    `settings.blade.php`
- app\Models                   `Setting.php`
- database\migrations          `yyyy_mm_dd_hhmmss_create_settings_table.php`
- app\Livewire   `AuthorGeneralSettings.php`    `AuthorFooter.php`
- resources\views\back\layouts\inc    `footer.blade.php`

> 13 : Blog Administration  - Blog Logo 
- public\back\dist\libs\ijaboViewer    `jquery.ijaboViewer.min.js`
- public\back\dist\image\logo-favicon   `xxxxxxxxxx_xxxxx_larablog_logo.png`
- resources\views\back\layouts    `pages-layout.blade.php`
- resources\views\back\pages    `settings.blade.php`
- app\Models    `Setting.php` 
- routes    `author.php`
- app\Http\Controllers    `AuthorController.php`
- resources\views\livewire    `top-header.blade.php`
- resources\views\back\pages\auth    `login.blade.php`    `reset.blade.php`    `forgot.blade.php`

> 14 : Blog Administration  - Blog favicon 
- resources\views\back\pages    `settings.blade.php`
- routes    `author.php`
- app\Models    `Setting.php` 
- resources\views\back\layouts    `pages-layout.blade.php`    `auth-layout.blade.php`
- app\Http\Controllers    `AuthorController.php`
- public\back\dist\image\logo-favicon   `xxxxxxxxxx_xxxxx_larablog_favicon.ico`

> 15 : Blog Administration  - Blog logo & favicon - Unify changeBlogLogo changeBlogFavicon into changeBlogPic
- resources\views\back\pages    `settings.blade.php`
- routes    `author.php`
- app\Http\Controllers    `AuthorController.php`

> 16 : Blog Administration  - Social Media  - Example of Try-Catch
- resources\views\back\pages    `settings.blade.php`
- app\Models    `BlogSocialMedia.php` 
- database\migrations   `YYYY_MM_DD_hhmmss_create_blog_social_media_table.php`
- app\Livewire    `AuthorBlogSocialMediaForm.php`
- resources\views\livewire    `author-blog-social-media-form.blade.php`

> 17 : After Crash of MySQL : phpMyAdmin => cannot connect : invalid settings. misqli_real_connect() (HY000/1130) Host localhost is not allowed to connect to this  MariaDB server
=> Solution : Reinstall XAMP, create new database and import backup
- 17.1 : Regenerate blog logo + icon + favicon
- public\back\dist\image\logo-favicon   `xxxxxxxxxx_xxxxx_larablog_favicon.ico`
- public\back\dist\image\authors   `AIMGXXXXXXXXXXXXXXXXX.jpg`
- 17.1.bis : Correct the lack of extension in logo and icon 
- app\Http\Controllers    `AuthorController.php`

> 18 : Blog routing - After login redirection
- app\Http\Middleware    [`Authenticate.php`](./app/Http/Middleware/Authenticate.php)
- app\Livewire   [`AuthorLoginForm.php`](./app/Livewire/AuthorLoginForm.php)

> 19 : Blog Localization - php artisan lang:publish

>>  19.1 TRANSLATION Files

- lang\en    [`auth.php`](./lang/en/auth.php)    [`pagination.php`](./lang/en/pagination.php)    [`passwords.php`](./lang/en/passwords.php)    [`validation.php`](./lang/en/validation.php)
- lang    [`es.json`](./lang/es.json)    [`fr.json`](./lang/fr.json)

>> 19.2 App CONFIGURATION - locales

- config    [`app.php`](./config/app.php "available locales")

>> 19.3 App Middleware - php artisan make:middleware Localization

- routes    [`web.php`](./routes/web.php)
- app/Http/Kernel        [`Kernel.php`](./app/Http/Kernel.php)
- app/Http/Middleware    [`Localization.php`](./app/Http/Middleware/Localization.php)

>> 19.4 SWITCHER: VIEW

- resources\views\back\layouts\inc     [`lang-switcher.blade.php`](./resources/views/back/layouts/inc/lang-switcher.blade.php)

>> 19.5 VIEWS TO INCLUDE SWITCHER

- resources\views\back\layouts     [`auth-layout.blade.php`](./resources/views/back/layouts/auth-layout.blade.php)
- resources\views\livewire     [`top-header.blade.php`](./resources/views/livewire/top-header.blade.php) 

>> 19.6 VIEWS TO TRANSLATE TEXTS

- resources\views\back\pages\auth     [`login.blade.php`](./resources/views/back/pages/auth/login.blade.php)
- resources\views\back\pages\auth     [`forgot.blade.php`](./resources/views/back/pages/auth/forgot.blade.php)
- resources\views\back\pages\auth     [`reset.blade.php`](./resources/views/back/pages/auth/reset.blade.php)
- resources\views\livewire            [`author-login-form`](./resources/views/livewire/author-login-form.blade.php)
- resources\views\livewire            [`author-forgot-form`](./resources/views/livewire/author-forgot-form.blade.php)
- resources\views\livewire            [`author-reset-form`](./resources/views/livewire/author-reset-form.blade.php)
- resources\views\livewire            [`author-change-password-form`](./resources/views/livewire/author-change-password-form.blade.php)
- resources\views\back\pages     [`home.blade.php`](./resources/views/back/pages/home.blade.php) 

> 20: Include own styles.css

- public\back\dist\css     [`styles.css`](./public/back/dist/css/styles.css)
- resources\views\back\layouts     [`auth-layout.blade.php`](./resources/views/back/layouts/auth-layout.blade.php)
- resources\views\back\layouts     [`pages-layout.blade.php`](./resources/views/back/layouts/pages-layout.blade.php)

> 21: Toggle password by eye

- resources\views\back\layouts     [`auth-layout.blade.php`](./resources/views/back/layouts/auth-layout.blade.php)
- resources\views\livewire            [`author-login-form`](./resources/views/livewire/author-login-form.blade.php)
- resources\views\livewire            [`author-reset-form`](./resources/views/livewire/author-reset-form.blade.php)

> 22:  Toggle eye icon to tabler.icons + Add Author to blog

>> 22.1 Toggle eye icon to tabler.icons

- resources\views\back\layouts      [`auth-layout.blade.php`](./resources/views/back/layouts/auth-layout.blade.php)
- resources\views\livewire      [`author-login-form.blade.php`](./resources/views/livewire/author-login-form.blade.php)
- resources\views\livewire      [`author-reset-form.blade.php`](./resources/views/livewire/author-reset-form.blade.php)

>> 22.2 Add Author to blog

- resources\views\livewire     [`top-header.blade.php`](./resources/views/livewire/top-header.blade.php) 
- lang    [`es.json`](./lang/es.json)    [`fr.json`](./lang/fr.json)
- routes  [`author.php`](./routes/author.php)
- resources\views\back\pages      [`authors.blade.php`](./resources/views/back/pages/authors.php)
- CLASS: app\Livewire\Authors.php    [`Authors.php`](./app/Livewire/Authors.php)
- VIEW: resources\views\livewire     [`authors.blade.php`](./resources/views/livewire)
- resources\views     [`new-author-email-template.blade.php`](./resources/views/new-author-email-template.blade.php) 

> 23:  Translate Profile Page

- resources\views\back\pages     [`profile.blade.php`](./resources/views/back/pages/profile.blade.php)
- lang    [`es.json`](./lang/es.json)    [`fr.json`](./lang/fr.json)
- resources\views\livewire     [`author-profile-header.blade.php`](./resources/views/livewire/author-profile-header.blade.php) 
- resources\views\livewire     [`author-change-password-form.blade.php`](./resources/views/livewire/author-change-password-form.blade.php) 
