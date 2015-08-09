# SF2Core
Symfony 2 Core bundle
## Basic Authentication system

#### Installation
- Update database shemma (dapp/console :s:u  --force)
- configure security

Add to routing.yml :
```
core_user:
    resource: "@CoreBundle/Resources/config/routing.yml"
    prefix:   /panel/
```

#### Customizing  login view
Overrite existing login  view by  placing it in file : 
app/Resources/CoreBundle/views/User/login.html.twig

**You need form  comaptybile wit FOSUserBundle : **
```
<form action="{{ path('login_check') }}" method="post">
    <label for="inputEmail" >Email address</label>
    <input type="text" id="username" name="_username" value="{{ last_username }}"   required autofocus />

    <label for="inputPassword"  >Password</label>
    <input type="password" id="password" name="_password"   required />
    <button type="submit">Zaloguj</button>
</form>
```


[Back to index](../README.md)




