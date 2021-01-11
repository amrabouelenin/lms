# Administer Users by Role

## SUMMARY
This module allows site builders to set up fine-grained permissions for
allowing "sub-admin" users to edit and delete other users — more specific
than Drupal Core's all-or-nothing 'administer users' permission. It also
provides and enforces a 'create users' permission.

## CORE PERMISSIONS

### Administer users
DO NOT set this for sub-admins.  This permission bypasses all of the
permissions in "Administer Users by Role".

### View user information
Your sub-admins should probably have this permission.  (Most things work
without it, but for example with a View showing users, the user name
will only become a link if this permission is set.)

### Select method for cancelling account
If you set this for sub-admins, then the sub-admin can choose a cancellation
method when cancelling an account.  If not, then the sum-admin will always
use the default cancellation method.

## NEW PERMISSIONS

### Access the users overview page
See the list of users at admin/people.  Only users that can be edited are shown.

### Create new users
Create users, at admin/people/create.

### Allow empty user mail when managing users
Create and manage users that have no email address.

### Edit users with no custom roles
Allows editing of any authenticated user that has no custom roles set.

### Edit users with role XXX
Allows editing of any authenticated user with the specified role.
To edit a user with multiple roles, the sub-admin must have permission to
edit ALL of those roles.  ("Edit users with no custom roles" is NOT needed.)

### Cancel
The permission for cancel work exactly the same as those for edit.

## GOOGLE CODE-IN
Drupal 8 port done with assistance from the student gvso as a Google Code-In (GCI) 2014 task. Google Code-in is a contest for pre-university students (e.g., high school and secondary school students ages 13-17) with the goal of encouraging young people to participate in open source. More info about GCI [https://developers.google.com/open-source/gci/](https://developers.google.com/open-source/gci/)
