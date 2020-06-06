# Technikum blog

## Description

This project shows the basic usage of [VueJS](https://vuejs.org) in combination with the [Laravel](https://www.laravel.com) framework.
Categories and blogs can be created. Every blog belongs to a category.
Comments can be done on blogs. A blog can have many comments.
Comments will be named messages or replies.

## Functionality

### Dashboard

Displays the logged in user.

### List categories

Shows all categories. Viewed categories can be deleted and edited. Every category links to list of blogs.
Categories can be deleted if no blogs belongs to them. Every user can delete and edit all categories.

### Create category

To create a category name and description need to be passed by form. Name of category is unique.

### List blogs

Display blogs created by all users. Blogs can be edited by creation user.
Blogs can only be deleted, if no messages belongs to it and requesting user is the owner. All blogs link to a blog page with all messages belongs to it displayed.
Every message can be edited and deleted by the owner.

### Create blog

Every blog needs a title, category and body.
In the body [Markdown](https://daringfireball.net/projects/markdown/syntax) can be used.

### My replies

All replies, done by logged in user, are displayed.
Replies can be edited, deleted or blog reply done to can be opend.
