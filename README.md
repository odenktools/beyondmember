# Beyond Member
===========
Laravel 5.1 Authentification and membership system

#Install
To install titanwall, add the following lines in your composer.json file:
	
	"require-dev": {
		"ngakost/beyondmember": "dev-master"
	}

Save, then run it from your console

	composer update --dev

#Setup
After updating composer, add the service provider to the `providers` array in `config/app.php`

	Ngakost\BeyondMember\Providers\BeyondMemberServiceProvider::class,

Also add the aliases to the `aliases` array in `config/app.php`



#Publish

You can also publish the views, assets, public folder



Or using tag


	
#Migration


#Note


#References
	[https://github.com/Toddish/Verify](https://github.com/Toddish/Verify).
	[https://github.com/parsidev/entrust](https://github.com/parsidev/entrust).
	
