# MAHASISWA LEVELING

## Deskirpsi

Mahasiswa Leveling is a web-based application developed using pure HTML, CSS, JavaScript, and PHP, designed to assist users in their workout routines. This application provides a variety of features to enhance the user experience and motivation while pursuing their fitness goals.

## Key Features
1. **Achievement System**:
Boosts user motivation by offering a comprehensive achievement system that rewards users for reaching specific milestones during their workout journey.

2. **Leveling and Experience Points (EXP)**:
Every user is assigned a level based on their workout progress and gains experience points (EXP) for completing various fitness tasks. This gamified approach encourages users to stay committed to their fitness routines.

3. **Quests**:
Users can take on fitness quests to challenge themselves and earn rewards. These quests provide an additional layer of engagement and personalization to their workout experience.

4. **Profile Management**:
Users have the ability to view and edit their profiles, allowing them to tailor their workout journey to their preferences. They can also track the number of completed quests and achievements they have unlocked.

5. **Profile Pictures and Audio Collection**:
Users can personalize their profiles with profile pictures and store multiple audio files in their collection. This feature enables users to add a personal touch to their workout experience by listening to their favorite tunes or motivational audio.

6. **Many More**:
This application also provides other interesting features that can be explored by users.

## Requirement

This project built using:
1.  php 8.0-apache
2.  mysql latest

## Instalasi

1. Clone or download this repository
2. Install XAMPP or Docker
3. Create .env file in config folder
4. Configure .env file (example in .env.example)

## How to Run

### XAMPP

1. Move this repository to htdocs folder
2. Start Apache

### Docker

1. run this command in terminal (root directory):
```bash
docker compose --env-file config/.env build
```
2. run this command in terminal (root directory):
```bash
docker compose --env-file config/.env up
```
If there is an error about mysqli, do the following:
1. Open docker apache terminal
2. run:
```bash
docker-php-ext-install mysqli
```
3. restart docker apache

## Application Screenshots

## Mobile Version
<img src="screenshots/display/.m_achievement_admin.png" width="200">
<img src="screenshots/display/.m_achievement_user.png" width="200">
<img src="screenshots/display/.m_challenge.png" width="200">
<img src="screenshots/display/.m_collection.png" width="200">
<img src="screenshots/display/.m_collection_edit.png" width="200">
<img src="screenshots/display/.m_edit_profile.png" width="200">
<img src="screenshots/display/.m_login.png" width="200">
<img src="screenshots/display/.m_my_achievement_admin.png" width="200">
<img src="screenshots/display/.m_my_achievement_user.png" width="200">
<img src="screenshots/display/.m_register.png" width="200">
<img src="screenshots/display/.m_super_achievement.png" width="200">
<img src="screenshots/display/.m_super_achievement_add.png" width="200">
<img src="screenshots/display/.m_super_achievement_edit.png" width="200">
<img src="screenshots/display/.m_user_profile.png" width="200">
<img src="screenshots/display/HOF.png" width="200">
<img src="screenshots/display/HOF_add.png" width="200">
<img src="screenshots/display/.m_landing.png" width="200">
<img src="screenshots/display/.m_403.png" width="200">
<img src="screenshots/display/.m_404.png" width="200">

## Desktop Version
<img src="screenshots/display/achievement_admin.png" width="200">
<img src="screenshots/display/achievement_user.png" width="200">
<img src="screenshots/display/challenge.png" width="200">
<img src="screenshots/display/collection_edit.png" width="200">
<img src="screenshots/display/collection_page.png" width="200">
<img src="screenshots/display/edit_profile.png" width="200">
<img src="screenshots/display/login.png" width="200">
<img src="screenshots/display/my_achievement_admin.png" width="200">
<img src="screenshots/display/my_achievement_user.png" width="200">
<img src="screenshots/display/register.png" width="200">
<img src="screenshots/display/super_achievement.png" width="200">
<img src="screenshots/display/super_achievement_add.png" width="200">
<img src="screenshots/display/super_achievement_edit.png" width="200">
<img src="screenshots/display/user_profile.png" width="200">
<img src="screenshots/display/HOF.png" width="200">
<img src="screenshots/display/HOF_add.png" width="200">
<img src="screenshots/display/landing.png" width="200">
<img src="screenshots/display/403.png" width="200">
<img src="screenshots/display/404.png" width="200">

