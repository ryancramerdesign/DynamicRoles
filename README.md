# Dynamic Roles for ProcessWire

Dynamic Roles is a powerful access control tool for ProcessWire. 
They pick up where traditional roles leave off, and allow you to assign 
permissions at runtime based on any factor present with the user. 
Once a user receives one or more dynamic roles (at runtime), those 
dynamic roles then specify what pages the user can view, edit, or add
children to. 

If traditional roles are a sledgehammer, Dynamic Roles are a scalpel, 
allowing nearly any finely tuned access control scenario. Traditional 
ProcessWire rules are limited to assignment of view/edit/add access on 
a per-template basis. Dynamic roles go outside those limitations and 
enable you to assign that access based on any factors present with a
page (i.e. match any field values). 

Dynamic Roles assign new access, but do not revoke existing access 
provided by traditional roles. As a result, Dynamic Roles can be used 
together with traditional roles. If using Dynamic Roles to assign page-view 
access, you would typically want to use traditional roles to revoke view
access from at least the "guest" role at the template level. Then use 
Dynamic Roles to assign view access to those pages in a more granular 
manner. 

This module directly affects the results of all page getting/finding
operations by applying the access control directly to the database
queries before pages are loaded. As a result, it is fast (regardless
of scale), pagination friendly, and requires no further intervention 
by the developer other than configuring the dynamic roles as they see fit. 

- Sponsored by Avoine
- Concept by Antti Peisa
- Code by Ryan Cramer   


## Important-PLEASE NOTE: 

This module is in pre-release state and is not recommended for 
production use just yet. Though we do appreciate any testing and/or 
feedback that you are able to provide. 


## Requirements

This module requires the latest version of the ProcessWire dev branch,
meaning ProcessWire 2.4.5 or newer. 

While not required, this module benefits from ProFields Multiplier. If you
have ProFields Multiplier installed before installing this module, it will
make this module more powerful by making all of your access control 
selectors have the ability to use OR-group conditions. Depending on your
access control needs, this enables you to accomplish more with fewer
Dynamic Roles. 


## How to install

1. Place all files from this module in /site/modules/DynamicRoles/. 

2. In your admin, go to Modules > Check for new modules.

3. Click "install" for the Dynamic Roles module (ProcessDynamicRoles). 

4. Click to Access > Dynamic Roles for the rest (see example and
instructions below). 


## Example and Instructions

Lets say you ran a [Skyscrapers](http://processwire.com/skyscrapers/) 
site and wanted a role enabling users with "portmanusa.com" in their 
email address to have edit access to skyscrapers designed by architect
John Portman, with at least 40 floors, and built on-or-after 1970. Yes, 
this is an incredibly contrived example, and it is unlikely your own 
needs would ever be that finely grained, but it is an example that also
demonstrates the access control potential of this module.

1. In your admin, you would click to Access > Dynamic Roles.

2. Click "Add Dynamic Role". Enter a name for the dynamic role, like:
"skyscraper-test-editor" and save.

3. Under "Who is in this dynamic role?" section, click "Add Field" and 
choose: Email => Contains Text => "portmanusa.com". This will 
match all users having "portmanusa.com" in their email address. 

4. Under "permissions" check the boxes for: **page-view** and **page-edit**. 

5. For this contrived example, we will assume the user already has 
view access to all skyscrapers, so we will leave the "What can they view?"
section alone. 

6. For the "What can they edit?" section: 
   - Click "Add Field" and choose: template => Equals => Skyscraper.
   - Click "Add Field" and choose: architect => Equals => John Portman.
   - Click "Add Field" and choose: floors => Greater Than Or Equal => 40. 
   - Click "Add Field" and choose: year => Greater Than Or Equal => 1970. 

7. Click Save. Now users matching the conditions of your dynamic role will
be able to edit the matching pages, but not any others (unless assigned by
traditional roles). 


## API

This module creates a $droles API variable (short for "dynamic roles"). 
This is a WireArray that can be accessed and interated in the same manner
as the existing $roles API variable. All dynamic roles are pages that 
extend the Role page type. 


This document is a work in progress. 

