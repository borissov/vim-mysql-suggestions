#vim-mysql-suggestions
##About
A plugin of VIM to show suggestion from MySQL database.

##Installation
Via Plugin Manager
###Vundle
```viml
    Plugin 'borissov/vim-mysql-suggestions'
```

In your vimrc file add options.
```viml
    " File Types you want to use suggestions
    autocmd FileType php setlocal completefunc=MySQLCompleteFunction
    autocmd FileType javascript setlocal completefunc=MySQLCompleteFunction
    let g:database_host = "MySQL Host"
    let g:database_password = "MySQL Password"
    let g:database_database = "MySQL Database Name"
    let g:database_user = "MySQL User"
```
##Usage

###Default mappings

The following key mappings are provided by default: 
* `<C-x><C-u>` Call user completion function 
* `<C-x>` Show completion menu