## Lighthouse Screenshots

### Database Schema
<img src="screenshots/.skema_database.png" width="500">

### Achievement (User) Page Desktop
<img src="screenshots/achievement_user_desktop.png" width="500">

### Achievement (User) Page Mobile
<img src="screenshots/achievement_user_mobile.png" width="500">

### Achievement (Admin) Add Page Desktop
<img src="screenshots/admin_achievement_add_achievement.png" width="500">

### Achievement (Admin) Page Desktop
<img src="screenshots/admin_achievement_desktop.png" width="500">

### Achievement (Admin) Edit Page Desktop
<img src="screenshots/admin_achievement_edit_achievement.png" width="500">

### Achievement (Admin) Page Mobile
<img src="screenshots/admin_achievement_mobile.png" width="500">

### Challenge Page Desktop
<img src="screenshots/challenge_desktop.png" width="500">

### Challenge Page Mobile
<img src="screenshots/challenge_mobile.png" width="500">

### Collection Page Desktop
<img src="screenshots/collection_desktop.png" width="500">

### Collection Edit Page Desktop
<img src="screenshots/collection_edit.png" width="500">

### Collection Page Mobile
<img src="screenshots/collection_mobile.png" width="500">

### Edit Profile Page Desktop
<img src="screenshots/edit_profile_desktop.png" width="500">

### Edit Profile Page Mobile
<img src="screenshots/edit_profile_mobile.png" width="500">

### Error Page 403 Desktop
<img src="screenshots/error403_desktop.png" width="500">

### Error Page 403 Mobile
<img src="screenshots/error403_mobile.png" width="500">

### Error Page 404 Desktop
<img src="screenshots/error404_desktop.png" width="500">

### Error Page 404 Mobile
<img src="screenshots/error404_mobile.png" width="500">

### Login Page Desktop
<img src="screenshots/login_desktop.png" width="500">

### Login Page Mobile
<img src="screenshots/login_mobile.png" width="500">

### My Achievement (User) Page Desktop
<img src="screenshots/my_achievement_user_desktop.png" width="500">

### My Achievement (User) Page Mobile
<img src="screenshots/my_achievement_user_mobile.png" width="500">

### Register Page Desktop
<img src="screenshots/register_desktop.png" width="500">

### Register Page Mobile
<img src="screenshots/register_mobile.png" width="500">

### User Profile Page Desktop
<img src="screenshots/user_profile_desktop.png" width="500">

### User Profile Page Mobile
<img src="screenshots/user_profile_mobile.png" width="500">

### Hall of Fame Page Desktop
<img src="screenshots/HOF_desktop.png" width="500">

### Hall of Fame Page Mobile
<img src="screenshots/HOF_mobile.png" width="500">

### Landing Page
<img src="screenshots/landing.png" width="500">

## Team Collaboration - Task Allocation

### Frontend (Client Side)
|Feature|13521015|13521025|
|-------|--------|--------|
|Login|✔️||
|Register|✔️||
|Home||✔️|
|Error (403 & 404)|✔️||
|Achievement (User)|✔️||
|Achievement (Edit)|✔️||
|Achievement (Add)|✔️||
|My Achievement (User)|✔️||
|Challenge|✔️||
|Collection|✔️||
|Collection (Edit)|✔️||
|Edit Profile|✔️||
|User Profile|✔️||
|Hall of Fame (User)||✔️|
|Hall of Fame (Edit)||✔️|
|Hall of Fame (Add)||✔️|
|Navbar|✔️||

### Backend (Server Side)
|Feature|13521015|13521025|
|-------|--------|--------|
|Authentication (Login & Register & Logout)|✔️||
|Achievement (User)|✔️||
|Achievement (Edit)|✔️||
|Achievement (Add)|✔️||
|My Achievement (User)|✔️||
|Challenge|✔️||
|Collection|✔️||
|Collection (Edit)|✔️||
|Edit Profile|✔️||
|User Profile|✔️||
|Hall of Fame (User)||✔️|
|Hall of Fame (Edit)||✔️|
|Hall of Fame (Add)||✔️|
|Initial Project (Database Schema, Folder Structure, Docker, etc)|✔️||
