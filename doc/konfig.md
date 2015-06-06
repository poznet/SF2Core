# SF2Core
Symfony 2 Core bundle
## Konfig service
Sometimes  you need  to save some  simple values, and  you don't  want  to have it in entity/database.

That's  why  there is  a  konfig  service,  it's wide available ( it's a service ), and  it stores data in yaml  format in app/config/parameters-konfig.yml

1.To read  value saved as a  "name" use:
`$this->get('konfig')->get('name');`

2.to save/add value  use:
`$this->get('konfig')->set('name','value');`

3.to remove value from konfig use :
`$this->get('konfig')->remove('name');`

After  modificaton of  config  values  you need  to save it 
`$this->get('konfig')->save();`


Each value have  also two other fileds : descripton and  type.
it can be accessed  by : 
`getDescription('name');`	

`getType('name');`

`setDescription('name','value');`

`setType('name','value');`


Also you  can read  all values  as  array 
`getAll();`


[Back to index](../README.md)




