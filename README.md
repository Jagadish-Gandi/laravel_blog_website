# Laravel Blog Website

## Overview

This is a Laravel-based blog website where users can read blog posts and post comments without needing to log in. Admin users have the ability to create, update, and delete blog posts, as well as reply to comments. The admin dashboard features visual insights such as pie charts representing blog categories, the latest five blog posts, and a list of new comments that have not yet been replied to. The main page includes a search functionality and pagination for easy navigation through blog posts.

## Features

- **User Features:**
  - Read blog posts
  - Post comments without logging in
  - Search for blog posts
  - Pagination for easy navigation

- **Admin Features:**
  - Create, update, and delete blog posts
  - Reply to user comments
  - Admin dashboard with:
    - Pie chart for blog categories
    - Display of the latest five blogs
    - List of new comments awaiting replies

## Technologies Used

- **Backend:** Laravel
- **Frontend:** Blade templates
- **Database:** MySQL
- **Others:** HTML, CSS, Bootstrap, chart.js for styling

Usage
Users can browse the blog posts on the main page.
Users can submit comments on any blog post without the need to log in.
Admin users can log in (authentication should be set up with breeze) to manage blog posts and comments.
Admins can navigate to the dashboard for insights and manage content effectively.
