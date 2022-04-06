## How to install and configure this project

_**Step 1:**_  
Clone the project on your **htdocs** by running the command below.  
`$` `git clone https://github.com/asthrea18/template.git`  

_**Step 2:**_  
Don't forget to change the **.env** file  
`DB_DATABASE=your_db_name`  
`DB_USERNAME=your_db_user`  
`DB_PASSWORD=your_db_password`

_**Step 3:**_  
In your project folder, install the composer plugins.  
`$` `cd kfi_shop`  
`$` `composer install`

_**Step 4:**_  
Now, we're nearly done. Install the voyager admin panel.  
`$` `php artisan voyager:install`

_**Step 5:**_  
After installing all plugins, create an Admin account.  
`$` `php artisan voyager:admin your@email.here --create`  
You can input the _**Admin Name**_ and _**Admin Password**_

That's it! It should be working now.

> **Note:** If you encounter issues upon cloning, please PM Raymart.
