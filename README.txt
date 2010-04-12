Blog extended plugin
=======================

Features:
  - Extend the edit blog view to support before and after description fields.
  - Add support for blog categories 
  - Add support for assign blog 'ownership' to a group (Read more after)
  - Overwrite post icon with the group icon (if it is associated to a group)
  - Widget for show blog posts in the profile

Install
-------

1) Drop it on your mod directory
2) Go to admin panel put it after default's blog plugin
3) Activate it
4) Configure extra settings (enable/disable categories,groups and icon overwrite)

How to add new categories?
--------------------------
Add the new categories at start.php#blogextended_get_categories

If you want to change the way they are asked to the user edit/overwrite
views/default/blogextended/category.php


How works the blog post group 'ownership' works?
------------------------------------------------
It let the user specify on what of his groups wants to publish a content.
The user continues being the post owner just that the content is published in their profile
AND in the group profile.

At this moment the group owner couldn't edit or deny blog posts content but its a planed feature
to support some kind of pre-approval process to let group owners accept/deny contents for their group.


Roadmap
-------
http://www.pivotaltracker.com/projects/72723
  

