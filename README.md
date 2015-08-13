Simple To-do API
============

Requirements
------------
* VirtualBox <http://www.virtualbox.com>
* Vagrant <http://www.vagrantup.com>
* Git <http://git-scm.com/>

Usage
-----

### Startup
	$ git clone https://github.com/bamboos/todo.git in any folder
	$ vagrant up


### Using API
Web server will be loaded at <http://localhost:8888>.
In order to call API method, use <http://localhost:8888/api/todo/id/<id>> with corresponding HTTP method. <id> here is any number.

Documentation is available at <http://localhost:8888/docs>
Code coverage report is available at <http://localhost:8888/coverage>